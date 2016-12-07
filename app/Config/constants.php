<?php

Configure::write('LANGUAGE', 'en');
Configure::write('LOCATION_TYPE',
    array(
        0 => array(
            'id' => 1,
            'name' => 'Top',
        ),1 => array(
            'id' => 2,
            'name' => 'Middle',
        ),2 => array(
            'id' => 3,
            'name' => 'Bottom',
        ),3 => array(
            'id' => 4,
            'name' => 'Left',
        ),4 => array(
            'id' => 5,
            'name' => 'Center',
        ),5 => array(
            'id' => 6,
            'name' => 'Right',
        )
    )
);

// type banner
const TYPE_BANNER_PICTURE = 0;
const TYPE_BANNER_VIDEO= 1;

?>
