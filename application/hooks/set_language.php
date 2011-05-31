<?php
function set_language()
{
    $CI =& get_instance();
    $CI->load->library('user_agent');
    if ($CI->agent->is_robot()) {
        $user_primary_lang = (mt_rand(0, 1) === 0) ? 'en' : 'ja'; //make robot recognize en and jp equally.
    } else {
        $accept_langs = $CI->agent->languages(); 
        $user_primary_lang = ($accept_langs[0] == 'ja') ? 'ja' : 'en'; 
    }
    //Retrieve langage code from URI segment and set it to controller. 
    $CI->lang_code = $CI->uri->segment(3, $user_primary_lang);  
    //Also, make the language code availabe within "view" file. 
    $CI->load->vars('lang', $CI->lang_code); 

} 
?>
