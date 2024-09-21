<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';

//route for Language
$route['english']  = 'home/set_english';
$route['french'] = 'home/set_french';

$route['404_override'] = 'auth/error_404';
$route['translate_uri_dashes'] = FALSE;

// front route 
$route['how-it-works']          = 'home/how_it_works';
$route['blog']                  = 'home/blog';
// $route['blog-post/(:any)']   = 'home/blog_post/$1';
$route['blog/(:any)']           = 'home/blog_post/$1';
$route['about-us']              = 'home/about_us';
$route['portfolio']              = 'home/portfolio';
$route['portfolio_details/(:any)']      = 'home/portfolio_details/$1';
$route['contact-us']            = 'home/contact_us';
$route['prices']                = 'home/prices';
$route['privacy-policy']        = 'home/privacy_policy';
$route['terms-of-use']          = 'home/terms_of_use';


$route['login']         = 'auth/index';
$route['profile']       = 'home/profile';
$route['logout']        = 'home/logout';
$route['register']      = 'auth/register';
$route['blog']      = 'home/blog';
$route['contact_us']      = 'home/contact_us';

$route['change_login_password']      = 'auth/change_login_password';
$route['menu/get_sub_category'] = 'menu/get_sub_category';
$route['menu/get_product'] = 'menu/get_product';
$route['menu/get_subcategory_product'] = 'menu/get_subcategory_product';
$route['menu/menu_store_model'] = 'menu/menu_store_model';
$route['menu/get_product_detail'] = 'menu/get_product_detail';
$route['menu/(:any)']      = 'menu/index/$1';
$route['myevent/edit/(:any)']   = 'myevent/add/$1';
$route['event/(:any)']   = 'event/index/$1';
$route['event-success']   = 'event/event_success';

// function id aveto (:any) = $1; use karvu 
$route['product/(:any)']   = 'home/product/$1';
$route['products/(:any)']   = 'home/products/$1';
$route['wishlist/(:any)']   = 'home/wishlist/$1';
$route['wishlist_sessions/(:any)']   = 'home/wishlist_sessions/$1';
$route['wishlist/(:any)']   = 'home/wishlist/$1';
$route['wishlist_session/(:any)']   = 'home/wishlist_session/$1';
$route['direct_cart/(:any)']   = 'home/direct_cart/$1';
$route['direct_carts/(:any)']   = 'home/direct_carts/$1';
$route['about_us'] = 'home/about_us';
$route['all_product'] = 'home/allproduct';
$route['grid'] = 'home/grid';
$route['sign_in'] = 'home/sign_in';
$route['register'] = 'home/register';
$route['account'] = 'home/account';
$route['wishlist'] = 'home/wishlist';
$route['cart'] = 'home/cart';
$route['grid'] = 'home/grid';
$route['checkout'] = 'home/checkout';
$route['account'] = 'home/account';
$route['profile'] = 'home/profile_data';
$route['address'] = 'home/address';
$route['logout/(:any)'] = 'home/logout/$1';
$route['shopping_details'] = 'home/shopping_details';


// route for backend

// login
$route['backend'] = 'backend/auth/login';
$route['backend/login'] = 'backend/auth/login';
$route['backend/logout'] = 'backend/auth/logout';
$route['backend/dashboard'] = 'backend/admin/dashboard';
$route['backend/access_denied'] = 'backend/admin/access_denied';  

// orderdetail
$route['backend/order_detail'] = 'backend/orderdetails/order_detail';  
$route['backend/edit/(:any)'] = 'backend/orderdetails/edit/$1'; 
$route['backend/delete/(:any)'] = 'backend/orderdetails/delete/$1';
$route['backend/view/(:any)'] = 'backend/orderdetails/view/$1';

// product
$route['backend/product_detail'] = 'backend/product/product_detail';
$route['backend/product_table'] = 'backend/product/product_table';

// Settings
$route['backend/settings'] = 'backend/setting/settings';
$route['backend/setting_form/(:any)']   = 'backend/setting/setting_form/$1';

// category
$route['backend/category_detail'] = 'backend/category/category_detail';
$route['backend/category_table'] = 'backend/category/category_table';

// banner
$route['backend/banner_table'] = 'backend/banner/table';
$route['backend/banner_form'] = 'backend/banner/form';


// blog
$route['backend/blog_form'] = 'backend/blog/form';
$route['backend/blog_table'] = 'backend/blog/table';
$route['backend/blog_update/(:any)'] = 'backend/blog/blog_update/$1';
$route['backend/blog_delete/(:any)'] = 'backend/blog/blog_delete/$1';

// portfolio
$route['backend/portfolio_form'] = 'backend/portfolio/form';
$route['backend/portfolio_table'] = 'backend/portfolio/table';
$route['backend/portfolio_update/(:any)'] = 'backend/portfolio/portfolio_update/$1';
$route['backend/portfolio_delete/(:any)'] = 'backend/portfolio/portfolio_delete/$1';

// user/register
$route['backend/user'] = 'backend/register/register_table';
// $route['backend/user'] = 'backend/register/register_table';
$route['backend/view/(:any)'] = 'backend/register/view/$1';




$route['backend/event/edit/(:any)']   = 'backend/event/event_edit/$1';
$route['backend/event/view/(:any)']   = 'backend/event/event_view/$1';
$route['backend/smsgateway'] = 'backend/admin/smsgateway';
$route['backend/phonebook-list'] = 'backend/phonebook/phonebook_list';
$route['backend/detail'] = 'backend/base_url/detail';
$route['backend/mail-setting'] = 'backend/admin/mail_setting';
$route['backend/data'] = 'backend/ragister/data';
$route['backend/profile'] = 'backend/admin/profile';
$route['backend/change-login-password'] = 'backend/admin/change_login_password';
$route['backend/system-setting'] = 'backend/admin/system_setting';
$route['backend/company-profile'] = 'backend/admin/company_profile';
$route['backend/privacy-setting'] = 'backend/admin/privacy';
$route['backend/faq-setting'] = 'backend/admin/faq_setting';
$route['backend/user_role/edit/(:any)'] = 'backend/user_role/add/$1';
$route['backend/languages/edit/(:any)'] = 'backend/languages/add/$1';
$route['backend/technician_input/edit/(:any)'] = 'backend/technician_input/add/$1';
$route['backend/users/edit/(:any)'] = 'backend/users/add/$1';
$route['backend/blog/edit/(:any)']   = 'backend/blog/add/$1';
 