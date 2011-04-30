<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
        $vars['with_intro'] = ($this->uri->segment(1) === 'home') ? false : true;
		$this->load->view('home', $vars);
	}

    public function json()
    {
        $lang = ($this->uri->segment(3) === 'ja') ? 'japanese' : 'english';
        echo  json_encode($this->lang->load('home', $lang, TRUE));
        exit;
    }
}
