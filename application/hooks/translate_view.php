<?php
function translate_view()
{
    $CI =& get_instance();

    //Get array of texts and messages for the specific language. 
    $lang_name = ($CI->lang_code === 'ja') ? 'japanese' : 'english';  
    $ctlr_name = $CI->router->fetch_class();
    $texts = $CI->lang->load($ctlr_name, $lang_name, TRUE);
    
    //Replace current output HTML with translated texts and mesages.
    $output = $CI->output->get_output();
    foreach ($texts as $code => $text) 
    {
        $replace = ($CI->config->item('translating_mode') === TRUE) ? $code : $text; 
        $replace = str_replace("\n", "<br/>", $replace);
        $output = str_replace("%%$code%%", $replace, $output);
    }
    //Replace error.
    $output = preg_replace('/%%(.+)%%/', '!!! CODE:$1 IS NOT TRANSLATED !!!', $output);

    //final output. 
    echo $output;
} 
?>
