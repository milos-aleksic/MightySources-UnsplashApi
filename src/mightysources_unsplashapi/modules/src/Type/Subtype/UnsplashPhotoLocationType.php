<?php

namespace MightySourcesUnsplashApi\Type\Subtype;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashPhotoLocationType
{
    /**
     * @return array
     */
    public static function config()
    {
        return [
            'fields' => [

                'city' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('City')
                    ],
                ],

                'country' => [
                    'type' => 'String',
                    'metadata' => [
                        'label' => trans('Country')
                    ],
                ],

            ],
            'metadata' => [
                'type' => true,
                'label' => trans('Location'),
            ],
        ];
    }
}
