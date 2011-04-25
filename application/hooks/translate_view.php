<?php
function translate_view()
{
    $CI =& get_instance();

    //Get array of texts and messages for the specific language. 
    $ctlr_name = $CI->router->fetch_class();
    $lang = ($CI->uri->segment(3) === 'ja') ? 'japanese' : 'english';  
    $texts = $CI->lang->load($ctlr_name, $lang, TRUE);

    //Get current output HTML.
    $output = $CI->output->get_output();
    
    foreach ($texts as $code => $text) 
    {
        $replace = ($CI->config->item('translating_mode') === TRUE) ? $code : $text; 
        $replace = str_replace("\n", "<br/>", $replace);
        $output = str_replace("%%$code%%", $replace, $output);
    }

    $output = preg_replace('/%%(.+)%%/', '!!! $1: CODE NOT FOUND !!!', $output);

    echo $output;
} 
?>
