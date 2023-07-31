<?php
/**
 * @package   System - Playground
 * @author    Mighty Addons https://mightyaddons.com
 * @copyright Copyright (C) Mighty Addons
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Uri\Uri;

use YOOtheme\Application;
use YOOtheme\Path;

// no direct access
defined('_JEXEC') or die('Restricted access');

class plgSystemMightySources_UnspashApi extends CMSPlugin
{
    public function onAfterInitialise()
    {
		if (class_exists(Application::class, false))
		{

			$app = Application::getInstance();

			$root    = __DIR__;
			$rootUrl = Uri::root(true);

			$themeroot = Path::get('~theme');
			$loader    = require "{$themeroot}/vendor/autoload.php";
			$loader->setPsr4("MightySources\\UnspashAPi\\", __DIR__ . "/modules/src");

			// set alias
			Path::setAlias('~mightysources_unsplashapi', $root);
			Path::setAlias('~mightysources_unsplashapi:rel', $rootUrl . '/plugins/system/mightysources_unsplashapi');

			// bootstrap modules
			$app->load('~mightysources_unsplashapi/modules/*/bootstrap.php');
		}

    }

}