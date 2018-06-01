<?php

function route_class(){
    return str_replace('.','-', Route::currentRouteName());
}

function make_excerpt(string $value, int $length = 200){
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}