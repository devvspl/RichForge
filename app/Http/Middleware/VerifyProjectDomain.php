<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Project;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyProjectDomain
{
    public function handle(Request $request, Closure $next): Response
    {
        $projectKey = $request->header('X-Project-Key') ?? $request->input('project_key');

        if (!$projectKey) {
            return response()->json([
                'success' => false,
                'code' => 'INVALID_PROJECT_KEY',
                'message' => 'Project key is missing in request headers or body.'
            ], 401);
        }

        $project = Project::where('project_key', $projectKey)->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'code' => 'INVALID_PROJECT_KEY',
                'message' => 'Provided project key is invalid or inactive.'
            ], 401);
        }

        if ($project->status !== 'active') {
            return response()->json([
                'success' => false,
                'code' => 'PROJECT_SUSPENDED',
                'message' => 'This project has been suspended.'
            ], 403);
        }

        // Validate requesting domain
        $origin = $request->header('Origin') ?? $request->header('Referer');
        $requestHost = null;

        if ($origin) {
            $parsed = parse_url($origin);
            $requestHost = $parsed['host'] ?? null;
        }

        // If no origin header or request came from localhost/same server, allow local testing
        if ($requestHost) {
            $allowedDomains = $project->domains()->where('is_active', true)->pluck('domain')->toArray();
            
            $isAllowed = false;
            foreach ($allowedDomains as $allowedDomain) {
                if ($allowedDomain === '*' || $requestHost === $allowedDomain) {
                    $isAllowed = true;
                    break;
                }
                // Check wildcard domains like *.example.com
                if (str_starts_with($allowedDomain, '*.')) {
                    $baseDomain = substr($allowedDomain, 2);
                    if (str_ends_with($requestHost, $baseDomain)) {
                        $isAllowed = true;
                        break;
                    }
                }
            }

            if (!$isAllowed && $requestHost !== 'localhost' && $requestHost !== '127.0.0.1') {
                return response()->json([
                    'success' => false,
                    'code' => 'DOMAIN_NOT_ALLOWED',
                    'message' => "The origin domain '{$requestHost}' is not authorized for this project key."
                ], 403);
            }
        }

        $request->attributes->set('project', $project);

        $response = $next($request);

        // Add CORS headers for authorized origin
        if ($origin) {
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, DELETE');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Project-Key');
        }

        return $response;
    }
}
