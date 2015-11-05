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