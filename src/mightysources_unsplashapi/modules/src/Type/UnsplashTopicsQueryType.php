<?php

namespace MightySourcesUnsplashAPi\Type;

use MightySourcesUnsplashAPi\UnsplashApi;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashTopicsQueryType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [
                'unsplashTopics' => [
                    'type' => [
                        'listOf' => 'UnsplashTopic'
                    ],
                    'args' => [

                        'order_by' => [
                            'type' => [
                                'listOf' => 'String',
                            ],
                        ],

                        'offset' => [
                            'type' => 'Int',
                        ],

                        'limit' => [
                            'type' => 'Int',
                        ],

                    ],
                    'metadata' => [
                        'label' => trans('Unsplash Topic'),
                        'group' => trans('Prototyping'),
                        'fields' => [
                            '_order_by' => [
                                'description' => trans(
                                    'Set the starting point and limit the number of Images.'
                                ),
                                'type' => 'grid',
                                'width' => '1-2',
                                'fields' => [
                                    'order_by' => [
                                        'label'   => trans('Order By'),
                                        'type'    => 'select',
                                        'default' => 'featured',
                                        'options' => [
                                            'Latest'   => 'latest',
                                            'Oldest'   => 'oldest',
                                            'Featured' => 'featured',
                                            'Position' => 'position',
                                        ],
                                    ],
                                ],
                            ],
                            '_offset' => [
                                'description' => trans(
                                    'Set the starting point and limit the number of Images.'
                                ),
                                'type' => 'grid',
                                'width' => '1-2',
                                'fields' => [
                                    'offset' => [
                                        'label'    => trans('Start'),
                                        'type'     => 'number',
                                        'default'  => 0,
                                        'modifier' => 1,
                                        'attrs' => [
                                            'min' => 1,
                                            'required' => true,
                                        ],
                                    ],
                                    'limit' => [
                                        'label'   => trans('Quantity'),
                                        'type'    => 'limit',
                                        'default' => 10,
                                        'attrs' => [
                                            'min' => 1,
                                            'max' => 80,
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'extensions' => [
                        'call' => __CLASS__ . '::resolve',
                    ],
                ]
            ],
        ];
    }

    public static function resolve($root, array $args)
    {
        return UnsplashApi::resolve(
            'topics', 
            UnsplashApi::prepareParams($args),
        );
    }

}

