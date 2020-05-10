<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Odprajal_model extends CI_Model
{    
        var $table = 'tc_daftar_pasien';
        var $column_order = array('tc_daftar_pasien.no_rm','tc_daftar_pasien.nama_pasien','tc_daftar_pasien.tgl_lahir','tc_daftar_pasien.umur','tc_daftar_pasien.tgl_pemeriksaan','tc_daftar_pasien.diagnosa_masuk','tc_daftar_pasien.komorbid','tc_daftar_pasien.stats_covid_awal','tc_daftar_pasien.totalaksana',null); //set column field database for datatable orderable
        var $column_search = array('tc_daftar_pasien.no_rm','tc_daftar_pasien.nama_pasien','tc_daftar_pasien.tgl_lahir','tc_daftar_pasien.umur','tc_daftar_pasien.tgl_pemeriksaan','tc_daftar_pasien.diagnosa_masuk','tc_daftar_pasien.komorbid','tc_daftar_pasien.stats_covid_awal','tc_daftar_pasien.totalaksana'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        var $order = array('tc_daftar_pasien.id_daftar_pasien' => 'asc'); // default order 
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
    
    //admin
    
        private function _get_datatables_query()
        {
            $this->db->select('tc_daftar_pasien.*, mt_pasien_covid.nama_pasien, mt_pasien_covid.tgl_lahir, mt_pasien_covid.jenkel');
            $this->db->from($this->table);
            $this->db->join('mt_pasien_covid','tc_daftar_pasien.no_rm=mt_pasien_covid.no_rm');
		    $this->db->where('tc_daftar_pasien.control=2');
            // $this->db->from($this->table);
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
            $this->db->select('tc_daftar_pasien.*, mt_pasien_covid.nama_pasien, mt_pasien_covid.tgl_lahir, mt_pasien_covid.jenkel');
            $this->db->from($this->table);
            $this->db->join('mt_pasien_covid','tc_daftar_pasien.no_rm=mt_pasien_covid.no_rm');
		    $this->db->where('tc_daftar_pasien.control=2');
            // $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    
        public function get_by_id($id)
        {
            $this->db->from($this->table);
            $this->db->where('id_daftar_pasien',$id);
            $query = $this->db->get();
    
            return $query->row();
        }
    
        public function save_odprajal($data)
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
            $this->db->where('id_daftar_pasien', $id);
            $this->db->delete($this->table);
        }
    
        Public function odpRajal()
        {
            return $this->db->get('tc_daftar_pasien')->result_array();
        }
        
        Public function masterPasien()
        {
            return $this->db->get('mt_pasien_covid')->result_array();
        }
   
        public function detailOdprajal($id) // detail / Invoice
        {
            $this->db->select('tc_daftar_pasien.*, mt_pasien_covid.nama_pasien, mt_pasien_covid.tgl_lahir, mt_pasien_covid.jenkel, mt_pasien_covid.umur, mt_pasien_covid.alamat_lengkap, mt_pasien_covid.kecamatan, mt_pasien_covid.kab_kota, mt_pasien_covid.kota_lain');
            $this->db->from($this->table);
            $this->db->join('mt_pasien_covid','tc_daftar_pasien.no_rm=mt_pasien_covid.no_rm');
		    $this->db->where('id_daftar_pasien',$id);;
            $query = $this->db->get();
            return $query->row_array();
        }
    /* End of file M_skpd.php */
    /* Location: ./application/models/M_kompetensi_bidang.php */
    

function get_data_pasien_bykode($no_rm){
        $hsl= $this->db->query("SELECT * FROM tc_daftar_pasien WHERE no_rm='$no_rm'");
        // $hsl=
        // $this->db->select('tc_daftar_pasien.*, mt_pasien_covid.no_rm');
        // $this->db->from($this->table);
        // $this->db->join('mt_pasien_covid','tc_daftar_pasien.no_rm=mt_pasien_covid.no_rm');
        // $this->db->where("tc_daftar_pasien.no_rm='$no_rm");

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'no_rm' => $data->no_rm,
					'nama_pasien' => $data->nama_pasien,
					'tgl_lahir' => $data->tgl_lahir,
					);
			}
		}
		return $hasil;
    }
}