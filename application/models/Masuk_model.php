<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_model extends CI_Model {

	var $table = 'tc_sur_masuk';
	var $table_disposisi = 'disposisi';
	var $column_order = array('tc_sur_masuk.no_surat','tc_sur_masuk.tgl_terima','tc_sur_masuk.sur_dari','tc_sur_masuk.perihal_surat',null); //set column field database for datatable orderable
	var $column_search = array('tc_sur_masuk.no_surat','tc_sur_masuk.tgl_terima','tc_sur_masuk.sur_dari','tc_sur_masuk.perihal_surat'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tc_sur_masuk.id_sur_masuk' => 'asc'); // default order 

// Construct --------------------------------------------------------------------------
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
// End Construct --------------------------------------------------------------------------

// private function _get_datatables_query() -------------------------------------------------------------------
	private function _get_datatables_query()
	{
		if($this->session->userdata('role_id') == '2'){
		$this->db->select('tc_sur_masuk.*');
		$this->db->from($this->table);
		$this->db->where('tc_sur_masuk.control=2');
		}else{
		if($this->session->userdata('role_id') == '5'){
		$this->db->select('tc_sur_masuk.*');
		$this->db->from($this->table);
		$this->db->where('tc_sur_masuk.control=5');
		$this->db->or_where("tc_sur_masuk.pro_disposisi='$_SESSION[name]'");
		}else{
		if($this->session->userdata('role_id') == '6'){
		$this->db->select('tc_sur_masuk.*');
		$this->db->from($this->table);
		$this->db->where('tc_sur_masuk.control=6');
		$this->db->or_where("tc_sur_masuk.pro_disposisi='$_SESSION[name]'");
		}else{
		if($this->session->userdata('role_id') == '4'){
		$this->db->select('tc_sur_masuk.*');
		$this->db->from($this->table);
		$this->db->where("tc_sur_masuk.pro_disposisi='$_SESSION[name]'");
		}else{
		$this->db->from($this->table);
		}}}}
		
		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
// end private function _get_datatables_query() -------------------------------------------------------------------

// function get_datatables() -------------------------------------------------------------------
	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
// End function get_datatables() -------------------------------------------------------------------

// function count_filtered() -------------------------------------------------------------------
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
// End function count_filtered() -------------------------------------------------------------------

// public function count_all() -------------------------------------------------------------------
	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
// End public function count_all() -------------------------------------------------------------------

// public function get_by_id($id) -------------------------------------------------------------------
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_sur_masuk',$id);
		$query = $this->db->get();

		return $query->row();
	}
// End public function get_by_id($id) -------------------------------------------------------------------
// public function delete($id) -------------------------------------------------------------------
public function delete_masuk($id)
{ 
    $this->db->delete('tc_sur_masuk', ['id_sur_masuk' => $id]);
}
 
// End public function delete($id) -------------------------------------------------------------------

// public function get_by_id_detail($id) -------------------------------------------------------------------
	public function get_by_id_detail($id)
	{
        $this->db->select('tc_sur_masuk.*,mt_client.nm_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_sur_masuk.sur_dari=mt_client.id_mt_client');
		$this->db->where('id_sur_masuk',$id);
		$query = $this->db->get();

		return $query->row();
	}
// End public function get_by_id_detail($id) -------------------------------------------------------------------

// public function save_masuk($data)-------------------------------------------------------------------
	public function save_masuk($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
// End public function save_masuk($data)-------------------------------------------------------------------

// public function save_disposisi($data)-------------------------------------------------------------------
	public function save_disposisi($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
// End Save (Disposisi) Data Tables Surat Masuk-------------------------------------------------------------------

// public function update($where, $data)-------------------------------------------------------------------
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
// End Update Data Tables Surat Masuk-------------------------------------------------------------------

// public function delete_by_id($id)-------------------------------------------------------------------
	public function delete_by_id($id)
	{
		$this->db->where('id_sur_masuk', $id);
		$this->db->delete($this->table);
	}
// End public function delete_by_id($id)-------------------------------------------------------------------

// Public function client()-------------------------------------------------------------------
	Public function client()
    {
        return $this->db->get('mt_client')->result_array();
	}
// End Public function client()-------------------------------------------------------------------

// Public function disposisi()-------------------------------------------------------------------
	Public function disposisi()
    {
        return $this->db->get('disposisi')->result_array();
	}
// End Public function disposisi()-------------------------------------------------------------------

// Public function nama()-------------------------------------------------------------------
	Public function nama()
    {
        return $this->db->get('dd_user')->result_array();
	}
// End Public function nama()-------------------------------------------------------------------

// Public function karyawan()-------------------------------------------------------------------
	Public function karyawan()
    {
        return $this->db->get('karyawan_v')->result_array();
	}
// End Public function karyawan()-------------------------------------------------------------------

// Public function get_surmasuk($id)-------------------------------------------------------------------

	public function get_surmasuk($id)
	{
		// return $this->db->get('tc_surat_masuk')->row_array();
		$this->db->select('tc_sur_masuk.*,mt_client.nm_persero,mt_client.alamat_email_client,mt_client.alamat_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_sur_masuk.sur_dari=mt_client.id_mt_client');
		$this->db->where('id_sur_masuk',$id);
		$query = $this->db->get();
		return $query->row();
	}
// End Public function karyawan()-------------------------------------------------------------------

// Public function user()-------------------------------------------------------------------
	Public function user()
    {
        $data['dd_user'] = $this->db->get_where('dd_user', ['username' => 
        $this->session->userdata('username')])->row_array();
    }
// End Public function user()-------------------------------------------------------------------

public function getSuratmasukId($id) // detail / Invoice
{
	$this->db->select('tc_sur_masuk.*,mt_client.alamat_email_client,mt_client.alamat_persero');
	$this->db->from($this->table);
	$this->db->join('mt_client','tc_sur_masuk.sur_dari=mt_client.nm_persero');
	$this->db->where('id_sur_masuk',$id);
	$query = $this->db->get();
	return $query->row_array();
}

public function getSuratmasukId2($id) // Print 
{
	$this->db->select('tc_sur_masuk.*,mt_client.alamat_email_client,mt_client.alamat_persero');
	$this->db->from($this->table);
	$this->db->join('mt_client','tc_sur_masuk.sur_dari=mt_client.nm_persero');
	$this->db->where('tc_sur_masuk.id_sur_masuk',$id);
	$query = $this->db->get();
	return $query->row_array();
}

// Public function get_disposisi($id)-------------------------------------------------------------------
Public function get_disposisi($id)
{
	$this->db->select('*');
	$this->db->from($this->table_disposisi);
	$this->db->where('id',$id);
	
	$query = $this->db->get();
	return $query->row();
}
// End Public function get_disposisi($id)-------------------------------------------------------------------

// function get_id_masuk()-------------------------------------------------------------------
	function get_id_masuk()
	{
        $q = $this->db->query("SELECT MAX(id_sur_masuk) AS kd_unik FROM tc_sur_masuk");
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


/* End of file M_skpd.php */
/* Location: ./application/models/M_kompetensi_bidang.php */
