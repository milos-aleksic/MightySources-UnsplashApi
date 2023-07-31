<?php

namespace MightySources\UnsplashApi\Listener;

use YOOtheme\Config;
use function YOOtheme\trans;

use MightySources\UnsplashApi\Type;

class LoadSourceTypes
{
    public function handle($source): void
    {
        $query = [

            Type\UnsplashTopicsQueryType::config(),
            Type\UnsplashPhotosQueryType::config(),

        ];

        $types = [

            ['UnsplashPhoto', Type\UnsplashPhotoType::config()],
            ['UnsplashTopic', Type\UnsplashTopicType::config()],

            ['UnsplashTag', Type\Subtype\UnsplashTagType::config()],
            // ['UnsplashPhotoLocation', Unsplash\Subtype\UnsplashPhotoLocationType::config()],
            // ['UnsplashPhotoExif', Unsplash\Subtype\UnsplashPhotoExifType::config()],
            ['UnsplashUser', Type\Subtype\UnsplashUserType::config()],

        ];

        foreach ($query as $args) {
            $source->queryType($args);
        }

        foreach ($types as $args) {
            $source->objectType(...$args);
        }
    }

}
