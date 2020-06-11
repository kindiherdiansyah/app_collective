<?php
class Kolektif extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kolektif');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_kolektif->tampil_kolektif();
		$this->load->view('admin/v_kolektif',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_kolektif(){
	if($this->session->userdata('akses')=='1'){
		$nama_kantor=$this->input->post('nama_kantor');
		$kode_kolektor=$this->input->post('kode_kolektor');
		$instansi=$this->input->post('instansi');
		$no_rek=$this->input->post('no_rek');
		$nama=$this->input->post('nama');
		$angsuran=$this->input->post('angsuran');
		$sisa_kredit=$this->input->post('sisa_kredit');
		$tgk_angsuran=$this->input->post('tgk_angsuran');
		$bln_thn=$this->input->post('bln_thn');
		$this->m_kolektif->simpan_kolektif($nama_kantor,$kode_kolektor,$instansi,$no_rek,$nama,$angsuran,$sisa_kredit,$tgk_angsuran,$bln_thn);
		redirect('admin/kolektif');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_kolektif(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$nama_kantor=$this->input->post('nama_kantor');
		$kode_kolektor=$this->input->post('kode_kolektor');
		$instansi=$this->input->post('instansi');
		$no_rek=$this->input->post('no_rek');
		$nama=$this->input->post('nama');
		$angsuran=$this->input->post('angsuran');
		$sisa_kredit=$this->input->post('sisa_kredit');
		$tgk_angsuran=$this->input->post('tgk_angsuran');
		$bln_thn=$this->input->post('bln_thn');
		$this->m_kolektif->update_kolektif($kode,$nama_kantor,$kode_kolektor,$instansi,$no_rek,$nama,$angsuran,$sisa_kredit,$tgk_angsuran,$bln_thn);
		redirect('admin/kolektif');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_kolektif(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_kolektif->hapus_kolektif($kode);
		redirect('admin/kolektif');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	
}