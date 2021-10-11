<?php

namespace App\Http\Controllers;

use App\Models\MainCategories;
use App\Models\Product;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.ss
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $locale_language = get_locale_language();
        $main_categories = MainCategories::with('subCategories')
            ->with(
                ['products' => function ($q) {
                    $q->select('*')->take(20);
                }]
            )
            ->where('translation_lang', $locale_language)
            ->active()
            ->select('id', 'name', 'slug')
            ->get();
        // dd($main_categories);
        return view('front.home', compact(['main_categories']));
    }
}
