<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    var $table = 'dd_user';
// Construct --------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }
    
    Public function contact()
	{  
        $query ="SELECT `dd_user`.*, `mt_karyawan`.`email`,`mt_karyawan`.`alamat`,`mt_karyawan`.`no_hp`,`mt_karyawan`.`status`,`mt_jabatan`.`nama_jabatan`,`user_role`.`role`
                 FROM `dd_user` 
                 JOIN `mt_karyawan` ON `dd_user`.`no_induk` = `mt_karyawan`.`no_induk`   
                 JOIN `mt_jabatan` ON `mt_karyawan`.`kode_jabatan` = `mt_jabatan`.`kode_jabatan`   
                 JOIN `user_role` ON `dd_user`.`role_id` = `user_role`.`id` 
                 WHERE `dd_user`.`username` = '$_SESSION[username]'
        ";
       return  $this->db->query($query)->row_array();  
    }
    
    public function getContactById($id)
    {
        $query ="SELECT `dd_user`.*, `mt_karyawan`.`email`,`mt_karyawan`.`alamat`,`mt_karyawan`.`no_hp`,`mt_karyawan`.`status`,`mt_jabatan`.`nama_jabatan`,`user_role`.`role`
                 FROM `dd_user` 
                 JOIN `mt_karyawan` ON `dd_user`.`no_induk` = `mt_karyawan`.`no_induk`   
                 JOIN `mt_jabatan` ON `mt_karyawan`.`kode_jabatan` = `mt_jabatan`.`kode_jabatan`   
                 JOIN `user_role` ON `dd_user`.`role_id` = `user_role`.`id`   
                 WHERE `dd_user`.`id_dd_user` = $id
        ";
         return  $this->db->query($query)->row_array();

    }

    Public function inbok()
	{  
        $query ="SELECT `mt_email`.*
                 FROM `mt_email` 
                 WHERE `name` = '$_SESSION[name]'
                 
        ";
       return  $this->db->query($query)->result_array();  
    }

    public function getAllTulis()
        {
            return $this->db->get('mt_email')->result_array();
        }

    public function getAllKaryawan()
        {
            return $this->db->get('mt_karyawan')->result_array();
        }

    public function tambahDataTulis($file_email)
        {
            $data=[
                "name" => $this->input->post('name', true),
                "tgl_input" =>  date("Y-m-d H:i:s"),
                "to" => $this->input->post('to', true),
                "subject" => $this->input->post('subject', true), 
                "message" => $this->input->post('message', true),
                "file" => $file_email, 
        
            ];
            $this->db->insert('mt_email', $data);   
        }
    
// function get_id_masuk()-------------------------------------------------------------------
	function get_id_unik()
	{
        $q = $this->db->query("SELECT MAX(id_mt_email) AS kd_unik FROM mt_email");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ($k->kd_unik)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        // date_default_timezone_set('Asia/Jakarta');
        return $kd;
    }
// Endfunction get_id_masuk()-------------------------------------------------------------------

	}