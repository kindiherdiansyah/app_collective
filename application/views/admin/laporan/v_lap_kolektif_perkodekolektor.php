<!DOCTYPE html>
<html lang="en"> 
<link rel="icon" href="\collective\assets\img\btn_logo.PNG">
<head>
  <title>Collective System</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>" />
  <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css'); ?>" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body onload="window.print(); window.close();">
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-content nopadding">
          <?php 
    // $b=$data->row_array();


?>
<style media="screen">
  .button{
    width: 100%;
    height: 50px;
  }
  .left{
    float: left;
    display: block;
  }
  .right{
    float: right;
    display: block;
  }
.button ul a{
  padding: 10px;
  background: rgb(116, 181, 12);
  color: white;
}
</style>


        <div class="table-responsive">
<img src="<?php echo base_url('assets/img/btn.PNG'); ?>" alt="gambar duniailkom" height="35px"
align="right" border="0"/>
<br>
        <p><b><h3 align="center">Daftar Tagihan Kolektif</h3></b></p>
<p align="center"><strong><?= $detail->bln_thn; ?></strong></p>
<h5>BANK TABUNGAN NEGARA (PERSERO)</h5>
<h5><?= $detail->nama_kantor; ?><!-- <?= $namakantor ?> --></h5>
<h5><?= $detail->instansi; ?> &nbsp; &nbsp; &nbsp; &nbsp; <?= $detail->kode_kolektor; ?> <!-- <?= $instansi ?> --></h5>
          <table border="1">
            <tr>
              <th  style="text-align:center;">No.</th><!-- 
              <th  width="10%" style="text-align:center;">Kode Kolektor</th>
              <th  width="50%" style="text-align:center;">Instansi</th> -->
              <th  width="10%" style="text-align:center;">No Rekening</th>
              <th  width="50%" style="text-align:center;">Nama</th>
              <th  width="30%" style="text-align:center;">Sisa Kredit</th>
              <th   style="text-align:center;">Angsuran</th>
      
            </tr>
          

          <tbody>
  
<?php 
$no=0;
$total = 0;

    foreach ($data->result_array() as $i) {
        $no++;
        $nama_kantor=$i['nama_kantor'];
        $kode_kolektor=$i['kode_kolektor'];
        $instansi=$i['instansi'];
        $no_rek=$i['no_rek'];
        $nama=$i['nama'];
        $angsuran=$i['angsuran'];
        $sisa_kredit=$i['sisa_kredit'];
        $tgk_angsuran=$i['tgk_angsuran'];
        $bln_thn=$i['bln_thn'];
        $total += $i['angsuran'];     
?>

    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <!-- <td style="text-align:center;"><h6><?php echo $kode_kolektor;?></h6></td>
        <td style="text-align:center;"><h6><?php echo $instansi;?></h6></td> -->
        <td style="text-align:center;"><?php echo $no_rek;?></td>
        <td style="text-align:center;"><?php echo $nama;?></td>
        <td style="text-align:center;"><?php echo number_format($sisa_kredit,0, ',', '.');?></td>
        <td style="text-align:center;"><?php echo number_format($angsuran,0, ',', '.');?></td>
    </tr>
<?php } ?>
</tbody>
            <tr>
               <td  colspan="4" style="text-align:center;"><strong>GRANT TOTAL (Rp)</strong></td>
              <td width="80%" colspan="1" style="text-align:center;"><strong><?php echo number_format($total,0, ',', '.') ;?></strong></td>
              
            </tr>
        </table>
        </div>
      </div>
      </div>
    </div>
</body>
      <!-- <div class="widget-box">
        <div class="widget-content nopadding">
        <table class="table table-bordered">
          <thead>
            <tr>
             
              <th colspan="4" style="text-align:center;">DIBUAT OLEH</th>
              <th colspan="4" style="text-align:center;">DISETUJUI OLEH</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th colspan="4"><br><br><br><br>( ________________________________________ )</th>
              <th colspan="4"><br><br><br><br>( ________________________________________ )</th>
            </tr>
          </tbody>
        </table>
      </div>
    </div> -->

  </div>
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/jquery.ui.custom.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/bootstrap-colorpicker.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/masked.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/jquery.uniform.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/select2.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/matrix.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/matrix.tables.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/matrix.form_common.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/wysihtml5-0.3.0.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/jquery.peity.min.js'); ?>"></script> 
  <script src="<?php echo base_url('assets/js/bootstrap-wysihtml5.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/printpage/jquery.printPage.js'); ?>"></script>
</body>
</html>