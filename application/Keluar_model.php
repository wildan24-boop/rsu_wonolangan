<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar_model extends CI_Model {

	var $table = 'tc_surat_keluar';
	var $column_order = array('tc_surat_keluar.tgl_surat','tc_surat_keluar.tgl_kirim','tc_surat_keluar.nomor',null); //set column field database for datatable orderable
	var $column_search = array('tc_surat_keluar.nomor','tc_surat_keluar.hal'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('tc_surat_keluar.id_tc_surat_keluar' => 'asc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

//admin

	private function _get_datatables_query()
	{
		$this->db->select('tc_surat_keluar.*, mt_client.nm_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_surat_keluar.id_mt_client=mt_client.id_mt_client');

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

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
        $this->db->select('tc_surat_keluar.*, mt_client.nm_persero');
		$this->db->from($this->table);
		$this->db->join('mt_client','tc_surat_keluar.id_mt_client=mt_client.id_mt_client');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
        $this->db->from($this->table);
		$this->db->where('id_tc_surat_keluar',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save_keluar($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_tc_surat_keluar', $id);
		$this->db->delete($this->table);
	}

	Public function client()
    {
        return $this->db->get('mt_client')->result_array();
	}
	
// function get_id_keluar()-------------------------------------------------------------------
	function get_id_keluar()
	{
		$q = $this->db->query("SELECT MAX(id_tc_surat_keluar) AS kd_unik FROM tc_surat_keluar");
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
// Endfunction get_id_keluar()-------------------------------------------------------------------


// Public function get_surkeluar($id)-------------------------------------------------------------------

public function get_surkeluar($id)
{
	// return $this->db->get('tc_surat_masuk')->row_array();
	$this->db->select('tc_surat_keluar.*,mt_client.nm_persero');
	$this->db->from($this->table);
	$this->db->join('mt_client','tc_surat_keluar.id_mt_client=mt_client.id_mt_client');
	$this->db->where('id_tc_surat_keluar',$id);
	$query = $this->db->get();

		return $query->row_array();
}

// End Public function karyawan()-------------------------------------------------------------------


}

/* End of file M_skpd.php */
/* Location: ./application/models/M_kompetensi_bidang.php */
