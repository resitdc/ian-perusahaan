<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends MY_Controller {
  public $table;
  function __construct() {
    parent::__construct();
		$this->table = "golongan";
	}
	public function index()
	{
		$list_data = $this->master_model->show("*", $this->table)->get();
		
		$data['title'] = "List";
		$data['list_data'] = $list_data->result_array();
		$data['form_add'] = site_url($this->router->class.'/form/Add');
		$data['form_edit'] = site_url($this->router->class.'/form/Edit');
		$data['form_detail'] = site_url($this->router->class.'/form/Detail/yes');
		$this->template($this->router->class.'/list', $data);
	}

	public function form($form_title = "", $detail = "no") {
		$id = $this->input->post("id");
		$id_params = !empty($id) ? "/$id" : "";
		$detail_data = array();
		if(!empty($id)){
			$detail_data = $this->master_model->detail($id, $this->table);
		}
		$save_url = site_url($this->router->class."/save$id_params");
		$data['form_title'] = $form_title;
		$data['save_url'] = $save_url;
		$data['detail'] = $detail == "yes" ? true : false;
		$data['detail_data'] = $detail_data;
		$this->load->view($this->router->class.'/manage', $data);
	}

	public function save($id = "") {
		$response["success"] = false;
		$response["message"] = "Terjadi kesalahan";
		$data_input = $this->input->post();

		if(!empty($id)){
			$where['id'] = $id;
			$update = $this->master_model->update($data_input, $where, $this->table);
			if($update){
				$response["success"] = true;
				$response["message"] = "Data berhasil diupdate";
			}else{
				$response["message"] = "Data gagal diupdate";
			}
		}else{
			$create = $this->master_model->create($data_input, $this->table);
			if($create){
				$response["success"] = true;
				$response["message"] = "Data berhasil ditambahkan";
			}else{
				$response["message"] = "Data gagal ditambahkan";
			}
		}

		echo json_encode($response);
	}
}
