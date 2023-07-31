<?php

namespace MightySources\UnsplashApi\Type\Subtype;


use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashPhotoExifType
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
                        'label' => trans('Name'),
                    ],
                ],

                'make' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Make'),
                    ],
                ],

                'model' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Model'),
                    ],
                ],

                'exposure_time' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Exposure Time'),
                    ],
                ],

                'aperture' => [
                    'type' => 'Boolean',
                    'metadata' => [
                        'label' => trans('Aperture'),
                    ],
                ],

                'focal_length' => [
                    'type' => 'Boolean',
                    'metadata' => [
                        'label' => trans('Focal Length'),
                    ],
                ],

                'iso' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('ISO'),
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
                'label' => trans('EXIF'),
            ],
        ];
    }

    // public static function resolveImageUrl($images, $args)
    // {
    //     $size = (isset($args['size']))
    //         ? $args['size'] 
    //         : 'portrait';

    //     return $images['src'][$size];
    // }

}
