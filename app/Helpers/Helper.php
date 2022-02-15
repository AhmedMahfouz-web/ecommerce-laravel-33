<?php

use App\Models\MainCategories;

function get_languages()
{
    return \App\Models\Languages::Active()->selection()->get();
}

function get_locale_language()
{
    return Config::get('app.locale');
}

function uploadImg($folder, $image)
{
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;

    return $path;
}

function getImgAttr($img)
{
    return asset('public/' . $img);
}

function mainCategories()
{
    return
        MainCategories::with(['subCategories' => function ($q) {
            $q->with('sub_sub_categories');
        }])
        ->where('translation_lang', get_locale_language())
        ->active()
        ->select('id', 'name', 'slug')
        ->get();
}


if (!function_exists('words')) {

    function words($value, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($value, $words, $end);
    }
}

function getHeader()
{
    $locale_language = get_locale_language();
        
    return 
    MainCategories::with(['subCategories' => function ($q) {
            $q->with('sub_sub_categories');
        }])
            ->with(
                ['products' => function ($q) {
                    $q->select('*')->take(100);
                }]
            )
            ->where('translation_lang', $locale_language)
            ->active()
            ->select('id', 'name', 'slug')
            ->get();
}