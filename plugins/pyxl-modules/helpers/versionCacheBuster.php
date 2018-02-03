<?php

namespace Pyxl\Modules;

function versionCacheBuster($file)
{
    $theme_path = get_stylesheet_directory();
    if (!file_exists($theme_path . $file)) {
        return null;
    }
    return filemtime(get_stylesheet_directory() . $file);
}