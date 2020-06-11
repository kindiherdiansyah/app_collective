<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('excel_import');
	}
	
	function fetch()
	{
		$data = $this->excel_import_model->select();
		$output = '
		<h3 align="center"><strong>Total Data - '.$data->num_rows().'<strong></h3>
		<table class="w3-table-all" >
			<tr class="w3-indigo">
				<th>Nama Kantor</th>
				<th>Kode Kolektor</th>
				<th>Instansi</th>
				<th>No Rek</th>
				<th>Nama</th>
				<th>Angsuran</th>
				<th>Sisa Kredit</th>
				<th>Tgk Angsuran</th>
				<th>Bulan Tahun</th>

			</tr>
		';
		foreach($data->result() as $row)
		{
			$output .= '
			<tr>
				<td>'.$row->nama_kantor.'</td>
				<td>'.$row->kode_kolektor.'</td>
				<td>'.$row->instansi.'</td>
				<td>'.$row->no_rek.'</td>
				<td>'.$row->nama.'</td>
				<td>'.$row->angsuran.'</td>
				<td>'.$row->sisa_kredit.'</td>
				<td>'.$row->tgk_angsuran.'</td>
				<td>'.$row->bln_thn.'</td>
			</tr>
			';
		}
		$output .= '</table>';
		echo $output;
	}

	function import()
	{
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++)
				{
					$nama_kantor = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$kode_kolektor = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$instansi = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$no_rek = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$angsuran = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$sisa_kredit = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$tgk_angsuran = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$bln_thn = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$data[] = array(
						'nama_kantor'	=>	$nama_kantor,
						'kode_kolektor'	=>	$kode_kolektor,
						'instansi'		=>	$instansi,
						'no_rek'		=>	$no_rek,
						'nama'			=>	$nama,
						'angsuran'		=>	$angsuran,
						'sisa_kredit'	=>	$sisa_kredit,
						'tgk_angsuran'	=>	$tgk_angsuran,
						'bln_thn'		=>	$bln_thn
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}

?>