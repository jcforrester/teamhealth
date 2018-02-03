<?php

namespace Pyxl\Modules;

function fileEnvCheck($path)
{
    /*
     * Our default variable, will pass as null by default.
     */
    $qualifiedFile = null;

    $themePath = get_stylesheet_directory();
    $themeUri = get_stylesheet_directory_uri();

    /*
     * If dev file exists e.g( app.js ) override $qualifiedFile.
     */
    if (file_exists($themePath . $path)) {
        $qualifiedFile = $themeUri . $path;
    }

    /*
     * Create a string to match a possible production file e.g.( app.min.js ) which is likely uglified/minified.
     */
    $extensionPos = strrpos($path, '.');
    $fileProduction = substr($path, 0, $extensionPos) . '.min' . substr($path, $extensionPos);

    /*
     * Test for production file e.g.( app.min.js) override $qualifiedFile.
     */
    if (file_exists($themePath . $fileProduction)) {
        $qualifiedFile = $themeUri . $fileProduction;
    }

    /*
     * In order or priority return null, development file, or production file.
     */
    return $qualifiedFile;
}