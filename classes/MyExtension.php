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
                return '<span class="price-small">' . round($cost / 69.41, 2) . ' &euro;</span>'; }
            ),
            new Twig_SimpleFilter(
                'indollar', function($cost) {
                return '<span class="price-small">' . round($cost / 64.62, 2) . ' $</span>'; }
            ),
        ];
    }

    public function getFunctions() {
        return [
            new Twig_SimpleFunction('add_goods', function($tag_id) {
                return findItemsByTag($tag_id);
            }
            ),
        ];
    }

    public function getTests() {
        return [
            new Twig_SimpleTest('recommended', function($item) {
                return $item->popular >=4;
            }
            ),
        ];
    }

}