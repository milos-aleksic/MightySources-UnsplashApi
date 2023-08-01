<?php

namespace MightySourcesUnsplashApi\Type;


use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashTopicType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [

                'title' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Title'),
                    ],
                ],

                'slug' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Slug'),
                    ],
                ],

                'description' => [
                    'type' => 'String',
                    'metadata' => [
                        'label'   => trans('Description'),
                        'filters' => ['limit'],
                    ],
                ],

                'updated_at' => [
                    'type' => 'String',
                    'metadata' => [
                        'label'   => trans('Updated At'),
                        'filters' => ['date'],
                    ],
                ],

                'featured' => [
                    'type' => 'Boolean',
                    'metadata' => [
                        'label' => trans('Featured'),
                    ],
                ],

                'total_photos' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Total Photos'),
                    ],
                ],

                // 'owners' => [
                //     'type' => 'UnsplashUser',
                //     'metadata' => [
                //         'label' => trans('Owner'),
                //     ],
                //     'extensions' => [
                //         'call' => __CLASS__ . '::resolveOwner',
                //     ],
                // ],

                'cover_photo' => [
                    'type' => 'UnsplashPhoto',
                    'metadata' => [
                        'label' => trans('Cover Photo'),
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
                'label' => trans('Topic'),
            ],
        ];
    }

    public static function getFirstFromList($list)
    {
        return reset($list);
    }

}
