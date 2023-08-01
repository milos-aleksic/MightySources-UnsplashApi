<?php

/**
 * @package   MightySources UnsplashApi - Mighty Addons 
 * @author    Mighty Addons - MightyAddons.com
 * @copyright Copyright (C) 2023 Mighty Addons - MightyAddons.com
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 *
 */

namespace MightySourcesUnsplashApi;

use YOOtheme\Builder\BuilderConfig;

return [

    'events' => [
        'source.init' => [Listener\LoadSourceTypes::class => '@handle'],
    ],

];
