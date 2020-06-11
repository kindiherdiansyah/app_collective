<!DOCTYPE html>
<html lang="en">
<link rel="icon" href="\collective\assets\img\btn_logo.PNG">
<head>

    <!-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi"> -->

    <title>Collective System</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><strong>Data
                    </strong><small><strong>Kolektif</strong></small>
                    <div class="pull-right">
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Kolektif</a>
                        <a href="/collective/excel_import" class="btn btn-sm btn-info"><span class="fa fa-file-excel-o"></span> Import Excel</a>
                        <a href="/collective/users" class="btn btn-sm btn-primary"><span class="fa fa-trash-o"></span> Multiple Delete</a>
                    </div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" id="data-debitur" style="font-size:11px;" id="mydata">
                <thead>
                    <tr bgcolor="#3385ff" align="center">
                        <th style="text-align:center;">No</th>
                        <th>Nama Kantor</th>
                        <th>Kode Kolektor</th>
                        <th>Instansi</th>
                        <th>No Rek</th>
                        <th>Nama</th>
                        <th>Angsuran</th>
                        <th>Sisa Kredit</th>
                        <th>Tunggakan Angsuran</th>
                        <th>Bulan Tahun</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $kode=$a['kolektif_id'];
                        $nama_kantor=$a['nama_kantor'];
                        $kode_kolektor=$a['kode_kolektor'];
                        $instansi=$a['instansi'];
                        $no_rek=$a['no_rek'];
                        $nama=$a['nama'];
                        $angsuran=$a['angsuran'];
                        $sisa_kredit=$a['sisa_kredit'];
                        $tgk_angsuran=$a['tgk_angsuran'];
                        $bln_thn=$a['bln_thn'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nama_kantor;?></td>
                        <td><?php echo $kode_kolektor;?></td>
                        <td><?php echo $instansi;?></td>
                        <td><?php echo $no_rek;?></td>
                        <td><?php echo $nama;?></td>
                        <td><?php echo $angsuran;?></td>
                        <td><?php echo $sisa_kredit;?></td>
                        <td><?php echo $tgk_angsuran;?></td>
                        <td><?php echo $bln_thn;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditPelanggan<?php echo $kode?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Edit</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusPelanggan<?php echo $kode?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Kolektif</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kolektif/tambah_kolektif'?>">
                <div class="modal-body">

                        
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Kantor</label>
                        <div class="col-xs-9">
                            <input name="nama_kantor" class="form-control" type="text" placeholder="Nama Kantor..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Kolektor</label>
                        <div class="col-xs-9">
                            <input name="kode_kolektor" class="form-control" type="text" placeholder="Kode Kolektor..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Instansi</label>
                        <div class="col-xs-9">
                            <input name="instansi" class="form-control" type="text" placeholder="Instansi..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Rek</label>
                        <div class="col-xs-9">
                            <input name="no_rek" class="form-control" type="text" placeholder="No Rek..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Angsuran</label>
                        <div class="col-xs-9">
                            <input name="angsuran" class="form-control" type="text" placeholder="Angsuran..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Sisa Kredit</label>
                        <div class="col-xs-9">
                            <input name="sisa_kredit" class="form-control" type="text" placeholder="Sisa Kredit..." style="width:280px;" required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tunggakan Angsuran</label>
                        <div class="col-xs-9">
                            <input name="tgk_angsuran" class="form-control" type="text" placeholder="Tunggakan Angsuran" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bulan Tahun</label>
                        <div class="col-xs-9">
                            <input name="bln_thn" class="form-control" type="text" placeholder="Bulan Tahun" style="width:280px;" required>
                        </div>
                    </div>    

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $kode=$a['kolektif_id'];
                        $nama_kantor=$a['nama_kantor'];
                        $kode_kolektor=$a['kode_kolektor'];
                        $instansi=$a['instansi'];
                        $no_rek=$a['no_rek'];
                        $nama=$a['nama'];
                        $angsuran=$a['angsuran'];
                        $sisa_kredit=$a['sisa_kredit'];
                        $tgk_angsuran=$a['tgk_angsuran'];
                        $bln_thn=$a['bln_thn'];
                        
                        
                    ?>
                <div id="modalEditPelanggan<?php echo $kode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Kolektif</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kolektif/edit_kolektif'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $kode;?>">
                        
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Kantor</label>
                        <div class="col-xs-9">
                            <input name="nama_kantor" class="form-control" type="text" placeholder="Nama Kantor..." value="<?php echo $nama_kantor;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Kolektor</label>
                        <div class="col-xs-9">
                            <input name="kode_kolektor" class="form-control" type="text" placeholder="Kode Kolektor..." value="<?php echo $kode_kolektor;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Instansi</label>
                        <div class="col-xs-9">
                            <input name="instansi" class="form-control" type="text" placeholder="Instansi..." value="<?php echo $instansi;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No Rek</label>
                        <div class="col-xs-9">
                            <input name="no_rek" class="form-control" type="text" placeholder="No Rek..." value="<?php echo $no_rek;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" placeholder="Nama..." value="<?php echo $nama;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Angsuran</label>
                        <div class="col-xs-9">
                            <input name="angsuran" class="form-control" type="text" placeholder="Angsuran..." value="<?php echo $angsuran;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Sisa Kredit</label>
                        <div class="col-xs-9">
                            <input name="sisa_kredit" class="form-control" type="text" placeholder="Sisa Kredit..." value="<?php echo $sisa_kredit;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tunggakan Angsuran</label>
                        <div class="col-xs-9">
                            <input name="tgk_angsuran" class="form-control" type="text" placeholder="Tunggakan Angsuran..." value="<?php echo $tgk_angsuran;?>" style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Bulan Tahun</label>
                        <div class="col-xs-9">
                            <input name="bln_thn" class="form-control" type="text" placeholder="Bulan Tahun..." value="<?php echo $bln_thn;?>" style="width:280px;" required>
                        </div>
                    </div>   

                </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $kode=$a['kolektif_id'];
                        $nama_kantor=$a['nama_kantor'];
                        $kode_kolektor=$a['kode_kolektor'];
                        $instansi=$a['instansi'];
                        $no_rek=$a['no_rek'];
                        $nama=$a['nama'];
                        $angsuran=$a['angsuran'];
                        $sisa_kredit=$a['sisa_kredit'];
                        $tgk_angsuran=$a['tgk_angsuran'];
                        $bln_thn=$a['bln_thn'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $kode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Kolektif</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/kolektif/hapus_kolektif'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $kode; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;"><strong>&copy;2019-<?= date('Y');?> Collective System. All rights reserved.</strong></p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#data-debitur').DataTable( {
        "lengthMenu": [[10, 50, 100, 500, -1], [10, 50, 100, 500, "All"]]
    } );
} );
    </script>
    
</body>

</html>
