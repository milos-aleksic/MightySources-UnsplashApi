<?php

namespace MightySourcesUnsplashApi\Type;

use MightySourcesUnsplashApi\UnsplashApi;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashPhotosQueryType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [
                'unsplashPhotos' => [
                    'type' => [
                        'listOf' => 'UnsplashPhoto'
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
                        'query' => [
                            'type' => 'String',
                        ],

                        'collections' => [
                            'type' => 'String',
                        ],
                        'color' => [
                            'type' => 'String',
                        ],
                        'orientation' => [
                            'type' => 'String',
                        ],
                    ],
                    'metadata' => [
                        'label' => trans('Unsplash Photos'),
                        'group' => trans('Mighty Sources'),
                        'fields' => [
                            '_query' => [
                                'label' => trans('Filter Images'),
                                'type'  => 'grid',
                                'width' => '1-1',
                                'fields' => [
                                    'query' => [
                                        'label'       => trans('Query'),
                                        'default'     => 'Office gadgets',
                                        'description' => 'Keywords separated by spaces',
                                    ],
                                ],
                            ],
                            '_topics' => [
                                'type'  => 'grid',
                                'width' => '1-2',
                                'fields' => [
                                    'color' => [
                                        'label'   => trans('Color'),
                                        'type'    => 'select',
                                        'options' => [
                                            'All'           => '',
                                            'Black & White' => 'black_and_white',
                                            'Black'         => 'black',
                                            'White'         => 'white',
                                            'Yellow'        => 'yellow',
                                            'Orange'        => 'orange',
                                            'Red'           => 'red',
                                            'Purple'        => 'purple',
                                            'Magenta'       => 'magenta',
                                            'Green'         => 'green',
                                            'Teal'          => 'teal',
                                            'Blue'          => 'blue',
                                        ],
                                    ],
                                    'collections' => [
                                        'label'       => trans('Collections'),
                                        'description' => 'Public collection IDs to filter selection. If multiple, comma-separated',
                                    ],
                                ],
                            ],
                            '_order_by' => [
                                'description' => trans(
                                    'Set the starting point and limit the number of Images.'
                                ),
                                'type'  => 'grid',
                                'width' => '1-2',
                                'fields' => [
                                    'order_by' => [
                                        'label'   => trans('Order By'),
                                        'type'    => 'select',
                                        'default' => 'relevant',
                                        'options' => [
                                            'Relevant' => 'relevant',
                                            'Latest'   => 'latest',
                                        ],
                                    ],
                                    'orientation' => [
                                        'label'       => trans('Orientation'),
                                        'description' => 'Filter by photo orientation',
                                        'type'    => 'select',
                                        'options' => [
                                            'Any'       => '',
                                            'Landscape' => 'landscape',
                                            'Portrait'  => 'portrait',
                                            'Squarish'  => 'squarish',
                                        ],
                                    ],
                                ],
                            ],
                            '_offset' => [
                                'description' => trans(
                                    'Set the starting point and limit the number of Images.'
                                ),
                                'type'  => 'grid',
                                'width' => '1-2',
                                'fields' => [
                                    'offset' => [
                                        'label'    => trans('Start'),
                                        'type'     => 'number',
                                        'default'  => 1,
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
        $params = UnsplashApi::prepareParams($args);
     
        $response = UnsplashApi::resolve(
            'search/photos', 
            $params,
        );

        if ($response)
        {
            return $response['results'];
        }

        return false;
    }


}
