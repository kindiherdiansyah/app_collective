<!DOCTYPE html>
<html>
<link rel="icon" href="\collective\assets\img\btn_logo.PNG">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="icon" href="\collective\assets\img\btn_logo.PNG">
<link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
<head>
	<title>Collective System</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>asset/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		
		<h3 align="center"><strong>IMPORT EXCEL</strong></h3>

		<form method="post" id="import_form" enctype="multipart/form-data">

			<p><label>Select Excel File</label>
			<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
		
			<input type="submit" name="import" value="Import" class="btn btn-sm btn-success" />
		</form>
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
<div class="button">
  <ul class="right">
    <a href="/collective/users" class="w3-button w3-red"><span class="fa fa-file-excel-o"></span> Multiple Delete</a> 
    <a href="/collective/admin/kolektif" class="w3-button w3-black"><span class="fa fa-mail-reply"></span> Back</a>
  </ul>
  <br>
  <a href="<?php echo base_url();?>excel/format_kolektif.xlsx" class="btn btn-info"><span class="fa fa-download"></span> Download Format Excel</a>
</div>
		<div class="table-responsive" id="customer_data">
		</div>

	</div>

</body>
</html>
<br>

<script>
$(document).ready(function(){

	load_data();

	function load_data()
	{
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/fetch",
			method:"POST",
			success:function(data){
				$('#customer_data').html(data);
			}
		})
	}

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				load_data();
				alert(data);
			}
		})
	});

});
</script>
