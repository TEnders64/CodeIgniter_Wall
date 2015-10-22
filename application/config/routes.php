<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "home";
$route['signin'] = "home/signin";
$route['verify'] = "home/verify";
$route['register'] = "home/register";
$route['create'] = "users/create";
$route['users/edit'] = "users/edit";
$route['users/edit/(:any)'] = "users/admin_edit/$1";
$route['updateinfo/(:any)'] = "users/updateinfo/$1";
$route['updatepass/(:any)'] = "users/updatepass/$1";
$route['updatedesc/(:any)'] = "users/updatedesc/$1";
$route['remove/(:any)'] = "users/destroy/$1";
$route['delete/(:any)'] = "users/delete/$1";
$route['dashboard/admin'] = "users/admin_dash";
$route['dashboard'] = "users/user_dash";
$route['users/new'] = "users/admin_create";
$route['users/show/(:any)'] = "users/goto_user/$1";
$route['create_post/(:any)/(:any)'] = "posts/create/$1/$2";
$route['create_comment/(:any)/(:any)/(:any)'] = "posts/comment/$1/$2/$3";
$route['logout'] = "users/logout";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */