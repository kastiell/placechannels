<?php

return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'guest',
        'bizRule' => null,
        'data' => null
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'user',
        'children' => array(
            'guest', // унаследуемся от гостя
        ),
        'bizRule' => null,
        'data' => null
    ),
    'youtuber' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'client',
        'children' => array(
            'user',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
    'brand' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'lawyer',
        'children' => array(
            'user',          // позволим модератору всё, что позволено пользователю
        ),
        'bizRule' => null,
        'data' => null
    ),
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'admin',
        'children' => array(
            'user',         // позволим админу всё, что позволено модератору
        ),
        'bizRule' => null,
        'data' => null
    ),
);