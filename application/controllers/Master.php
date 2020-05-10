<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        is_logged_in();
        $this->load->model('Client_model','client', TRUE);
        $this->load->model('Karyawan_model','karyawan', TRUE);
        $this->load->model('Jabatan_model','jabatan', TRUE);
        $this->load->model('Kota_model','kota', TRUE);
        $this->load->model('Propinsi_model','propinsi', TRUE);
        $this->load->model('Negara_model','negara', TRUE);
        
    }

// Master Client  -----------------------------------------------------------------------------------------------------------
public function client()
{
$data = array(
    'client' =>  $this->client->masterClient(),	
    'title' => 'Master Client'
);
    $this->konten['main_view'] = $this->load->view('master/client', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_client()
{
    $list = $this->client->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_client('."'".$us->id_mt_client."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_client('."'".$us->id_mt_client."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->nm_persero);
        $row[] = ($us->alamat_persero);
        $row[] = ($us->no_telpon_client);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->client->count_all(),
        "recordsFiltered" => $this->client->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_client($id)
{
    $data = $this->client->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_client()
{
    $validasi = array(
        array(
        'field' => 'nm_persero',
        'label' => 'Nama Persero',
        'rules' => 'required'
        ),
        array(
            'field' => 'alamat_persero',
            'label' => 'Alamat Persero',
            'rules' => 'required'
        ),
        array(
            'field' => 'no_telpon_client',
            'label' => 'Telfon Client',
            'rules' => 'required'
            )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'nm_persero' => $this->input->post('nm_persero'),
            'alamat_persero' => $this->input->post('alamat_persero'),
            'no_telpon_client' => $this->input->post('no_telpon_client'),
        );
    $insert = $this->client->save_client($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_client()
{
    $validasi = array(
        array(
            'field' => 'nm_persero',
            'label' => 'Nama Persero',
            'rules' => 'required'
            ),
        array(
            'field' => 'alamat_persero',
            'label' => 'Alamat Persero',
            'rules' => 'required'
        ),
        array(
            'field' => 'no_telpon_client',
            'label' => 'Telfon Client',
            'rules' => 'required'
            )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'nm_persero' => $this->input->post('nm_persero'),
        'alamat_persero' => $this->input->post('alamat_persero'),
        'no_telpon_client' => $this->input->post('no_telpon_client'),
        );
    $this->client->update(array('id_mt_client' => $this->input->post('id_mt_client')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_client($id)
{
    $this->client->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}
    

// User Sub Menu  -----------------------------------------------------------------------------------------------------------

public function karyawan()
{
$data = array(
    'jabatan' =>  $this->karyawan->jabatan(),	
    'title' => 'Master Karyawan',		
);
    $this->konten['main_view'] = $this->load->view('master/karyawan', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_karyawan()
{
    $list = $this->karyawan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_karyawan('."'".$us->no_induk."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_karyawan('."'".$us->no_induk."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->no_induk);
        $row[] = ($us->nama_pegawai);
        $row[] = ($us->nama_jabatan);
        $row[] = ($us->status);
        $row[] = ($us->alamat);
        $row[] = ($us->no_hp);
        $row[] = ($us->email);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->karyawan->count_all(),
        "recordsFiltered" => $this->karyawan->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_karyawan($id)
{
    $data = $this->karyawan->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_karyawan()
{
    $validasi = array(
        array(
        'field' => 'no_induk',
        'label' => 'NIK',
        'rules' => 'required|trim|is_unique[mt_karyawan.no_induk]'
        ),
        array(
        'field' => 'nama_pegawai',
        'label' => 'Nama Pegawai',
        'rules' => 'required'
        ),
        array(
        'field' => 'kode_jabatan',
        'label' => 'Jabatan',
        'rules' => 'required'
        ),
        array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'required'
        ),
        array(
        'field' => 'alamat',
        'label' => 'Status',
        'rules' => 'required'
        ),
        array(
        'field' => 'no_hp',
        'label' => 'No HP',
        'rules' => 'required'
        ),
        array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
            'no_induk' => $this->input->post('no_induk'),
            'nama_pegawai' => $this->input->post('nama_pegawai'),
            'kode_jabatan' => $this->input->post('kode_jabatan'),
            'status' => $this->input->post('status'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'email' => $this->input->post('email'),
        );
    $insert = $this->karyawan->save_karyawan($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_karyawan()
{
    $validasi = array(
        array(
        'field' => 'no_induk',
        'label' => 'NIK',
        'rules' => 'required'
        ),
        array(
        'field' => 'nama_pegawai',
        'label' => 'Nama Pegawai',
        'rules' => 'required'
        ),
        array(
        'field' => 'kode_jabatan',
        'label' => 'Jabatan',
        'rules' => 'required'
        ),
        array(
        'field' => 'status',
        'label' => 'Status',
        'rules' => 'required'
        ),
        array(
        'field' => 'alamat',
        'label' => 'Status',
        'rules' => 'required'
        ),
        array(
        'field' => 'no_hp',
        'label' => 'No HP',
        'rules' => 'required'
        ),
        array(
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'no_induk' => $this->input->post('no_induk'),
        'nama_pegawai' => $this->input->post('nama_pegawai'),
        'kode_jabatan' => $this->input->post('kode_jabatan'),
        'status' => $this->input->post('status'),
        'alamat' => $this->input->post('alamat'),
        'no_hp' => $this->input->post('no_hp'),
        'email' => $this->input->post('email'),
        );
    $this->karyawan->update(array('no_induk' => $this->input->post('no_induk')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_karyawan($id)
{
    $this->karyawan->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

// Master Jabatan  -----------------------------------------------------------------------------------------------------------

public function jabatan()
{
$data = array(
    // 'jabatan' =>  $this->jabatan->masterJabatan(),	
    'title' => 'Master Jabatan'
);
    $this->konten['main_view'] = $this->load->view('master/jabatan', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_jabatan()
{
    $list = $this->jabatan->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jabatan('."'".$us->kode_jabatan."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" tombol-hapus href="javascript:void(0)" title="Hapus" onclick="delete_jabatan('."'".$us->kode_jabatan."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->kode_jabatan);
        $row[] = ($us->nama_jabatan);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->jabatan->count_all(),
        "recordsFiltered" => $this->jabatan->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_jabatan($id)
{
    $data = $this->jabatan->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_jabatan()
{
    $validasi = array(
        array(
        'field' => 'kode_jabatan',
        'label' => 'Kode Jabatan',
        'rules' => 'required|trim|is_unique[mt_jabatan.kode_jabatan]'
        ),
        array(
            'field' => 'nama_jabatan',
            'label' => 'Nama Jabatan',
            'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'kode_jabatan' => $this->input->post('kode_jabatan'),
            'nama_jabatan' => $this->input->post('nama_jabatan'),
        );
    $insert = $this->jabatan->save_jabatan($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_jabatan()
{
    $validasi = array(
        array(
            'field' => 'kode_jabatan',
            'label' => 'Kode Jabatan',
            'rules' => 'required'
            ),
        array(
            'field' => 'nama_jabatan',
            'label' => 'Nama Jabatan',
            'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'kode_jabatan' => $this->input->post('kode_jabatan'),
        'nama_jabatan' => $this->input->post('nama_jabatan'),
        );
    $this->jabatan->update(array('kode_jabatan' => $this->input->post('kode_jabatan')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_jabatan($id)
{
    $this->jabatan->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}
   
// Master Kota  -----------------------------------------------------------------------------------------------------------
public function kota()
{
$data = array(
    'kota' =>  $this->kota->masterKota(),	
    'propinsi' =>  $this->kota->masterPropinsi(),	
    'negara' =>  $this->kota->masterNegara(),	
    'title' => 'Master Kota'
);
    $this->konten['main_view'] = $this->load->view('master/kota', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_kota()
{
    $list = $this->kota->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kota('."'".$us->id_dc_kota."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kota('."'".$us->id_dc_kota."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->kd_kota);
        $row[] = ($us->nama_kota);
        $row[] = ($us->nama_propinsi);
        $row[] = ($us->nama_negara);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->kota->count_all(),
        "recordsFiltered" => $this->kota->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_kota($id)
{
    $data = $this->kota->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_kota()
{
    $validasi = array(
        array(
        'field' => 'kd_kota',
        'label' => 'Kode Kota',
        'rules' => 'required'
        ),
        array(
        'field' => 'nama_kota',
        'label' => 'Nama Kota',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_propinsi',
        'label' => 'Provinsi',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_negara',
        'label' => 'Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'kd_kota' => $this->input->post('kd_kota'),
            'nama_kota' => $this->input->post('nama_kota'),
            'id_dc_propinsi' => $this->input->post('id_dc_propinsi'),
            'id_dc_negara' => $this->input->post('id_dc_negara'),
        );
    $insert = $this->kota->save_kota($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_kota()
{
    $validasi = array(
        array(
        'field' => 'kd_kota',
        'label' => 'Kode Kota',
        'rules' => 'required'
        ),
        array(
        'field' => 'nama_kota',
        'label' => 'Nama Kota',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_propinsi',
        'label' => 'Provinsi',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_negara',
        'label' => 'Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'kd_kota' => $this->input->post('kd_kota'),
        'nama_kota' => $this->input->post('nama_kota'),
        'id_dc_propinsi' => $this->input->post('id_dc_propinsi'),
        'id_dc_negara' => $this->input->post('id_dc_negara'),
        );
    $this->kota->update(array('id_dc_kota' => $this->input->post('id_dc_kota')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_kota($id)
{
    $this->kota->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

// Master Propinsi  -----------------------------------------------------------------------------------------------------------
public function propinsi()
{
$data = array(
    'kota' =>  $this->propinsi->masterKota(),	
    'propinsi' =>  $this->propinsi->masterPropinsi(),	
    'negara' =>  $this->propinsi->masterNegara(),	
    'title' => 'Master Propinsi'
);
    $this->konten['main_view'] = $this->load->view('master/propinsi', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_propinsi()
{
    $list = $this->propinsi->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_propinsi('."'".$us->id_dc_propinsi."'".')"><<i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_propinsi('."'".$us->id_dc_propinsi."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->nama_propinsi);
        $row[] = ($us->nama_negara);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->propinsi->count_all(),
        "recordsFiltered" => $this->propinsi->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_propinsi($id)
{
    $data = $this->propinsi->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_propinsi()
{
    $validasi = array(
        array(
        'field' => 'nama_propinsi',
        'label' => 'Nama Provinsi',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_negara',
        'label' => 'Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'nama_propinsi' => $this->input->post('nama_propinsi'),
            'id_dc_negara' => $this->input->post('id_dc_negara'),
        );
    $insert = $this->propinsi->save_propinsi($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_propinsi()
{
    $validasi = array(
        array(
        'field' => 'nama_propinsi',
        'label' => 'Nama Provinsi',
        'rules' => 'required'
        ),
        array(
        'field' => 'id_dc_negara',
        'label' => 'Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'nama_propinsi' => $this->input->post('nama_propinsi'),
        'id_dc_negara' => $this->input->post('id_dc_negara'),
       );
    $this->propinsi->update(array('id_dc_propinsi' => $this->input->post('id_dc_propinsi')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_propinsi($id)
{
    $this->propinsi->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}
    
// Master Negara -----------------------------------------------------------------------------------------------------------
public function negara()
{
$data = array(
    'kota' =>  $this->negara->masterKota(),	
    'propinsi' =>  $this->negara->masterPropinsi(),	
    'negara' =>  $this->negara->masterNegara(),	
    'title' => 'Master Negara'
);
    $this->konten['main_view'] = $this->load->view('master/negara', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_negara()
{
    $list = $this->negara->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_negara('."'".$us->id_dc_negara."'".')"><<i class="fa fa-edit ml-4"></i> Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_negara('."'".$us->id_dc_negara."'".')"><i class="fa fa-trash-alt ml-4"></i> Delete</a>';
        }
        $row[] = ($us->inisial_negara);
        $row[] = ($us->nama_negara);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->negara->count_all(),
        "recordsFiltered" => $this->negara->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_negara($id)
{
    $data = $this->negara->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_negara()
{
    $validasi = array(
        array(
        'field' => 'inisial_negara',
        'label' => 'Inisial Negara',
        'rules' => 'required'
        ),
        array(
        'field' => 'nama_negara',
        'label' => 'Nama Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{

    $data = array(
            'inisial_negara' => $this->input->post('inisial_negara'),
            'nama_negara' => $this->input->post('nama_negara'),
        );
    $insert = $this->negara->save_negara($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_negara()
{
    $validasi = array(
        array(
        'field' => 'inisial_negara',
        'label' => 'Inisial Negara',
        'rules' => 'required'
        ),
        array(
        'field' => 'nama_negara',
        'label' => 'Nama Negara',
        'rules' => 'required'
        )
    );

$this->form_validation->set_rules($validasi);
$this->form_validation->set_error_delimiters('', '');
if ($this->form_validation->run() == FALSE){
    $data['kliru'] = validation_errors();
    $data['status'] = false;
    echo json_encode($data);
}else{
    $data = array(
        'inisial_negara' => $this->input->post('inisial_negara'),
        'nama_negara' => $this->input->post('nama_negara'),
       );
    $this->negara->update(array('id_dc_negara' => $this->input->post('id_dc_negara')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_negara($id)
{
    $this->negara->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}


}