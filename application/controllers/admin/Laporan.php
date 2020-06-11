<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        
		$this->load->model('m_laporan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		// $data['data']=$this->m_barang->tampil_barang();
		// $data['kat']=$this->m_kategori->tampil_kategori();
		
		$data['jual_kolektor']=$this->m_laporan->get_kode_kolektor();
		// $data['jual_bln']=$this->m_laporan->get_bulan();
		// $data['jual_thn']=$this->m_laporan->get_tahun();
		$this->load->view('admin/v_laporan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function lap_kolektif_perkodekolektor(){
		$kolektor_id=$this->input->post('kolektor');
		$x['data']=$this->m_laporan->get_data_kolektif_perkodekolektor($kolektor_id);
		$this->db->limit(1);
		$x['detail'] = $this->db->get_where('tbl_kolektif',['kode_kolektor'=>$kolektor_id])->row();

		$this->load->view('admin/laporan/v_lap_kolektif_perkodekolektor',$x);
	}
	// function lap_resi_pertanggal(){
	// 	$tanggal=$this->input->post('tgl');
	// 	$x['data']=$this->m_laporan->get_data_resi_pertanggal($tanggal);
	// 	$this->load->view('admin/laporan/v_lap_resi2_pertanggal',$x);
	// }
}