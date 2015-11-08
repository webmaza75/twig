<?php
function findItemById($id) {
    global $items;

    foreach($items as $item) {
        if ($item->getId() == $id) {
            return $item;
        }
    }
    return false;
}

function findItemsByTag($tag_id) {
    global $items;
    $goods = array();

    foreach($items as $item) {
        $tags = $item->getTags();
        foreach ($tags['tags'] as $key => $tag) {
            if($key == $tag_id) {
                $goods[] = $item;
                break;
            }
        }
    }
    return $goods;
}