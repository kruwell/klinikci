<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();

        if(empty($this->session->userdata('login'))){
            redirect ('auth');
        }

        $this->load->model('m_dokter');
        $this->load->model('m_pasien');
        $this->load->model('m_kunjungan');

    }

	public function index()
	{
        redirect('dashboard');
    }

    function data_dokter(){
        $data['title'] = "Laporan Data Dokter";

        $data['dokter'] = $this->m_dokter->tampil_data()->result_array();

        $this->load->view('laporan/v_lap_dokter', $data);

    }

    function data_pasien(){
        $data['title'] = "Laporan Data Pasien";

        $data['pasien'] = $this->m_pasien->tampil_data()->result_array();

        $this->load->view('laporan/v_lap_pasien', $data);

    }

    function data_kunjungan(){
        $data['title'] = "Laporan Data Kunjungan";

        $data['kunjungan'] = $this->m_kunjungan->tampil_data()->result_array();

        $this->load->view('laporan/v_lap_kunjungan', $data);

    }

}
