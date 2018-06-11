<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*

| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
| CodeIgniter reads its routing rules from top to bottom and routes the request to the first matching rule.
*/

/**
 * Wildcards:
We can use two types of wildcards, namely:

:num –  Segment containing only numbers will be matched.
:any – Segment containing only characters will be matched.
Using  :num
$route['(blog/:num)'] = 'tutorial/java/$1';
A URL with “blog” as the first segment, and a number in the second will be remapped to the “tutorial” class and the “java” method passing in the match as a variable to the function.

As when we invoke https://www.formget.com/blog/1  or https://www.formget.com/blog/2  it will redirect to https://www.formget.com/tutorial/java/$1.

Note : You can invoke URL only by using number.
 * Using  :any
$route['(blog/:any)'] = 'tutorial/java';
A URL with “blog” as the first segment, and anything in the second will be remapped to the “tutorial” class and the “java” method.

As when we invoke https://www.formget.com/blog/  or https://www.formget.com/blog/css  it will redirect to https://www.formget.com/tutorial/java.

Note : tutorial is controller and java is controller’s function.

Note : Do not use leading/trailing slashes.
 */

$route['users']= 'users';
$route['users/index'] = 'users/index';
$route['users/login'] ='users/login';
$route['users/dashboard'] ='users/dashboard';
$route['users/profile'] = 'users/profile';
$route['users/update_info'] = 'users/update_info';
$route['users/update_data'] = 'users/update_data';
$route['users/image_upload'] = 'users/image_upload';
$route['users/ajax_upload'] = 'users/ajax_upload';
$route['users/failed'] ='users/failed';
$route['users/logout'] ='users/logout';


$route['games/make_selections'] = 'games/make_selections';
$route['games/make_selections/(:any)'] = 'games/make_selections'; //any for passing parameter in this case
$route['games/record_picks'] = 'games/record_picks';
$route['games/has_entered'] = 'games/has_entered';


$route['pages/index'] = 'pages/index';
$route['pages/contact'] = 'pages/contact';
$route['pages/contact'] = 'pages/contact';
$route['pages/user_data_submit'] = 'pages/user_data_submit';
$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

