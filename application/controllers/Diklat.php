<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diklat extends CI_Controller
{
// Contruct -----------------------------------------------------------------------------------------
public function __construct(){
    Parent::__construct();
    is_logged_in();
    $this->load->model('Diklat_model', 'diklat', TRUE);
}
// End construct -----------------------------------------------------------------------------------------
    
// Master Client  -----------------------------------------------------------------------------------------------------------
public function index()
{
$data = array(
    'diklat' =>  $this->diklat->viewDiklat(),	
    'title' => 'Form Diklat'
);
    $this->konten['main_view'] = $this->load->view('diklat/index', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_diklat()
{
    $list = $this->diklat->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] = ($us->nom_surat);
        $row[] = ($us->kategori);
        $row[] = ($us->perihal);
        $row[] = ($us->instansi);
        $row[] = ($us->agenda);
        $row[] = ($us->tgl_berangkat);
        $row[] = ($us->tgl_kembali);
        $row[] = ($us->total_waktu);
        $row[] = ($us->ditugaskan);
        $row[] = ($us->up_surat);
        $row[] = ($us->up_bukti_tf);
        $row[] = ($us->up_surat_pengajuan);
        $row[] = ($us->up_surat_tugas);
        $row[] = ($us->up_laporan);
     
        //add html for action
        // if($this->session->userdata('role_id') == '1'){
        $row[] ='
        <class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
        </button>
        <div class="dropdown-menu">
        <a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_diklat('."'".$us->id_diklat."'".')"><i class="fa fa-edit ml-4"></i> Edit</a>
        <a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_diklat('."'".$us->id_diklat."'".')"><i class="fa fa-edit ml-4"></i> Delete</a>';
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->diklat->count_all(),
        "recordsFiltered" => $this->diklat->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_diklat($id)
{
    $data = $this->diklat->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_diklat()
{
    $validasi = array(
        array(
        'field' => 'nom_surat',
        'label' => 'Nomor Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'kategori',
        'label' => 'Kategori Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'perihal',
        'label' => 'Perihal',
        'rules' => 'required'
        ),
        array(
        'field' => 'instansi',
        'label' => 'Instansi / Rumah Sakit',
        'rules' => 'required'
        ),
        array(
        'field' => 'agenda',
        'label' => 'Agenda Diklat',
        'rules' => 'required'
        ),
        array(
        'field' => 'tgl_berangkat',
        'label' => 'Tanggal Berangkat',
        'rules' => 'required'
        ),
        array(
        'field' => 'tgl_kembali',
        'label' => 'Tanggal Kembali',
        'rules' => 'required'
        ),
        array(
        'field' => 'total_waktu',
        'label' => 'Total Waktu',
        'rules' => 'required'
        ),
        array(
        'field' => 'ditugaskan',
        'label' => 'Ditugaskan',
        'rules' => 'required'
        ),
        array(
        'field' => 'up_surat',
        'label' => 'Upload Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'up_surat_tugas',
        'label' => 'Upload Surat Tugas',
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
    'nom_surat' => $this->input->post('nom_surat'),
    'kategori' => $this->input->post('kategori'),
    'perihal' => $this->input->post('perihal'),
    'instansi' => $this->input->post('instansi'),
    'agenda' => $this->input->post('agenda'),
    'tgl_berangkat' => $this->input->post('tgl_berangkat'),
    'tgl_kembali' => $this->input->post('tgl_kembali'),
    'total_waktu' => $this->input->post('total_waktu'),
    'ditugaskan' => $this->input->post('ditugaskan'),
    'up_surat' => $this->input->post('up_surat'),
    'up_bukti_tf' => $this->input->post('up_bukti_tf'),
    'up_surat_pengajuan' => $this->input->post('up_surat_pengajuan'),
    'up_surat_tugas' => $this->input->post('up_surat_tugas'),
    'up_laporan' => $this->input->post('up_laporan'),
        );
    $insert = $this->diklat->save_diklat($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_diklat()
{
    $validasi = array(
        array(
        'field' => 'nom_surat',
        'label' => 'Nomor Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'kategori',
        'label' => 'Kategori Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'perihal',
        'label' => 'Perihal',
        'rules' => 'required'
        ),
        array(
        'field' => 'instansi',
        'label' => 'Instansi / Rumah Sakit',
        'rules' => 'required'
        ),
        array(
        'field' => 'agenda',
        'label' => 'Agenda Diklat',
        'rules' => 'required'
        ),
        array(
        'field' => 'tgl_berangkat',
        'label' => 'Tanggal Berangkat',
        'rules' => 'required'
        ),
        array(
        'field' => 'tgl_kembali',
        'label' => 'Tanggal Kembali',
        'rules' => 'required'
        ),
        array(
        'field' => 'total_waktu',
        'label' => 'Total Waktu',
        'rules' => 'required'
        ),
        array(
        'field' => 'ditugaskan',
        'label' => 'Ditugaskan',
        'rules' => 'required'
        ),
        array(
        'field' => 'up_surat',
        'label' => 'Upload Surat',
        'rules' => 'required'
        ),
        array(
        'field' => 'up_surat_tugas',
        'label' => 'Upload Surat Tugas',
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
        'nom_surat' => $this->input->post('nom_surat'),
        'kategori' => $this->input->post('kategori'),
        'perihal' => $this->input->post('perihal'),
        'instansi' => $this->input->post('instansi'),
        'agenda' => $this->input->post('agenda'),
        'tgl_berangkat' => $this->input->post('tgl_berangkat'),
        'tgl_kembali' => $this->input->post('tgl_kembali'),
        'total_waktu' => $this->input->post('total_waktu'),
        'ditugaskan' => $this->input->post('ditugaskan'),
        'up_surat' => $this->input->post('up_surat'),
        'up_bukti_tf' => $this->input->post('up_bukti_tf'),
        'up_surat_pengajuan' => $this->input->post('up_surat_pengajuan'),
        'up_surat_tugas' => $this->input->post('up_surat_tugas'),
        'up_laporan' => $this->input->post('up_laporan'),
        );
    $this->diklat->update(array('id_diklat' => $this->input->post('id_diklat')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_diklat($id)
{
    $this->diklat->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}
}