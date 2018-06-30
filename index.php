<?PHP
	define("INDEX",true);
	error_reporting(0);
	session_start();
	ob_start();
	define('DEF',true);
	include("configdb.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-Supervisi</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
	
	
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel='stylesheet'>
	
	<!--  CSS select 2 combo box    -->
	<link href="assets/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
	
	<!--  Autocomplete    -->
	<link href="assets/jquery/aku/jquery-ui.css" rel="stylesheet" />
	
	<!--Datatables-->
	<link href="assets/css/datatables/dataTables.bootstrap.min.css" rel="stylesheet"></link>
	
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js" type="text/javascript"></script>
	
</head>

<body>
    <div class="wrapper">
	
	<?PHP
		include('sidebar.php');
	?>
        
        <div class="main-panel">
            
			<?PHP
				include('header.php');
			?>
			
            <?PHP
				include('content.php');
			?>
            
			<?PHP
				//include('footer.php');
			?>
        </div>
    </div>
	
</body>






<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/arrive.min.js"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>-->
<script src="assets/js/material-dashboard.js?v=1.2.0"></script>
<script src="assets/js/demo.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        demo.initDashboardPageCharts();
    });
</script>



<!--Select 2-->
<!--<script src="assets/select2/dist/jquery-2.1.4.min.js"></script>
<script src="assets/select2/dist/js/select2.min.js"></script>-->
<!--<script>
	$(document).ready(function () {
		$("#cb_unit").select2({
			placeholder: "Nama Unit/Ruangan"
		});	
		
		$("#cb_jadwalsupervisi").select2({
			placeholder: "Nama Unit/Ruangan"
		});	
	});
</script>-->

<!--Autocomplete-->
<script src="assets/jquery/aku/jquery.min.js"></script>
<script src="assets/jquery/aku/jquery-ui.js"></script>
<script>
	$(document).ready(function() {
	  $("#txt_unit").autocomplete({
		source: [
			<?PHP
			
				$query_unit  = "SELECT * FROM unit WHERE status_del='N' ";
				$result_unit = mysql_query($query_unit) or die(mysql_error());
				while ($rows_unit = mysql_fetch_object($result_unit)) {
					$id_unit= $rows_unit -> id_unit;
					$unit 	= $rows_unit -> nama_unit;
					echo '"'.$unit.'",';
				}
				
			?>
		  
		  "-"
		],
		minLength: 1
	  });
	});
	
	
	$(document).ready(function() {
	  $("#txt_unit_data").autocomplete({
		source: [
			<?PHP
				$query_unit  = "SELECT * FROM unit WHERE status_del='N' ";
				$result_unit = mysql_query($query_unit) or die(mysql_error());
				while ($rows_unit = mysql_fetch_object($result_unit)) {
					$id_unit= $rows_unit -> id_unit;
					$unit 	= $rows_unit -> nama_unit;
					echo '"'.$unit.'",';
				}
			?>
		  
		  "-"
		],
		minLength: 1
	  });
	});
</script>


<!--Datatables-->
<!--<script src="assets/js/datatables/jquery.min.js"></script>-->
<!--<script src="assets/js/datatables/bootstrap.min.js" type="text/javascript"></script>-->
<script src="assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="assets/js/datatables/dataTables.bootstrap.min.js"></script>
<script>
	$('#tbl_spmasalah').dataTable();
</script>

<script>
	
 
	$(document).ready(function() {
		var table = $('#tbl_supervisi').DataTable( {
			
			"ajax": "supervisi-data-json.php",
			"columns": [
				{
					"className"	:	'details-control text-center',
					"data"		:   'no',
					"width"		: 	'10%'
				},
				{ 	
					"className"	:	'details-control text-center',
					"data"		: 	"tgl_supervisi" 
				},
				{ 	
					"className"	:	'details-control text-center',
					"data"		:   "jadwal_supervisi" 
				},
				{ 	
					"className"	:	'details-control text-center',
					"data"		:   "totstatus"
				},
				{ 	
					"data"		:   "cetak",
					"className" :	"text-center"
				}
			]
		} );
			 
		// Add event listener for opening and closing details
		$('#tbl_supervisi tbody').on('click', 'td.details-control', function () {
			var tr = $(this).closest('tr');
			var row = table.row( tr );
		
			if ( row.child.isShown() ) {
				// This row is already open - close it
				row.child.hide();
				tr.removeClass('shown');
			} else {
				// Open this row
				row.child( format(row.data()) ).show();
				tr.addClass('shown');
			}
		} );
	} );
	
</script>





</html>