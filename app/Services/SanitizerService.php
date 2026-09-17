<?php

namespace App\Services;

class SanitizerService
{
    /**
     * Clean user-submitted HTML to prevent XSS attacks.
     */
    public function sanitize(string $dirtyHtml): string
    {
        if (empty(trim($dirtyHtml))) {
            return '';
        }

        // Remove script tags and contents
        $clean = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $dirtyHtml);
        
        // Remove inline event handlers (onerror=, onclick=, onload=)
        $clean = preg_replace('/on[a-z]+\s*=\s*(["\'])[^\1]*?\1/i', '', $clean);
        $clean = preg_replace('/on[a-z]+\s*=\s*[^> ]+/i', '', $clean);

        // Remove javascript: and vbscript: URIs
        $clean = preg_replace('/(href|src)\s*=\s*(["\'])\s*(javascript|vbscript):[^\2]*?\2/i', '$1="#"', $clean);

        return $clean;
    }
}
