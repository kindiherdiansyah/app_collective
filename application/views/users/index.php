<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function delete_confirm(){
    if($('.checkbox:checked').length > 0){
        var result = confirm("Are you sure to delete selected users?");
        if(result){
            return true;
        }else{
            return false;
        }
    }else{
        alert('Select at least 1 record to delete.');
        return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="\collective\assets\img\btn_logo.PNG">
<link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
<!-- Display the status message -->
<?php if(!empty($statusMsg)){ ?>
<div class="alert alert-success"><?php echo $statusMsg; ?></div>
<?php } ?>
<title>Collective System</title>
<center><h2><strong>Multiple Delete</strong></h2></center>
<!-- Users data list -->
<form name="bulk_action_form" action="" method="post" onSubmit="return delete_confirm();"/>
<input type="submit"  class="btn btn-sm btn-danger" name="bulk_delete_submit" value="DELETE"/>
<a href="/collective/excel_import" class="btn btn-sm btn-info"><span class="fa fa-file-excel-o"></span> Import Excel</a>
<a href="/collective/admin/kolektif" class="btn btn-sm w3-button w3-black"><span class="fa fa-mail-reply"></span>Back</a>

    <table  class="w3-table-all">
        <thead>
        <tr class="w3-green">
            <th><input type="checkbox" id="select_all" value=""/></th>
            <th>Nama Kantor</th>
            <th>Kode Kolektor</th>
            <th>Instansi</th>
            <th>No Rek</th>
            <th>Nama</th>
            <th>Angsuran</th>
            <th>Sisa Kredit</th>
            <th>Tunggakan Angsuran</th>
            <th>Bulan Tahun</th>        
        </tr>
        </thead>
        <?php if(!empty($users)){ foreach($users as $row){ ?>
        <tr>
            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['kolektif_id']; ?>"/></td>        
            <td><?php echo $row['nama_kantor']; ?></td>
            <td><?php echo $row['kode_kolektor']; ?></td>
            <td><?php echo $row['instansi']; ?></td>
            <td><?php echo $row['no_rek']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['angsuran']; ?></td>
            <td><?php echo $row['sisa_kredit']; ?></td>
            <td><?php echo $row['tgk_angsuran']; ?></td>
            <td><?php echo $row['bln_thn']; ?></td>
        </tr>
        <?php } }else{ ?>
            <tr><td colspan="5">No records found.</td></tr>
        <?php } ?>
    </table>
    
</form>