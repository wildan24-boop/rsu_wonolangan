<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Kota_model extends CI_Model
{    
        var $table = 'dc_kota';
        var $column_order = array('dc_kota.kd_kota','dc_kota.nama_kota','dc_kota.id_dc_propinsi','dc_kota.id_dc_negara',null); //set column field database for datatable orderable
        var $column_search = array('dc_kota.kd_kota','dc_kota.nama_kota','dc_kota.id_dc_propinsi','dc_kota.id_dc_negara'); //set column field database for datatable searchable just firstname , lastname , address are searchable
        var $order = array('dc_kota.id_dc_kota' => 'asc'); // default order 
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
    
    //admin
    
        private function _get_datatables_query()
        {
            $this->db->select('dc_kota.*, dc_propinsi.nama_propinsi, dc_negara.nama_negara');
            $this->db->from($this->table);
            $this->db->join('dc_propinsi','dc_propinsi.id_dc_propinsi=dc_kota.id_dc_propinsi'); 
            $this->db->join('dc_negara','dc_negara.id_dc_negara=dc_kota.id_dc_negara'); 
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
            $this->db->select('dc_kota.*, dc_propinsi.nama_propinsi, dc_negara.nama_negara');
            $this->db->from($this->table);
            $this->db->join('dc_propinsi','dc_propinsi.id_dc_propinsi=dc_kota.id_dc_propinsi'); 
            $this->db->join('dc_negara','dc_negara.id_dc_negara=dc_kota.id_dc_negara'); 
            // $this->db->from($this->table);
            return $this->db->count_all_results();
        }
    
        public function get_by_id($id)
        {
            $this->db->from($this->table);
            $this->db->where('id_dc_kota',$id);
            $query = $this->db->get();
    
            return $query->row();
        }
    
        public function save_kota($data)
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
            $this->db->where('id_dc_kota', $id);
            $this->db->delete($this->table);
        }
    
        Public function masterKota()
        {
            return $this->db->get('dc_kota')->result_array();
        }

        Public function masterPropinsi()
        {
            return $this->db->get('dc_propinsi')->result_array();
        }

        Public function masterNegara()
        {
            return $this->db->get('dc_negara')->result_array();
        }

    }
    
    /* End of file M_skpd.php */
    /* Location: ./application/models/M_kompetensi_bidang.php */
    





