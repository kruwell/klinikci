<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }

        $this->load->model('m_pasien');

    }

	public function index()
	{
        $data['title'] = "Manajemen Data Pasien";

        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();
        
        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data', $data);
        $this->load->view('v_footer');
    }
    
    function tambah(){
        $data['title'] = "Tambah Data Pasien";

        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data_tambah');
        $this->load->view('v_footer');
    }

    function insert(){
        $nama = $this->input->post('nama_pasien');
        $jk = $this->input->post('jenis_kelamin');
        $umur = $this->input->post('umur');

        $data = array(
            'nama_pasien' => $nama,
            'jenis_kelamin' => $jk,
            'umur' => $umur
        );

        $this->m_pasien->insert_data($data);

        redirect('pasien');
    }

    function edit($id){
        $data['title'] = "Edit Data Pasien";

        $where = array('id_pasien' => $id);
        $data['r'] = $this->m_pasien->edit_data($where)->row_array();

        $this->load->view('v_header', $data);
        $this->load->view('pasien/v_data_edit', $data);
        $this->load->view('v_footer');
    }

    function update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama_pasien');
        $jk = $this->input->post('jenis_kelamin');
        $umur = $this->input->post('umur');

        $data = array(
            'nama_pasien' => $nama,
            'jenis_kelamin' => $jk,
            'umur' => $umur
        );

        $where = array('id_pasien' => $id);
        $this->m_pasien->update_data($data, $where);

        redirect('pasien');
    }

    function hapus($id){
        $where = array('id_pasien' => $id);
        $this->m_pasien->hapus_data($where);
        redirect('pasien');
    }

}
