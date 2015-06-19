<?php

$mb[] = array(
    'id' => 'add_stone_box',
    'title' => __( 'Vedhæft indhold', 'rwmb' ),
    'pages' => array('post','page','event','galleri'),
    'context' => 'side',
    'priority' => 'default',
    'autosave' => true,
    'fields' => array(
        
        array(
            'name'  => __( 'Tilføj indhold', 'rwmb' ),
            'id'    => "add_stone",
            'type' => 'post',
            'placeholder' => __('Vælg indhold','rwmb'),
            'post_type' => array('post','page','event','galleri'),
            'clone' => true,
            ),
    ),
);


?>