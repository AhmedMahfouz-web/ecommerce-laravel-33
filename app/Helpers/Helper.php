<?php

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
