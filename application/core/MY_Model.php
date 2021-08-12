<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
  public $db, $ndb;
  function __construct() {
    parent::__construct();
    ini_set('max_execution_time', '-1');
    ini_set('memory_limit','-1');
	}
  
	function show($select = '*', $tabel = '', $and_where = array()){
		$usedb = $this->load->database('default',true);
    
		if($select != null && $select != '' && $select != '*') {
			$usedb->select($select);
		}

		$usedb->from($tabel);

		if(is_array($and_where)){
			$usedb->where($and_where);
		}

		return $usedb;
  }

  function create($data = array(), $table = ''){
    $usedb = $this->load->database("default",true);
    return $usedb->insert($table, $data);
  }

  function detail($id = "", $table = ""){
		$usedb = $this->load->database('default',true);
    
    $and_where["id"] = $id;
    
    $usedb->select("*");
    $usedb->from($table);
    $usedb->where($and_where);

    return $usedb->get()->row_array();
  }

  
  function update($set = array(),$and_where = array(),$tabel = ''){
		$usedb = $this->load->database("default",true);
    $update = $usedb->set($set);
    if(is_array($and_where)){
      if(!empty($and_where)){
        $update = $usedb->where($and_where);
      }
    }

    $update = $usedb->update($tabel);
    return $update;
  }

  function delete($and_where = array(),$tabel = ''){
		$usedb = $this->load->database("default",true);
    $hasil = FALSE;
    if ((!empty($and_where) OR !empty($or_where)) AND $tabel != NULL){
      if(is_array($and_where)){
        if(!empty($and_where)){
          $hasil	= $usedb->where($and_where);
        }
      }
      $hasil = $usedb->delete($tabel);
    }
    return $hasil;
  }
}
?>
