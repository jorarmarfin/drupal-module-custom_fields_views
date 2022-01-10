<?php

/**
 * @file
 * Contains custom_field_views\custom_field_views.views.inc..
 * Provide a custom views field data that isn't tied to any other module. */


/**
* Implements hook_views_data().
*/
function custom_field_views_views_data() {

    $data['views']['table']['group'] = t('Custom Global');
    $data['views']['table']['join'] = [
      // #global is a special flag which allows a table to appear all the time.
      '#global' => [],
    ];

    $data['views']['custom_views_field'] = [
        'title' => t('Custom Field'),
        'help' => t('Custom views field'),
        'field' => [
            'id' => 'custom_views_field',
        ],
    ];

    $data['views']['edad_views_field'] = [
        'title' => t('Edad'),
        'help' => t('Edad Calculada a partir de la fecha de nacimiento'),
        'field' => [
            'id' => 'edad_views_field',
        ],
    ];
    
    $data['views']['table']['group'] = t('Custom Global');
    $data['views']['table']['join'] = [
      // #global is a special flag which allows a table to appear all the time.
      '#global' => [],
    ];

    $data['views']['arturo_field'] = [
        'title' => t('Arturo field'),
        'help' => t('My awesome custom views field plugin.'),
        'field' => [
            'id' => 'arturo_field',
        ],
    ];

    $data['views']['token_api_views_field'] = [
        'title' => t('Token api'),
        'help' => t('Encripta un campo para usarlo como token'),
        'field' => [
            'id' => 'token_api_views_field',
        ],
    ];

    return $data;
}

