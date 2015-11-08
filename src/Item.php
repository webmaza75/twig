<?php

/**
 * Класс товара Item
 */
class Item
{
    public $id;
    public $name;
    public $description;
    public $category;
    public $delivDate;
    public $cost;
    public $url;
    public $popular;

    public $tags;

    public function __construct($id, $name, $description, $category, $delivDate, $cost, $url, $popular, $tags = [])
    {
        $this->id = $id;
        $this->setName($name);
        $this->setDescription($description);
        $this->setCategory($category);
        $this->setDelivDate($delivDate);
        $this->setCost($cost);
        $this->setUrl($url);
        $this->setPopular($popular);
        $this->setTags($tags);
    }

    public function getId() {
        return $this->id;
    }
    public function getTags()
    {
        return $this->tags;
    }
    public function setTags($tags)
    {
        if (!empty($tags)) {
            foreach ($tags as $key => $tag) {
                $this->tags[$key] = $tag;
            }
        }
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
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

    public function getDelivDate()
    {
        return $this->delivDate;
    }
    public function setDelivDate($delivDate)
    {
        $this->delivDate = $delivDate;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function setPopular($popular)
    {
        $this->popular = $popular;
    }
    public function getPopular()
    {
        return $this->popular;
    }

    public function __isset($property)
    {
        return isset($this->$property);
    }
}