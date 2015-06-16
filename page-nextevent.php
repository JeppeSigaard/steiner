<?php
/*
Template Name: (nextevent)
*/
get_header('nomarkup'); 
$event_args = array(
    'numberposts' => 1,
    'orderby' => 'eventstart',
    'order' => 'ASC',
    'showpastevents' => false,
    'post_status' => 'publish'
);

$events = eo_get_events($event_args);

if ($events):
    $return= ''; 

    foreach ($events as $event):
        $return .= $event->ID;
    endforeach;  

    $goto = get_permalink($return);
endif;

header('location:'.$goto);
?>

</body>