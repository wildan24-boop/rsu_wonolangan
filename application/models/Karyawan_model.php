<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{    
        var $table = 'mt_karyawan';
        var $table2 = 'mt_jabatan';
        var $column_order = array('mt_karyawan.no_induk','mt_karyawan.nama_pegawai','mt_karyawan.kd_jabatan','mt_karyawan.kode_jabatan','mt_karyawan.kode_bagian',null); //set column field database for datatable orderable
        var $column_search = array('mt_karyawan.no_induk','mt_karyawan.nama_pegawai','mt_karyawan.kd_jabatan','mt_karyawan.kode_jabatan','mt_karyawan.kode_bagian'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        var $order = array('mt_karyawan.no_induk' => 'asc'); // default order 
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
    
    //admin
    
        private function _get_datatables_query()
        {
            $this->db->select('mt_karyawan.*,mt_jabatan.nama_jabatan');
            $this->db->from($this->table);
            $this->db->join('mt_jabatan','mt_karyawan.kode_jabatan=mt_jabatan.kode_jabatan');
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
            // $this->db->select('user_sub_menu.*, user_menu.menu');
            // $this->db->from($this->table);
            // $this->db->join('user_menu','user_sub_menu.menu_id=user_menu.id');
            $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    
        public function get_by_id($id)
        {
            $this->db->select('mt_karyawan.*,mt_jabatan.nama_jabatan');
            $this->db->from($this->table);
            $this->db->join('mt_jabatan','mt_karyawan.kode_jabatan=mt_jabatan.kode_jabatan');
            $this->db->where('no_induk',$id);
            $query = $this->db->get();
    
            return $query->row();
        }
    
        public function save_karyawan($data)
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
            $this->db->where('no_induk', $id);
            $this->db->delete($this->table);
        }
    
        Public function jabatan()
        {
            return $this->db->get('mt_jabatan')->result_array();
        }
    }
    
    /* End of file M_skpd.php */
    /* Location: ./application/models/M_kompetensi_bidang.php */
    




