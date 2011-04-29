<?php
function set_language()
{
    $CI =& get_instance();
    //Retrieve langage code from URI segment and set it to controller. 
    $CI->lang_code = $CI->uri->segment(3, 'en');  
    //Also, make the language code availabe within "view" file. 
    $CI->load->vars('lang', $CI->lang_code); 

} 
?>
