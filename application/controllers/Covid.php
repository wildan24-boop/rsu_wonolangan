<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Covid extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
       is_logged_in();
        $this->load->model('Client_model','client', TRUE);
        $this->load->model('Masuk_model','masuk', TRUE);
        $this->load->model('Karyawan_model','karyawan', TRUE);
        $this->load->model('Jabatan_model','jabatan', TRUE);
        $this->load->model('Kota_model','kota', TRUE);
        $this->load->model('Propinsi_model','propinsi', TRUE);
        $this->load->model('Negara_model','negara', TRUE);
        $this->load->model('Daftar_model','daftar', TRUE);
        $this->load->model('Odprajal_model','odprajal', TRUE);
        $this->load->model('Odpranap_model','odpranap', TRUE);
        $this->load->model('IGD_model','igd', TRUE);
        $this->load->model('Pdpranap_model','pdpranap', TRUE);
        $this->load->model('Pdprajal_model','pdprajal', TRUE);
        
    }

// Daftar Pasien Covid-19  -----------------------------------------------------------------------------------------------------------

public function daftar()
{
$data = array(
    'daftar' =>  $this->daftar->daftarCovid(),
    'kecamatan' =>  $this->daftar->kecamatan(),
    'kota' =>  $this->daftar->kota(),
    // 'kota' =>  $this->daftar->get_kota(),
    // 'kecamatan' =>  $this->daftar->get_subkecamatan($id),
    // $data=$this->m_kategori->get_subkategori($id);	
    'title' => 'DAFTAR PASIEN'
);
    $this->konten['main_view'] = $this->load->view('covid/daftar', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_daftar()
{
    $list = $this->daftar->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_daftar('."'".$us->id_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_daftar('."'".$us->id_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit Daftar Pasien</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_daftar('."'".$us->id_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->jaminan);
        $row[] = ($us->kecamatan);
        $row[] = ($us->kab_kota);
        $row[] = ($us->kota_lain);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->daftar->count_all(),
        "recordsFiltered" => $this->daftar->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_daftar($id)
{
    $data = $this->daftar->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_daftar()
{
    $validasi = array(
        array(
            'field' => 'no_rm',
            'label' => 'Nomor Rekam Medis',
            'rules' => 'required|trim|is_unique[mt_pasien_covid.no_rm]'
        ),
        array(
            'field' => 'nama_pasien',
            'label' => 'Nama Pasien',
            'rules' => 'required'
        ),
        array(
            'field' => 'tgl_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'
        ),
        array(
            'field' => 'jaminan',
            'label' => 'Jaminan',
            'rules' => 'required'
        ),
        array(
            'field' => 'jenkel',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'
        ),
        array(
            'field' => 'alamat_lengkap',
            'label' => 'Alamat Lengkap',
            'rules' => 'required'
        ),
        array(
            'field' => 'kecamatan',
            'label' => 'Kecamatan',
            'rules' => 'required'
        ),
        array(
            'field' => 'kab_kota',
            'label' => 'Kabupaten/Kota',
            'rules' => 'required'
        ),
        array(
            'field' => 'kota_lain',
            'label' => 'Kota Lain',
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
            'no_rm' => $this->input->post('no_rm'),
            'nama_pasien' => $this->input->post('nama_pasien'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenkel' => $this->input->post('jenkel'),
            'jaminan' => $this->input->post('jaminan'),
            'no_bpjs' => $this->input->post('no_bpjs'),
            'alamat_lengkap' => $this->input->post('alamat_lengkap'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kab_kota' => $this->input->post('kab_kota'),
            'kota_lain' => $this->input->post('kota_lain'),
        );
    $insert = $this->daftar->save_daftar($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_daftar()
{
    $validasi = array(
        array(
            'field' => 'nama_pasien',
            'label' => 'Nama Pasien',
            'rules' => 'required'
        ),
        array(
            'field' => 'tgl_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'required'
        ),
        array(
            'field' => 'jenkel',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'
        ),
        array(
            'field' => 'alamat_lengkap',
            'label' => 'Alamat Lengkap',
            'rules' => 'required'
        ),
        array(
            'field' => 'kecamatan',
            'label' => 'Kecamatan',
            'rules' => 'required'
        ),
        array(
            'field' => 'kab_kota',
            'label' => 'Kabupaten/Kota',
            'rules' => 'required'
        ),
        array(
            'field' => 'kota_lain',
            'label' => 'Kota Lain',
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
        'nama_pasien' => $this->input->post('nama_pasien'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'jenkel' => $this->input->post('jenkel'),
        'jaminan' => $this->input->post('jaminan'),
        'no_bpjs' => $this->input->post('no_bpjs'),
        'alamat_lengkap' => $this->input->post('alamat_lengkap'),
        'kecamatan' => $this->input->post('kecamatan'),
        'kab_kota' => $this->input->post('kab_kota'),
        'kota_lain' => $this->input->post('kota_lain'),
        );
    $this->daftar->update(array('id_pasien' => $this->input->post('id_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_daftar($id)
{
    $this->daftar->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

// Daftar Pasien Covid-19  -----------------------------------------------------------------------------------------------------------


public function igd()
{
$data = array(
    'daftar' =>  $this->igd->pemeriksaanIGD(),	
    'pasien' =>  $this->igd->masterPasien(),	
    // 'pasien' =>  $this->igd->get_data_barang_bykode($no_rm),
    'title' => 'PEMERIKSAAN IGD'
);
    $this->konten['main_view'] = $this->load->view('covid/igd', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_igd()
{
    $list = $this->igd->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_igd('."'".$us->id_daftar_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_igd('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_igd('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->tgl_pemeriksaan);
        $row[] = ($us->diagnosa_masuk);
        $row[] = ($us->komorbid);
        $row[] = ($us->status_covid_awal);
        $row[] = ($us->totalaksana);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->igd->count_all(),
        "recordsFiltered" => $this->igd->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_igd($id)
{
    $data = $this->igd->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_igd()
{
    $validasi = array(
        array(
            'field' => 'no_rm',
            'label' => 'Nomor Rekam Medis',
            'rules' => 'required'
        ),        
        array(
            'field' => 'tgl_pemeriksaan',
            'label' => 'Tanggal Periksa',
            'rules' => 'required'
        ),
        array(
            'field' => 'diagnosa_masuk',
            'label' => 'Diagnosa Masuk',
            'rules' => 'required'
        ),
        array(
            'field' => 'komorbid',
            'label' => 'Komorbid',
            'rules' => 'required'
        ),
        array(
            'field' => 'status_covid_awal',
            'label' => 'Status Covid Awal',
            'rules' => 'required'
        ),
        array(
            'field' => 'totalaksana',
            'label' => 'Totalaksana',
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
            'no_rm' => $this->input->post('no_rm'),            
            'nama_pasien' => $this->input->post('nama_pasien'),            
            'tgl_lahir' => $this->input->post('tgl_lahir'),            
            'jenkel' => $this->input->post('jenkel'),            
            'umur' => $this->input->post('umur'),             
            'tgl_pemeriksaan' => $this->input->post('tgl_pemeriksaan'),
            'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
            'komorbid' => $this->input->post('komorbid'),
            'status_covid_awal' => $this->input->post('status_covid_awal'),
            'totalaksana' => $this->input->post('totalaksana'),
            'tgl_rjp' => $this->input->post('tgl_rjp'),
            'rujuk_rs' => $this->input->post('rujuk_rs'),
            'meninggal_waktu' => $this->input->post('meninggal_waktu'),
            'rawat_inap_ruang' => $this->input->post('rawat_inap_ruang')
        );
        
    $insert = $this->igd->save_igd($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_igd()
{
    $validasi = array(
        array(
            'field' => 'tgl_pemeriksaan',
            'label' => 'Tanggal Periksa',
            'rules' => 'required'
        ),
        array(
            'field' => 'diagnosa_masuk',
            'label' => 'Diagnosa Masuk',
            'rules' => 'required'
        ),
        array(
            'field' => 'komorbid',
            'label' => 'Komorbid',
            'rules' => 'required'
        ),
        array(
            'field' => 'status_covid_awal',
            'label' => 'Status Covid Awal',
            'rules' => 'required'
        ),
        array(
            'field' => 'totalaksana',
            'label' => 'Totalaksana',
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
            'nama_pasien' => $this->input->post('nama_pasien'),            
            'tgl_lahir' => $this->input->post('tgl_lahir'),            
            'jenkel' => $this->input->post('jenkel'),            
            'umur' => $this->input->post('umur'), 
            'tgl_pemeriksaan' => $this->input->post('tgl_pemeriksaan'),
            'diagnosa_masuk' => $this->input->post('diagnosa_masuk'),
            'komorbid' => $this->input->post('komorbid'),
            'status_covid_awal' => $this->input->post('status_covid_awal'),
            'totalaksana' => $this->input->post('totalaksana'),
            'tgl_rjp' => $this->input->post('tgl_rjp'),
            'rujuk_rs' => $this->input->post('rujuk_rs'),
            'meninggal_waktu' => $this->input->post('meninggal_waktu'),
            'rawat_inap_ruang' => $this->input->post('rawat_inap_ruang'),
        );
    $this->igd->update(array('id_daftar_pasien' => $this->input->post('id_daftar_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_igd($id)
{
    $this->daftar->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

// Daftar Pasien Covid-19  -----------------------------------------------------------------------------------------------


public function odprajal()
{
$data = array(
    'daftar' =>  $this->odprajal->odpRajal(),	
    'pasien' =>  $this->odprajal->masterPasien(),	
    // 'pasien' =>  $this->igd->get_data_barang_bykode($no_rm),
    'title' => 'DAFTAR ODP RAJAL'
);
    $this->konten['main_view'] = $this->load->view('covid/odprajal', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_odprajal()
{
    $list = $this->odprajal->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_odprajal('."'".$us->id_daftar_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_odprajal('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_odprajal('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->tgl_pemeriksaan);
        $row[] = ($us->diagnosa_masuk);
        $row[] = ($us->komorbid);
        $row[] = ($us->status_covid_awal);
        $row[] = ($us->totalaksana);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->odprajal->count_all(),
        "recordsFiltered" => $this->odprajal->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_odprajal($id)
{
    $data = $this->odprajal->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_odprajal()
{
    $validasi = array(
        array(
            'field' => 'odpjal_pem_dl',
            'label' => 'Pemeriksaan DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpjal_pem_petugas_thorax',
            'label' => 'Pemeriksaan Petuas Thorax',
            'rules' => 'required'
        ),      
        array(
            'field' => 'control',
            'label' => 'Status Saat Ini',
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
            'odpjal_pem_dl' => $this->input->post('odpjal_pem_dl'),            
            'odpjal_pem_petugas_thorax' => $this->input->post('odpjal_pem_petugas_thorax'),
            'control' => $this->input->post('control'),
        );
        
    $insert = $this->odprajal->save_igd($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_odprajal()
{
    $validasi = array(
        array(
            'field' => 'odpjal_pem_dl',
            'label' => 'Pemeriksaan DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpjal_pem_petugas_thorax',
            'label' => 'Pemeriksaan Petuas Thorax',
            'rules' => 'required'
        ),    
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
        'odpjal_pem_dl' => $this->input->post('odpjal_pem_dl'),            
        'odpjal_pem_petugas_thorax' => $this->input->post('odpjal_pem_petugas_thorax'),
        'control' => $this->input->post('control'),
        );
    $this->odprajal->update(array('id_daftar_pasien' => $this->input->post('id_daftar_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_odprajal($id)
{
    $this->odprajal->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

public function detail_odprajal($id)
	{
	$data = array(
		'title' =>  'DETAIL PASIEN',
		'surat'=>$this->masuk->getSuratmasukId($id),		
		'surat_masuk'=>$this->masuk->get_surmasuk($id),		
		'unik' =>  $this->masuk->get_id_masuk(),		
		'client' =>  $this->masuk->client(),		
		'disposisi' =>  $this->masuk->disposisi(),		
		'user' =>  $this->masuk->user(),	
		'karyawan' =>  $this->masuk->karyawan(),	
		'nama' =>  $this->masuk->nama()	,			
		'pasien' => $this->odprajal->detailOdprajal($id),			
	);
		$this->konten['main_view'] = $this->load->view('covid/detail_odprajal', $data, TRUE);
		$this->load->view('templates/dashboard', $this->konten);	
	}

	public function print_surmasuk($id)
	{
		$data = array(
			'title' =>  'RSUW Sekretariatan | Print',
			'surat'=>$this->masuk->getSuratmasukId2($id),		
			'surat_masuk'=>$this->masuk->get_surmasuk($id),		
						
		);
		$this->load->view('surat/detail_surmasuk_print', $data);
	}

// End Delete Data Surat Masuk --------------------------------------------------------------------------------


// Daftar Pasien Covid-19  --------------------------------------------------------------------------------------------



public function odpranap()
{
$data = array(
    'odpranap' =>  $this->odpranap->odpRanap(),	
    'pasien' =>  $this->odpranap->masterPasien(),	
    // 'pasien' =>  $this->igd->get_data_barang_bykode($no_rm),
    'title' => 'DAFTAR ODP RAJAL'
);
    $this->konten['main_view'] = $this->load->view('covid/odpranap', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_odpranap()
{
    $list = $this->odpranap->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_odpranap('."'".$us->id_daftar_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_odpranap('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_odpranap('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->tgl_pemeriksaan);
        $row[] = ($us->diagnosa_masuk);
        $row[] = ($us->komorbid);
        $row[] = ($us->status_covid_awal);
        $row[] = ($us->totalaksana);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->odpranap->count_all(),
        "recordsFiltered" => $this->odpranap->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_odpranap($id)
{
    $data = $this->odpranap->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_odpranap()
{
    $validasi = array(
        array(
            'field' => 'odpnap_dpjp',
            'label' => 'DPJP',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_dl',
            'label' => 'DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_rapid_tes1',
            'label' => 'Rapid Tes 1',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_status_covid',
            'label' => 'Perubaahan Status Covid',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_diagnosa_akhir',
            'label' => 'Diagnosa_Akhir',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_tgl_krs',
            'label' => 'Tanggal KRS',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_kondisi_krs',
            'label' => 'Kondisi KRS',
            'rules' => 'required'
        )   ,
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
            'odpnap_dpjp' => $this->input->post('odpnap_dpjp'),            
            'odpnap_dl' => $this->input->post('odpnap_dl'),
            'odpnap_ront_thorax' => $this->input->post('odpnap_ront_thorax'),
            'odpnap_rapid_tes1' => $this->input->post('odpnap_rapid_tes1'),
            'odpnap_tgl_rapid_tes1' => $this->input->post('odpnap_tgl_rapid_tes1'),
            'odpnap_hasil_rapid_tes1' => $this->input->post('odpnap_hasil_rapid_tes1'),
            'odpnap_status_covid' => $this->input->post('odpnap_status_covid'),
            'odpnap_hasil_status' => $this->input->post('odpnap_hasil_status'),
            'odpnap_diagnosa_akhir' => $this->input->post('odpnap_diagnosa_akhir'),
            'odpnap_tgl_krs' => $this->input->post('odpnap_tgl_krs'),
            'odpnap_kondisi_krs' => $this->input->post('odpnap_kondisi_krs'),
            'control' => $this->input->post('control'),
        );
        
    $insert = $this->odpranap->save_odpranap($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_odpranap()
{
    $validasi = array(
        array(
            'field' => 'odpnap_dpjp',
            'label' => 'DPJP',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_dl',
            'label' => 'DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_rapid_tes1',
            'label' => 'Rapid Tes 1',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_status_covid',
            'label' => 'Perubaahan Status Covid',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpnap_diagnosa_akhir',
            'label' => 'Diagnosa_Akhir',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_tgl_krs',
            'label' => 'Tanggal KRS',
            'rules' => 'required'
        ),       
        array(
            'field' => 'odpnap_kondisi_krs',
            'label' => 'Kondisi KRS',
            'rules' => 'required'
        ),
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
        'odpnap_dpjp' => $this->input->post('odpnap_dpjp'),            
        'odpnap_dl' => $this->input->post('odpnap_dl'),
        'odpnap_ront_thorax' => $this->input->post('odpnap_ront_thorax'),
        'odpnap_rapid_tes1' => $this->input->post('odpnap_rapid_tes1'),
        'odpnap_tgl_rapid_tes1' => $this->input->post('odpnap_tgl_rapid_tes1'),
        'odpnap_hasil_rapid_tes1' => $this->input->post('odpnap_hasil_rapid_tes1'),
        'odpnap_status_covid' => $this->input->post('odpnap_status_covid'),
        'odpnap_hasil_status' => $this->input->post('odpnap_hasil_status'),
        'odpnap_diagnosa_akhir' => $this->input->post('odpnap_diagnosa_akhir'),
        'odpnap_tgl_krs' => $this->input->post('odpnap_tgl_krs'),
        'odpnap_kondisi_krs' => $this->input->post('odpnap_kondisi_krs'),
        'odpnap_tgl_rjp' => $this->input->post('odpnap_tgl_rjp'),
        'odpnap_rujuk_rs' => $this->input->post('odpnap_rujuk_rs'),
        'odpnap_meninggal_waktu' => $this->input->post('odpnap_meninggal_waktu'),
        'odpnap_waktu_isolasi' => $this->input->post('odpnap_waktu_isolasi'),
        'control' => $this->input->post('control'),
        );
    $this->odpranap->update(array('id_daftar_pasien' => $this->input->post('id_daftar_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_odpranap($id)
{
    $this->odpranap->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

//----------------------------------------------------------------------------------------------------------

public function pdprajal()
{
$data = array(
    'daftar' =>  $this->pdprajal->pdpRajal(),	
    'pasien' =>  $this->pdprajal->masterPasien(),	
    // 'pasien' =>  $this->igd->get_data_barang_bykode($no_rm),
    'title' => 'DAFTAR ODP RAJAL'
);
    $this->konten['main_view'] = $this->load->view('covid/pdprajal', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_pdprajal()
{
    $list = $this->pdprajal->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_pdprajal('."'".$us->id_daftar_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pdprajal('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pdprajal('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->tgl_pemeriksaan);
        $row[] = ($us->diagnosa_masuk);
        $row[] = ($us->komorbid);
        $row[] = ($us->status_covid_awal);
        $row[] = ($us->totalaksana);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->pdprajal->count_all(),
        "recordsFiltered" => $this->pdprajal->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_pdprajal($id)
{
    $data = $this->pdprajal->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_pdprajal()
{
    $validasi = array(
        array(
            'field' => 'odpjal_pem_dl',
            'label' => 'Pemeriksaan DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'odpjal_pem_petugas_thorax',
            'label' => 'Pemeriksaan Petuas Thorax',
            'rules' => 'required'
        ),      
        array(
            'field' => 'control',
            'label' => 'Status Saat Ini',
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
        'pdpjal_dl' => $this->input->post('pdpjal_dl'),            
        'pdpjal_ront_thorax' => $this->input->post('pdpjal_ront_thorax'),            
        'pdpjal_rapid_tes' => $this->input->post('pdpjal_rapid_tes'),            
        'pdpjal_hasil_rapid' => $this->input->post('pdpjal_hasil_rapid'),            
        'pdpjal_swab' => $this->input->post('pdpjal_swab'),
        'pdpjal_tgl_ambil_sample' => $this->input->post('pdpjal_tgl_ambil_sample'),
        'pdpjal_tgl_kirim_sample' => $this->input->post('pdpjal_tgl_kirim_sample'),
        'control' => $this->input->post('control'),
        );
        
    $insert = $this->pdprajal->save_igd($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_pdprajal()
{
    $validasi = array(
        array(
            'field' => 'pdpjal_dl',
            'label' => 'DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpjal_ront_thorax',
            'label' => 'Rontgen Thorax',
            'rules' => 'required'
        ),    
        array(
            'field' => 'pdpjal_rapid_tes',
            'label' => 'Rapid Tes',
            'rules' => 'required'
        ),    
        array(
            'field' => 'pdpjal_swab',
            'label' => 'Swab',
            'rules' => 'required'
        ),    
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
        'pdpjal_dl' => $this->input->post('pdpjal_dl'),            
        'pdpjal_ront_thorax' => $this->input->post('pdpjal_ront_thorax'),            
        'pdpjal_rapid_tes' => $this->input->post('pdpjal_rapid_tes'),            
        'pdpjal_hasil_rapid' => $this->input->post('pdpjal_hasil_rapid'),            
        'pdpjal_swab' => $this->input->post('pdpjal_swab'),
        'pdpjal_tgl_ambil_sample' => $this->input->post('pdpjal_tgl_ambil_sample'),
        'pdpjal_tgl_kirim_sample' => $this->input->post('pdpjal_tgl_kirim_sample'),
        'control' => $this->input->post('control'),
        );
    $this->pdprajal->update(array('id_daftar_pasien' => $this->input->post('id_daftar_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_pdprajal($id)
{
    $this->pdprajal->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}

// Daftar Pasien Covid-19  --------------------------------------------------------------------------------------------


public function pdpranap()
{
$data = array(
    'pdpranap' =>  $this->pdpranap->pdpRanap(),	
    'pasien' =>  $this->pdpranap->masterPasien(),	
    // 'pasien' =>  $this->igd->get_data_barang_bykode($no_rm),
    'title' => 'DAFTAR ODP RAJAL'
);
    $this->konten['main_view'] = $this->load->view('covid/pdpranap', $data, TRUE);
    $this->load->view('templates/dashboard', $this->konten);	
}

public function ajax_list_pdpranap()
{
    $list = $this->pdpranap->get_datatables();
    $data = array();
    $no = $_POST['start'];
    foreach ($list as $us) {
        $no++;
        $row = array();
        $row[] = $no;
        $row[] ='
		<a class="" href="javascript:void(0)" title="view" onclick="detail_pdpranap('."'".$us->id_daftar_pasien."'".')"> <i class="fas fa-binoculars"></i> </a>';
		$row[] ='
        <class="btn-group">
		<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="far fa-caret-square-down"></i>
		</button>
		<div class="dropdown-menu">
		<a class="dropdown-item btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pdpranap('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-edit ml-4"></i>Edit</a>
		<a class="dropdown-item btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pdpranap('."'".$us->id_daftar_pasien."'".')"><i class="fa fa-trash-alt ml-4"></i>Delete</a>';
        $row[] = ($us->no_rm);
        $row[] = ($us->nama_pasien);
        $row[] = ($us->tgl_lahir);
        $row[] = ($us->umur);
        $row[] = ($us->jenkel);
        $row[] = ($us->tgl_pemeriksaan);
        $row[] = ($us->diagnosa_masuk);
        $row[] = ($us->komorbid);
        $row[] = ($us->status_covid_awal);
        $row[] = ($us->totalaksana);
        $data[] = $row;
    }

    $output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->pdpranap->count_all(),
        "recordsFiltered" => $this->pdpranap->count_filtered(),
        "data" => $data,
);
//output to json format
echo json_encode($output);
}

public function ajax_edit_pdpranap($id)
{
    $data = $this->pdpranap->get_by_id($id);
    echo json_encode($data);
}

public function ajax_add_pdpranap()
{
    $validasi = array(
        array(
            'field' => 'pdpnap_dpjp',
            'label' => 'DPJP',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_dl',
            'label' => 'DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_rapid_tes1',
            'label' => 'Rapid Tes 1',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_swab',
            'label' => 'Swab',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_status_covid',
            'label' => 'Perubaahan Status Covid',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_diagnosa_akhir',
            'label' => 'Diagnosa_Akhir',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_tgl_krs',
            'label' => 'Tanggal KRS',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_kondisi_krs',
            'label' => 'Kondisi KRS',
            'rules' => 'required'
        ),
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
        'pdpnap_dpjp' => $this->input->post('pdpnap_dpjp'),            
        'pdpnap_dl' => $this->input->post('pdpnap_dl'),
        'pdpnap_ront_thorax' => $this->input->post('pdpnap_ront_thorax'),
        'pdpnap_rapid_tes1' => $this->input->post('pdpnap_rapid_tes1'),
        'pdpnap_tgl_rapid_tes1' => $this->input->post('pdpnap_tgl_rapid_tes1'),
        'pdpnap_hasil_rapid_tes1' => $this->input->post('pdpnap_hasil_rapid_tes1'),
        'pdpnap_swab' => $this->input->post('pdpnap_swab'),
        'pdpnap_tgl_ambil_sample' => $this->input->post('pdpnap_tgl_ambil_sample'),
        'pdpnap_tgl_kirim_sample' => $this->input->post('pdpnap_tgl_kirim_sample'),
        'pdpnap_status_covid' => $this->input->post('pdpnap_status_covid'),
        'pdpnap_hasil_status' => $this->input->post('pdpnap_hasil_status'),
        'pdpnap_diagnosa_akhir' => $this->input->post('pdpnap_diagnosa_akhir'),
        'pdpnap_tgl_krs' => $this->input->post('pdpnap_tgl_krs'),
        'pdpnap_kondisi_krs' => $this->input->post('pdpnap_kondisi_krs'),
        'pdpnap_tgl_rjp' => $this->input->post('pdpnap_tgl_rjp'),
        'pdpnap_rujuk_rs' => $this->input->post('pdpnap_rujuk_rs'),
        'pdpnap_meninggal_waktu' => $this->input->post('pdpnap_meninggal_waktu'),
        'pdpnap_waktu_isolasi' => $this->input->post('pdpnap_waktu_isolasi'),
        'control' => $this->input->post('control'),
        );
        
    $insert = $this->pdpranap->save_pdpranap($data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_update_pdpranap()
{
    $validasi = array(
        array(
            'field' => 'pdpnap_dpjp',
            'label' => 'DPJP',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_dl',
            'label' => 'DL',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_rapid_tes1',
            'label' => 'Rapid Tes 1',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_swab',
            'label' => 'Swab',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_status_covid',
            'label' => 'Perubaahan Status Covid',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_ront_thorax',
            'label' => 'Rontxen Thorax',
            'rules' => 'required'
        ),        
        array(
            'field' => 'pdpnap_diagnosa_akhir',
            'label' => 'Diagnosa_Akhir',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_tgl_krs',
            'label' => 'Tanggal KRS',
            'rules' => 'required'
        ),       
        array(
            'field' => 'pdpnap_kondisi_krs',
            'label' => 'Kondisi KRS',
            'rules' => 'required'
        ),
        array(
            'field' => 'control',
            'label' => 'status Saat Ini',
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
        'pdpnap_dpjp' => $this->input->post('pdpnap_dpjp'),            
        'pdpnap_dl' => $this->input->post('pdpnap_dl'),
        'pdpnap_ront_thorax' => $this->input->post('pdpnap_ront_thorax'),
        'pdpnap_rapid_tes1' => $this->input->post('pdpnap_rapid_tes1'),
        'pdpnap_tgl_rapid_tes1' => $this->input->post('pdpnap_tgl_rapid_tes1'),
        'pdpnap_hasil_rapid_tes1' => $this->input->post('pdpnap_hasil_rapid_tes1'),
        'pdpnap_swab' => $this->input->post('pdpnap_swab'),
        'pdpnap_tgl_ambil_sample' => $this->input->post('pdpnap_tgl_ambil_sample'),
        'pdpnap_tgl_kirim_sample' => $this->input->post('pdpnap_tgl_kirim_sample'),
        'pdpnap_status_covid' => $this->input->post('pdpnap_status_covid'),
        'pdpnap_hasil_status' => $this->input->post('pdpnap_hasil_status'),
        'pdpnap_diagnosa_akhir' => $this->input->post('pdpnap_diagnosa_akhir'),
        'pdpnap_tgl_krs' => $this->input->post('pdpnap_tgl_krs'),
        'pdpnap_kondisi_krs' => $this->input->post('pdpnap_kondisi_krs'),
        'pdpnap_tgl_rjp' => $this->input->post('pdpnap_tgl_rjp'),
        'pdpnap_rujuk_rs' => $this->input->post('pdpnap_rujuk_rs'),
        'pdpnap_meninggal_waktu' => $this->input->post('pdpnap_meninggal_waktu'),
        'pdpnap_waktu_isolasi' => $this->input->post('pdpnap_waktu_isolasi'),
        'control' => $this->input->post('control'),
        );
    $this->pdpranap->update(array('id_daftar_pasien' => $this->input->post('id_daftar_pasien')), $data);
    $data['kliru'] = 'Sudah Tersimpan';
    $data['status'] = true;
    echo json_encode($data);
}
}

public function ajax_delete_pdpranap($id)
{
    $this->pdpranap->delete_by_id($id);
    echo json_encode(array("status" => TRUE));
}































}
// User Sub Menu  -----------------------------------------------------------------------------------------------------------


