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
$route['default_controller'] = 'question';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$base_url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];


$pos = strpos($base_url,"admin_panel");

if($pos == false) {
	$config['base_url'] = $base_url;	
	$flag = '1';
	
	if(!empty($_SERVER['ORIG_PATH_INFO'])){
		$expo1 = explode("/",$_SERVER['ORIG_PATH_INFO']);
	}elseif(!empty($_SERVER['PATH_INFO'])){
		$expo1 = explode("/",$_SERVER['PATH_INFO']);
	}else{
		$expo1 = explode("/",$_SERVER['REQUEST_URI']);
	}
	
	$conntrol = !empty($expo1['2'])?$expo1['2']:'';

	if($conntrol == "user_panel")
	{
		$expo1 = explode("user_panel/",$base_url);
	}
	
	$config['base_url'] = $expo1[0];	
	
	$expp = !empty($expo1[1])?$expo1[1]:'';
	
	$expo = explode("/",$expp);
	
	//echo "<pre>"; print_R($expo);
	$conntrol = !empty($expo['0'])?$expo['0']:'';	
	
} else {
	$expo1 = explode("admin_panel/",$base_url);
	$config['base_url'] = $expo1[0];	
	
	$expp = !empty($expo1[1])?$expo1[1]:'';
	
	$expo = explode("/",$expp);
	$conntrol = !empty($expo['0'])?$expo['0']:'';
	
	$flag = '2';
}

