<?php

/**
 * @package   MightAddons HikaShop 
 * @author    MightAddons - MightAddons.com
 * @copyright Copyright (C) 2022 MightAddons  - MightAddons.com
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
 *
 */

namespace MightySourcesUnsplashApi;

use Joomla\CMS\Plugin\PluginHelper;
use Joomla\CMS\Http\HttpFactory;
use Joomla\Registry\Registry;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;

class UnsplashApi
{    
    public static function resolve($endpoint, $args = [])
    {
        $params = [];
        foreach ($args as $key => $value)
        {

            if (!is_array($value) && $value == '')
            {
                continue;
            }
            
            if (is_array($value) && count($value))
            {
                $value = reset($value);
            }

            $params[] = "$key=$value";
        }

        return json_decode(
            self::_get(
                $endpoint, 
                $params
            ),
            true // Array
        );
    }

    public static function prepareParams($args = [])
    {
        $params = [];

        foreach ($args as $key => $value)
        {
            switch ($key)
            {

                case 'limit':
                case 'offset':
                    break;
                
                case 'query':
                    $params['query'] = str_replace(' ', '+', $args['query']);
                    break;
                
                default:
                    $params[$key] = $args[$key];
                    break;
            }
        }


        // Convert YTP pagination to API pagination
        $start = (int) $args['offset'] ?? 0;
        $limit = (int) $args['limit'] ?? 10;

        $params['per_page'] = $limit;
        $params['page'] = ((int) ceil($start / $limit) == 0) 
            ? 1 
            : (int) ceil($start / $limit);

        return $params;
    }

    private static function _get($endpoint, $args = [])
    {

        $plgParams = new Registry(PluginHelper::getPlugin('system', 'mightysources_unsplashapi')->params);
        $client_id = $plgParams->get('apikey-unsplash', null);
        // dd($client_id);

        $endpoint = "https://api.unsplash.com/$endpoint";
        $vars     = "?client_id=$client_id";

        if (count($args))
        {
            $vars .= '&' . implode('&', $args);
        }

        // GET Request
        $answer = HttpFactory::getHttp([], ['curl', 'stream'])->get($endpoint . $vars);
        
        // Response Code
        $code = $answer->code;

        // NOT good :D
        if ($code != '200')
        {
            $error_message = json_decode($answer->body, true)['errors'];

            Factory::getApplication()->enqueueMessage('Mighty Sources - UnsplashApi - ERROR: ' . implode(',', $error_message), 'warning');
            return false;
        }

        // Return Response
        return $answer->body;
    }
    
}