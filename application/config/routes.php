<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller']   = 'home';

$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

//frontend home start
$route['contact']       = 'home/contact';
$route['shop']          = 'home/shop';
$route['blog']          = 'home/blog';
$route['blog-detail']   = 'home/blog_detail';
$route['shopping-cart'] = 'home/cart';
$route['check-out']     = 'home/check_out';
$route['register']      = 'home/register';
$route['login-user']    = 'home/login';
//frontend home end


//login for dashboard
$route['login']    = 'login';
$route['formpost'] = 'login/formpost';

$route['dashboard']   = 'dashboard';
$route['logout']      = 'dashboard/logout';
$route['widgets']     = 'dashboard/widgets';
$route['fetch-category'] = 'dashboard/fetch_category';

//Category Start
$route['add-category']           = 'dashboard/add_category';
$route['submit-category']        = 'dashboard/submit_category';
$route['show-category']          = 'dashboard/all_category';
$route['edit-category/(:any)']   = 'dashboard/edit_category/$1';
$route['update-category']        = 'dashboard/update_category';
$route['delete-category/(:any)'] = 'dashboard/delete_category/$1';

$route['ajax-category-data']     = 'dashboard/ajax_category_data';
//Category End

//Product Start
$route['add-product']           = 'product/add_product';
$route['submit-product']        = 'product/submit_product';
$route['show-product']          = 'product/show_product';
$route['edit-product/(:any)']   = 'product/edit_product/$1';
$route['update-product']        = 'product/update_product';
$route['delete-product/(:any)'] = 'product/delete_product/$1';

$route['ajax-product-data']     = 'product/ajax_product_data';
//product End

//User Start
$route['add-user']               = 'user/add_user';
$route['submit-user']            = 'user/submit_user';
$route['show-user']              = 'user/show_user';
$route['edit-user/(:any)']       = 'user/edit_user/$1';
$route['update-user']            = 'user/update_user';
$route['edit-user-image']        = 'user/edit_user_image';
$route['delete-user/(:any)']     = 'user/delete_user/$1';

$route['ajax-user-data']         = 'user/ajax_user_data';

$route['fetch-user']             = 'user/fetch_user';
//user end

//Slider Start
//$route['add-slider']           = 'slider/add_slider';
$route['submit-slider']           = 'slider/submit_slider';
$route['show-slider']             = 'slider/show_slider';
//Slider End

//Brand Start
$route['add-brand']           = 'brand/add_brand';
$route['submit-brand']        = 'brand/submit_brand';
$route['show-brand']          = 'brand/show_brand';
$route['edit-brand/(:any)']   = 'brand/edit_brand/$1';
$route['update-brand']        = 'brand/update_brand';
$route['delete-brand/(:any)'] = 'brand/delete_brand/$1';
//Brand End 

//Color Start
$route['add-color']           = 'color/add_color';
$route['submit-color']        = 'color/submit_color';
$route['show-color']          = 'color/show_color';
$route['edit-color/(:any)']   = 'color/edit_color/$1';
$route['update-color']        = 'color/update_color';
$route['delete-color/(:any)'] = 'color/delete_color/$1';
//Color End

//Size Start
$route['add-size']           = 'size/add_size';
$route['submit-size']        = 'size/submit_size';
$route['show-size']          = 'size/show_size';
$route['edit-size/(:any)']   = 'size/edit_size/$1';
$route['update-size']        = 'size/update_size';
$route['delete-size/(:any)'] = 'size/delete_size/$1';
//Size End

//Cart Start
$route['cart']                      = 'cart';
$route['add-cart/(:any)']           = 'cart/add_cart/$1';
$route['remove-cart/(:any)']        = 'cart/remove_cart/$1';
$route['update-cart-qty/(:any)']    = 'cart/update_cart_qty/$1';
//Cart End