if($flag == 2){
	$route['admin_panel/'.$conntrol] = 'admin_panel/'.$conntrol.'/'.$conntrol;
	$route['admin_panel/'.$conntrol.'/add'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add';
	$route['admin_panel/'.$conntrol.'/addquestionoption'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/addquestionoption';
	$route['admin_panel/'.$conntrol.'/edit/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/edit';
	$route['admin_panel/'.$conntrol.'/insert_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/insert_data';
	$route['admin_panel/'.$conntrol.'/update_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_data';
	$route['admin_panel/'.$conntrol.'/add_new_first_lavel_item'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_new_first_lavel_item';
	$route['admin_panel/'.$conntrol.'/add_new_second_lavel_item'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_new_second_lavel_item';
	$route['admin_panel/'.$conntrol.'/insert_first_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/insert_first_data';
	$route['admin_panel/'.$conntrol.'/insert_second_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/insert_second_data';
	$route['admin_panel/'.$conntrol.'/update_first_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_first_data';
	$route['admin_panel/'.$conntrol.'/update_second_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_second_data';
	$route['admin_panel/'.$conntrol.'/get_page_detail'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/get_page_detail';
	$route['admin_panel/'.$conntrol.'/menu_delete'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/menu_delete';
	$route['admin_panel/'.$conntrol.'/site_favicon'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/site_favicon';
	$route['admin_panel/'.$conntrol.'/front_page'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/front_page';
	$route['admin_panel/'.$conntrol.'/footer'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/footer';
	$route['admin_panel/'.$conntrol.'/update_logo_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_logo_data';
	$route['admin_panel/'.$conntrol.'/update_site_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_site_data';
	$route['admin_panel/'.$conntrol.'/update_footer_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_footer_data';
	$route['admin_panel/'.$conntrol.'/single_page_header_image'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/single_page_header_image';
	$route['admin_panel/'.$conntrol.'/filter_option'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_option';
	$route['admin_panel/'.$conntrol.'/price_range'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/price_range';
	$route['admin_panel/'.$conntrol.'/price_delete'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/price_delete';
	$route['admin_panel/'.$conntrol.'/site_name'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/site_name';
	$route['admin_panel/'.$conntrol.'/orderidseries'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/orderidseries';
	$route['admin_panel/'.$conntrol.'/update_favicon_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_favicon_data';
	$route['admin_panel/'.$conntrol.'/update_single_page_header_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_single_page_header_data';
	$route['admin_panel/'.$conntrol.'/update_orderid_series'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/update_orderid_series';
	$route['admin_panel/'.$conntrol.'/remove_block'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/remove_block';
	$route['admin_panel/'.$conntrol.'/remove_item'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/remove_item';
	$route['admin_panel/'.$conntrol.'/add_first_level_menu/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_first_level_menu';
	$route['admin_panel/'.$conntrol.'/add_second_level_menu/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_second_level_menu';
	/* SLIDER */
		$route['admin_panel/'.$conntrol.'/categories_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/categories_list';
		$route['admin_panel/'.$conntrol.'/add_slider'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_slider';
		$route['admin_panel/'.$conntrol.'/edit_slider/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/edit_slider';
		$route['admin_panel/'.$conntrol.'/add_slider_image'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_slider_image';
		$route['admin_panel/'.$conntrol.'/slider_insert_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/slider_insert_data';
		$route['admin_panel/'.$conntrol.'/slider_update_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/slider_update_data';
		$route['admin_panel/'.$conntrol.'/all_slider'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/all_slider';
	/* SLIDER */
	/* TEMPLATE */
		$route['admin_panel/'.$conntrol.'/add_template'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_template';
	/* TEMPLATE */
	/* CMS PAGE */
		$route['admin_panel/'.$conntrol.'/set_page_url'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/set_page_url';
		$route['admin_panel/'.$conntrol.'/move_to_trash'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/move_to_trash';
		$route['admin_panel/'.$conntrol.'/trash_page'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/trash_page';
		$route['admin_panel/'.$conntrol.'/move_to_root'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/move_to_root';
		$route['admin_panel/'.$conntrol.'/remove_page'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/remove_page';
	/* CMS PAGE */
	/* Blog */
		$route['admin_panel/'.$conntrol.'/blog_categories_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/blog_categories_list';
		$route['admin_panel/'.$conntrol.'/add_categories'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/add_categories';
		$route['admin_panel/'.$conntrol.'/edit_categories'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/edit_categories';
		$route['admin_panel/'.$conntrol.'/categories_insert_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/categories_insert_data';
		$route['admin_panel/'.$conntrol.'/categories_update_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/categories_update_data';
		$route['admin_panel/'.$conntrol.'/set_blog_url'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/set_blog_url';
		$route['admin_panel/'.$conntrol.'/set_cat_blog_url'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/set_cat_blog_url';
		$route['admin_panel/'.$conntrol.'/blog_delete'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/blog_delete';
		$route['admin_panel/'.$conntrol.'/edit_set_cat_blog_url'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/edit_set_cat_blog_url';
	/* Blog */
	/* Email template */
		$route['admin_panel/'.$conntrol.'/active_record'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/active_record';
		$route['admin_panel/'.$conntrol.'/deactive_record'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/deactive_record';
	/* Email template */
	/* Art List */
		$route['admin_panel/'.$conntrol.'/page'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/page';
		$route['admin_panel/'.$conntrol.'/page/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/page';
		$route['admin_panel/'.$conntrol.'/filter_art_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_art_list';
		$route['admin_panel/'.$conntrol.'/filter_approve_art_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_approve_art_list';
		$route['admin_panel/'.$conntrol.'/filter_reject_art_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_reject_art_list';
		$route['admin_panel/'.$conntrol.'/approve_art'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/approve_art';
		$route['admin_panel/'.$conntrol.'/reject_art'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/reject_art';
		$route['admin_panel/'.$conntrol.'/approve_art_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/approve_art_list';
		$route['admin_panel/'.$conntrol.'/approve_art_list/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/approve_art_list';
		$route['admin_panel/'.$conntrol.'/reject_art_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/reject_art_list';
		$route['admin_panel/'.$conntrol.'/reject_art_list/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/reject_art_list';
		$route['admin_panel/'.$conntrol.'/view_art'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/view_art';
	/* Art List */
	/* Art Upload */
		$route['admin_panel/'.$conntrol.'/upload_item/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/upload_item';
		$route['admin_panel/'.$conntrol.'/uploadartdeatils/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/uploadartdeatils';
		$route['admin_panel/'.$conntrol.'/uploadartitem/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/uploadartitem';
		$route['admin_panel/'.$conntrol.'/get_edit_art_option'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/get_edit_art_option';
		$route['admin_panel/'.$conntrol.'/edit_upload_art_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/edit_upload_art_data';
		$route['admin_panel/'.$conntrol.'/upload_art_data'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/upload_art_data';
		$route['admin_panel/'.$conntrol.'/remove_art_detail_in_session'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/remove_art_detail_in_session';
	/* Art Upload */
	/* Notification */
		$route['admin_panel/'.$conntrol.'/filter_notification'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_notification';
		$route['admin_panel/'.$conntrol.'/view_notification'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/view_notification';
		$route['admin_panel/'.$conntrol.'/delete_notification'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/delete_notification';
	/* Notification */
	/* Order */
		$route['admin_panel/'.$conntrol.'/filter_order_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_order_list';
		$route['admin_panel/'.$conntrol.'/order/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/order';
		$route['admin_panel/'.$conntrol.'/view_order'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/view_order';
		$route['admin_panel/'.$conntrol.'/changeorderstatus'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/changeorderstatus';
		$route['admin_panel/'.$conntrol.'/admingenrateorderpdf'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/admingenrateorderpdf';
		$route['admin_panel/'.$conntrol.'/adminartistgenrateorderpdf'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/adminartistgenrateorderpdf';
		$route['admin_panel/'.$conntrol.'/artist_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/artist_list';
		$route['admin_panel/'.$conntrol.'/filter_artist_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_artist_list';
		$route['admin_panel/'.$conntrol.'/artist_list/(:num)'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/artist_list';
		$route['admin_panel/'.$conntrol.'/artist_order_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/artist_order_list';
		$route['admin_panel/'.$conntrol.'/artist_view_order'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/artist_view_order';
		$route['admin_panel/'.$conntrol.'/filter_artist_order_list'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/filter_artist_order_list';
	/* Order */
	/* SUBSCRIBER */
		$route['admin_panel/'.$conntrol.'/send_email'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/send_email';
		$route['admin_panel/'.$conntrol.'/sendemail'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/sendemail';
		$route['admin_panel/'.$conntrol.'/getsubscriber'] = 'admin_panel/'.$conntrol.'/'.$conntrol.'/getsubscriber';
	/* SUBSCRIBER */
}else{
	$route[$conntrol] = $conntrol."/".$conntrol;
}

$route['index'] = "index/index";
$route['index/(:num)'] = "index/index";
$route['index/msg/(:any)'] ="index/index";

$route['admin_panel'] = "admin_panel/login";	
$route['admin_panel/logout'] = "admin_panel/logout";
$route['admin_panel/dashboard'] = "admin_panel/index/dashboard";	

