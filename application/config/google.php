<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '868180998773-f75u58q9bhgs6jna9osca98q9m8pik1m.apps.googleusercontent.com';
$config['google']['client_secret']    = '9g3O8ie1i62_m4jHIg3etP_G';
$config['google']['redirect_uri']     = 'http://localhost/MA_system/user_authentication/';
$config['google']['application_name'] = 'Web_MA';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();