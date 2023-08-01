<?php

namespace MightySourcesUnsplashApi\Type\Subtype;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashUserType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [

                'name' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Full Name'),
                    ],
                ],

                'first_name' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('First Name'),
                    ],
                ],

                'last_name' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Last Name'),
                    ],
                ],

                'profile_image' => [
                    'type' => 'String',
                    'args' => [
                        'size' => [
                            'type'    => 'String',
                            'default' => 'medium',
                        ],
                    ],
                    'metadata' => [
                        'label' => trans('Image'),
                        'arguments' => [
                            'size' => [
                                'label'   => 'Size',
                                'type'    => 'select',
                                'default' => 'medium',
                                'options' => [
                                    'Small'  => 'small',
                                    'Medium' => 'medium',
                                    'Large'  => 'large',
                                ],
                            ]
                        ],
                    ],
                    'extensions' => [
                        'call' => __CLASS__ . '::resolveImageUrl',
                    ],
                ],

                'bio' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Bio'),
                    ],
                ],

                'instagram_username' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Instagram Username'),
                    ],
                ],

                'location' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Location'),
                    ],
                ],

                // 'total_likes' => [
                //     'type' => 'Integer',
                //     'metadata' => [
                //         'label' => trans('Total Likes'),
                //     ],
                // ],
                
                // 'total_photos' => [
                //     'type' => 'Integer',
                //     'metadata' => [
                //         'label' => trans('Total Photos'),
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
 
                'for_hire' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('For Hire'),
                    ],
                ],
                
                // 'id' => [
                //     'type' => 'Integer',
                //     'metadata' => [
                //         'label' => trans('Id'),
                //     ],
                // ],
                
            ],
            'metadata' => [
                'type' => true,
                'label' => trans('User'),
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
