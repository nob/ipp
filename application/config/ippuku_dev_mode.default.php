<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| DEVELOPMENT MODE / TRANSLATING MODE 
|--------------------------------------------------------------------------
|  If dev_mode is set TRUE,  
|  - Access to controlers defined $config['dev_ctlrs'] will be allowed. //todo 
|  - Server IP address will be displayed at page header.  
|
|  If translating_mode is set TRUE,  
|  - All texts and messages difined in files under application/language/ dir 
|    will not be displayed to user's browser, the keys of the array in 
|    the file (=text codes or message codes) will be displayed instead.
|  
*/
$config['dev_mode']  = FALSE;
$config['dev_ctlrs'] = array('');

$config['translating_mode'] = false;
