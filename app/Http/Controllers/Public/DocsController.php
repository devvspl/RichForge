<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DocumentationPage;
use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index()
    {
        $firstDoc = DocumentationPage::orderBy('order')->first();
        if ($firstDoc) {
            return redirect()->route('docs.show', $firstDoc->slug);
        }

        return view('docs.show', [
            'doc' => null,
            'navigation' => collect()
        ]);
    }

    public function show(string $slug)
    {
        $doc = DocumentationPage::where('slug', $slug)->firstOrFail();
        $navigation = DocumentationPage::orderBy('order')->get()->groupBy('category');

        return view('docs.show', compact('doc', 'navigation'));
    }
}
