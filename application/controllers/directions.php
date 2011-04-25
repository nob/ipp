<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directions extends CI_Controller {

	public function index()
	{
		$this->load->view('directions');
	}
}
