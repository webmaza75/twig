<?php

/**
 * Класс товара Item
 */
class Item
{
    public $name;
    public $category;
    public $cost;
    public $url;

    public function __construct($name, $category, $cost, $url)
    {
        $this->setName($name);
        $this->setCategory($category);
        $this->setCost($cost);
        $this->setUrl($url);
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function getCategory()
    {
        return $this->category;
    }


    public function setCost($cost)
    {
        $this->cost = $cost;
    }
    public function getCost()
    {
        return $this->cost;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function getUrl()
    {
        return $this->url;
    }

    public function __isset($property)
    {
        return isset($this->$property);
    }
}