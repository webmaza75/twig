<?php


class MyExtension extends Twig_Extension {

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    function getName()
    {
        return 'myextension';
    }

    public function getGlobals() {
        return [
            'config' => include __DIR__ . '/../config.php',
        ];
    }

    public function getFilters() {
        return [
            new Twig_SimpleFilter(
                'ineuro', function($cost) {
                return ($cost / 64.62); }
            ),
            new Twig_SimpleFilter(
                'indollar', function($cost) {
                return ($cost / 69.41); }
            ),
        ];
    }
/*
    public function getFilters() {

    }
*/
}