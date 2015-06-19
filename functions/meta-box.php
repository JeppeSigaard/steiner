<?php

add_filter( 'rwmb_meta_boxes', 'smamo_add_boxes' );

function smamo_add_boxes(){

// Your boxes or requires here
require 'add-stone-box.php';
require 'gallery-box.php';
    
return $mb;

}




?>