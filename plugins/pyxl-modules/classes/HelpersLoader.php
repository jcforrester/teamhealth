<?php

namespace Pyxl\Modules;

class HelpersLoader
{
    public function __construct()
    {
        $this->loadHelperFiles();
    }

    public function loadHelperFiles()
    {
        return array_map(function ($directory) {
            require $directory;
        }, $this->getDirectories());
    }

    public function getDirectories()
    {
        return glob(PATH . 'helpers/*');
    }

}