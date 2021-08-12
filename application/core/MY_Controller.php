<?php
class MY_Controller extends CI_Controller {
	public function template($view = '', $view_data = array()){
		$judul = 'WEB PERUSAHAAN';
		$view_data['judul'] = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
    $template = "templates/index";
		$this->template->load($template, $view, $view_data);
	}
}