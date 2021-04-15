<?php

foreach ($categoryList as $key => $category)
{
    $key++;
    echo $category .  " - <a href='".route('categories.show', ['id' => $key])."'>Все новости категории</a><br>";
}
