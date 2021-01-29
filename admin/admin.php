<?php 
	session_start();
	if (!isset($_SESSION["loket_client"])) {
		$_SESSION["loket_client"] = NULL;
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <title>Admin : Queue</title>
	    <link href="../dashboard.css" rel="stylesheet">
	    <link href="../css/bootstrap.min.css" rel="stylesheet">
	    <link href="/assert/css/jumbotron-narrow.css" rel="stylesheet">
	    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
		<script src="../assert/js/jquery.min.js"></script>
	</head>
  	<body>
  		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Sistem Bank</a>
    </nav>

    <div class="card text-center">
  <div class="card-header">
    Sitem Bank
  </div>
  <div class="card-body">
    <h4 class="card-title">Tambah Loket</h4>	
    <div class="container">
    	<form>
    		<div class="jumbotron">
	        <h1 class="counter">
	        	<span class="fa fa-university"></span>
	        </h1>
	      	</div>
        	<label for="exampleInputEmail1">Jumlah Loket</label>
    		<div class="alert alert-info alert-dismissible peringatan" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <strong>Info !</strong> Jumlah loket berhasil di-save
			</div>
        	<input type="text" class="form-control loket" placeholder="Jumlah Loket">
        	<br/>
        	<label for="exampleInputEmail1">Reset Database</label>
        	<div class="reset_status">
			</div> 
        	<button type="button" class="btn btn-primary reset">Reset</button>
			<br/>
    	</form>
    	<br/>
      	<footer class="footer">
        <p>&copy; Copyright <?php echo date("Y");?></p>
      	</footer>
    </div>
  	</body>

  	<script type="text/javascript">
	$("document").ready(function()
	{
		$('.peringatan').hide();

		// GET JUMLAH LOKET
	    $.post( "../apps/admin_server.php", function( data ) {
			$(".loket").val(data['jumlah_loket']);
		},"json");
		
		// NUMBER LOKET
	    $('form input').data('val',  $('form input').val() );
	    $('form input').change(function() {
	    	//set seassion or save
	    	var data = {"jmlloket": $(".loket").val()};
			$.ajax({
				type: "POST",
				dataType: "json",
				url: "../apps/admin_server.php",//request
				data: data,
				success: function(data) {
					if (data["status"])
					{
						$('.peringatan').show();
					}
				}
			});
	    });
	    $('form input').keyup(function() {
	        if( $('form input').val() != $('form input').data('val') ){
	            $('form input').data('val',  $('form input').val() );
	            $(this).change();
	        }
	    });

	    // RESET 
		$(".reset").click(function(){
			$.post( "../apps/admin_reset.php", function( data ) {
			var alert = '<div class="alert alert-info alert-dismissible reset_status" role="alert">'+data['status']+'</div>';
			$(".reset_status").html(alert);
			},"json");
		});

	});
	</script>
</html>

