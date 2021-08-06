<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Languages;
use App\Http\Requests\LanguageRequest;

class LanguagesController extends Controller
{
    // Get Languages
    public function index()
    {
        $languages = Languages::selection()->paginate(PAGINATION_COUNT);
        return view('dashboard.pages.languages.index', compact('languages'));
    }

    // Get Create Page
    public function create()
    {
        return view('dashboard.pages.languages.create');
    }

    // Save Language
    public function store(LanguageRequest $request)
    {
        // Insert into database
        $language = Languages::create($request->except(['_token']));
        return redirect(route('admin.languages'));
    }

    // Get Edit Page
    public function edit($id)
    {
        $language = Languages::select()->find($id);
        return view('dashboard.pages.languages.edit', compact('language'));
    }

    // Update Language
    public function update($id, LanguageRequest $request)
    {
        $language = Languages::find($id);

        if (!$request->has('active')) {
            $request->request->add(['active' => 0]);
        }
        $language->update($request->except(['_token']));
        return redirect(route('admin.languages'));
    }

    // Delete Language
    public function destroy($id)
    {
        $language = Languages::find($id);

        $language->delete();
        return redirect(route('admin.languages'));
    }
}
