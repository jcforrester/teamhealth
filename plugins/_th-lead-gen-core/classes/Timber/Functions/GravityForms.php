<?php

namespace Pyxl\TeamHealth\Timber\Functions;

use Twig_SimpleFunction;
use Timber;

class GravityForms
{
    public function __construct()
    {
//        $gravityfunction = new Twig_SimpleFunction('gform', function ($id, $eventName) {
//            $form = gravity_form($id, false, false, false, array('event_name' => $eventName));
//            return $form;
//        });
        add_action('init', [$this, 'addDisplayForm']);
    }

    public function addDisplayForm()
    {
        add_filter('timber/twig', function ($twig) {
            $gravityfunction = new Twig_SimpleFunction('gform', function ($id) {
                $tabindex = '';
                $form = gravity_form($id, false, false, false, '', $ajax = false, $tabindex);
                return $form;
            });
            $twig->addFunction($gravityfunction);

            return $twig;
        });
    }
}