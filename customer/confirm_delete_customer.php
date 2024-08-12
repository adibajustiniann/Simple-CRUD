<!DOCTYPE HTML> 
<html>
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap.min.css">
  </style>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!-- ajax -->
  <script src="../js/ajax.js"></script>
  <title>Form</title>
</head>
<body> 
<div class="container">
<br>
<div class="card">
<div class="card-header">Confirm Delete Films Data</div>
<div class="card-body">
<br>
<?php
$id = $_GET['id'];
// Include our login information
require_once('db_login.php');
$query = " SELECT * FROM film WHERE film_id=".$id." ";
$result = $db->query( $query );
if (!$result){
	die ("Could not query the database: <br />". $db->error);
}else{
	while ($row = $result->fetch_object()){
		echo '<table class="table">';
		echo'<tr><td>Judul</td> <td>:</td> <td>'.$row->judul_film.'</td></tr>';
		echo'<tr><td>Genre</td> <td>:</td> <td>'.$row->genre.'</td></tr>';
		echo'<tr><td>Rating</td> <td>:</td> <td>'.$row->rating.'</td></tr>';
		echo '<table>';
		echo '';
		echo 'Are you sure want to delete this item?<br><a class="btn btn-danger" href="delete_customer.php?id='.$id.'">Yes</a>&nbsp;<a class="btn btn-primary" href="view_customer.php">No</a> &nbsp; &nbsp;';
	}
}	
?>
</div>
</div>
</div>
</body>
</html>