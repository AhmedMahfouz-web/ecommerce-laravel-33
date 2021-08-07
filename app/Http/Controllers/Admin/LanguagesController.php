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
        try {
            // Insert into database
            $language = Languages::create($request->except(['_token']));
            return redirect(route('admin.languages'))->with(['success' => 'Language has created successfully.']);
        } catch (\Exception $ex) {
            return redirect(route('admin.languages'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    // Get Edit Page
    public function edit($id)
    {
        $language = Languages::select()->find($id);
        if (!$language) {
            return redirect(route('admin.languages'))->with(['error' => 'This language doesn\'t exist.']);
        }
        return view('dashboard.pages.languages.edit', compact('language'));
    }

    // Update Language
    public function update($id, LanguageRequest $request)
    {
        try {
            $language = Languages::find($id);

            if (!$language) {
                return redirect(route('admin.languages'))->with(['error' => 'This language doesn\'t exist.']);
            }

            if (!$request->has('active')) {
                $request->request->add(['active' => 0]);
            }
            $language->update($request->except(['_token']));

            return redirect(route('admin.languages'))->with(['success' => 'Language has updated successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.languages'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }

    // Delete Language
    public function destroy($id)
    {
        try {
            $language = Languages::find($id);

            $language->delete();

            return redirect(route('admin.languages'))->with(['success' => 'Language has deleted successfully.']);
        } catch (\Exception $ex) {

            return redirect(route('admin.languages'))->with(['error' => 'Somthing went wrong try again later.']);
        }
    }
}
