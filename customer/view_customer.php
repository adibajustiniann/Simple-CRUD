<!--File		: view_customer.php
	Deskripsi	: menampilkan data customers
-->
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
<div class="card-header">Data Film Bioskop</div>
<div class="card-body">
<br>
<a class="btn btn-primary" href="add_customer.php">+ Add Data Film Bioskop</a><br /><br />
<table class="table table-striped">
    <tr>
		<th>Id Film</th>
		<th>Judul FIlm</th>
        <th>Genre</th>
		<th>Durasi</th>
		<th>Rating</th>
		<th>Action</th>
	</tr>

<?php
// Include our login information
require_once('db_login.php');
// Execute the query
$query = " SELECT film_id AS Id_Film, judul_film AS Judul_Film, genre AS Genre, durasi AS Durasi, rating AS Rating FROM film ORDER BY film_id ";
$result = $db->query($query);
if (!$result){
   die ("Could not query the database: <br />". $db->error ."<br>Query: ".$query);
}
// Fetch and display the results
$i = 1;
while ($row = $result->fetch_object()){
	echo '<tr>';
    echo '<td>'.$row->Id_Film.'</td>';
    echo '<td>'.$row->Judul_Film.'</td> ';
	echo '<td>'.$row->Genre.'</td> ';
    echo '<td>'.$row->Durasi.'</td>';
	echo '<td>'.$row->Rating.'</td>';
	echo '<td><a class="btn btn-warning btn-sm" href="edit_customer.php?id='.$row->Id_Film.'">Edit</a>&nbsp;&nbsp; 
			<a class="btn btn-danger btn-sm" href="confirm_delete_customer.php?id='.$row->Id_Film.'">Delete</a>
			</td>';
	echo '</tr>';
	$i++;
}
echo '</table>';
echo '<br />';
echo 'Total Rows = '.$result->num_rows;
$result->free();
$db->close();

?>
</table>
</div>
</div>
</div>
</body>
</html>
