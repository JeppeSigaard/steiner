<?php


$mb[] = array(
    'id' => 'gallery_meta',
    'title' => __( 'Tilføj billeder', 'rwmb' ),
    'pages' => array('galleri'),
    'context' => 'normal',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(

        array(
            'name'  => __( 'Tilføj billeder til galleriet', 'rwmb' ),
            'id'    => "smamo_gallery",
            'type' => 'image_advanced',
            ),
    ),
);



?>