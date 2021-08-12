<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian extends MY_Controller {

	public function index()
	{
		$data['title'] = "List";
		$this->template($this->router->class.'/list', $data);
	}

	public function add()
	{
		$data['title'] = "add";
		$this->template($this->router->class.'/manage', $data);
	}
}
