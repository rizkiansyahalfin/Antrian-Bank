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
    <h4 class="card-title">Admin Control Antrian yang Sedang berlangsung</h4>	
    <div class="container">
    	<form>
    		<div class="jumbotron">
	        <h1 class="next">
	        	<span class="glyphicon glyphicon-book"></span>
	        </h1>

        	<button value="Refresh Page" type="button" class="btn btn-primary next_getway">Panggil <span class="fa fa-chevron-circle-right"></span>
        	</button>
	      	</div>

    	</form>
    	<!--<br/>
      	<footer class="footer">
        <p>&copy; Copyright <?php echo date("Y");?></p>
      	</footer>-->
    </div>
  	</body>
  	<script type="text/javascript">
	$("document").ready(function()
	{

		// GET LAST COUNTER
	    $.post( "../apps/admin_getway.php", function( data ) {
			$(".next").html(data['next']);
		},"json");
		
	
	    // RESET 
		$(".next_getway").click(function(){
			var next_current = $(".next").text();
			$.post( "../apps/admin_getway.php", {"next_current": next_current}, function( data ) {
				$(".next").html(data['next']);
			},"json");
		});

	});
	</script>
</html>

