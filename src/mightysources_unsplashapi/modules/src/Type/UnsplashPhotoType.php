<?php

namespace MightySourcesUnsplashApi\Type;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashPhotoType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [

                'urls' => [
                    'type' => 'String',
                    'args' => [
                        'size' => [
                            'type'    => 'String',
                            'default' => 'regular',
                        ],
                    ],
                    'metadata' => [
                        'label' => trans('Url'),
                        'arguments' => [
                            'size' => [
                                'label'   => 'Size',
                                'type'    => 'select',
                                'default' => 'regular',
                                'options' => [
                                    'Small'   => 'small',
                                    'Regular' => 'regular',
                                    'Full'    => 'full',
                                    'HD'      => 'raw',
                                ],
                            ]
                        ],
                    ],
                    'extensions' => [
                        'call' => __CLASS__ . '::resolveImageUrl',
                    ],
                ],

                'description' => [
                    'type' => 'String',
                    'metadata' => [
                        'label'   => trans('Description'),
                        'filters' => ['limit'],
                    ],
                ],

                'alt_description' => [
                    'type' => 'String',
                    'metadata' => [
                        'label'   => trans('Alt Description'),
                        'filters' => ['limit'],
                    ],
                ],

                'color' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Color (Hex)'),
                    ],
                ],

                'updated_at' => [
                    'type' => 'String',
                    'metadata' => [
                        'label'   => trans('Updated At'),
                        'filters' => ['date'],
                    ],
                ],

                'downloads' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Downloads'),
                    ],
                ],

                'likes' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Likes'),
                    ],
                ],

                'user' => [
                    'type' => 'UnsplashUser',
                    'metadata' => [
                        'label' => trans('Author'),
                    ],
                ],

                // 'location' => [
                //     'type' => 'UnsplashPhotoLocation',
                //     'metadata' => [
                //         'label' => trans('Location'),
                //     ],
                // ],

                // 'exif' => [
                //     'type' => 'UnsplashPhotoExif',
                //     'metadata' => [
                //         'label' => trans('EXIF Data'),
                //     ],
                // ],


                'tags' => [
                    'type' => [
                        'listOf' => 'UnsplashTag',
                    ],
                    'metadata' => [
                        'label' => trans('Tags'),
                    ],
                ],

                'id' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Id'),
                    ],
                ],
                
            ],
            'metadata' => [
                'type' => true,
                'label' => trans('Photo'),
            ],
        ];
    }

    public static function resolveImageUrl($images, $args)
    {
        $size = (isset($args['size']))
            ? $args['size'] 
            : 'regular';

        return $images['urls'][$size];
    }

}
