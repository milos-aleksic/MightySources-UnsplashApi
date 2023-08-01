<?php

namespace MightySourcesUnsplashApi\Type\Subtype;

use function YOOtheme\trans;
use Joomla\CMS\Factory;

class UnsplashTagType
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
                        'label' => trans('Title')
                    ],
                ],

            ],
            'metadata' => [
                'type' => true,
                'label' => trans('Tag'),
            ],
        ];
    }

}
