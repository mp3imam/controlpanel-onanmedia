<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = "http://".$_SERVER['HTTP_HOST'];
$config['base_url'] .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/';
//$config['base_url'] .= preg_replace('@/+$@','',dirname($_SERVER['SCRIPT_NAME'])).'/index.php/';
$config['index_page'] = 'index.php';
$config['uri_protocol']	= 'AUTO';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'JINGGA_';
//$config['composer_autoload'] = 'vendor/autoload.php';
//$config['composer_autoload'] = FALSE;
$config['composer_autoload'] = realpath(APPPATH . '../vendor/autoload.php');
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['log_threshold'] = 0;
$config['log_path'] = '';
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['encryption_key'] = 'dfALfpwMG98smd764JfpdfCVB0065sgj';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'bjsdigital_session';
$config['sess_expiration'] = 100000;
$config['sess_save_path'] = NULL;
$config['sess_match_ip'] = FALSE;
$config['sess_time_to_update'] = 100000;
$config['sess_regenerate_destroy'] = FALSE;
$config['cookie_prefix']	= '';
$config['cookie_domain']	= '';
$config['cookie_path']		= '/';
$config['cookie_secure']	= FALSE;
$config['cookie_httponly'] 	= FALSE;
$config['standardize_newlines'] = FALSE;
$config['global_xss_filtering'] = FALSE;

$config['csrf_protection'] = FALSE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 100000;
$config['csrf_regenerate'] = TRUE;
$config['csrf_exclude_uris'] = array();

$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';

$config['folder_name'] = 'salesorder/';
$config['s3_access_key'] = 'AKIAWECRVZV7H3RBKVU2';
$config['s3_secret_key'] = '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';
$config['s3_bucket_name'] = 'ptapegroup';
$config['s3_bucket_url'] = 'https://ptapegroup.s3.amazonaws.com';

$config['token_key'] = '7nUzT6k%#KiVVrJuD7#Ans2DRwXDcjD9Y4yKXRy3';
$config['app_name'] = 'SIMPONI';


/*
$config['use_ssl'] = TRUE;
$config['verify_peer'] = TRUE;

$config['access_key'] = 'AKIAWECRVZV7H3RBKVU2';
$config['secret_key'] = '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';
$config['bucket_name'] = 'ptapegroup';
$config['folder_name'] = 'salesorder';
$config['s3_url'] = 'https://ptapegroup.s3.amazonaws.com/';
$config['get_from_enviroment'] = FALSE;
$config['access_key_envname'] = 'AKIAWECRVZV7H3RBKVU2';
$config['secret_key_envname'] = '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';

if($config['get_from_enviroment']){
	$config['access_key'] = getenv($config['access_key_envname']);
	$config['secret_key'] = getenv($config['secret_key_envname']);
}
*/
