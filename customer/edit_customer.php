<?php
//File		: edit_customer.php
//Deskripsi	: menampilkan form edit data customer dan mengupdate data ke database

require_once('db_login.php');
$id = $_GET['id']; //mendapatkan customerid yang dilewatkan ke url

//mengecek apakah user belum menekan tombol submit
if (!isset($_POST["submit"])){
	$query = " SELECT * FROM film WHERE film_id=".$id." ";
	// Execute the query
	$result = $db->query( $query );
	if (!$result){
		die ("Could not query the database: <br />". $db->error);
	}else{
		while ($row = $result->fetch_object()){
			$film_id = $row->film_id;
			$judul_film = $row->judul_film;
			$genre = $row->genre;
			$durasi = $row->durasi;
			$rating = $row->rating;
		}
	}
	
}else{
	$valid = TRUE; //flag validasi
	$film_id = test_input($_POST['film_id']);
	if ($film_id == ''){
		$error_film_id = "id film is required";
		$valid = FALSE;
	}

	$judul_film = test_input($_POST['judul_film']);
	if ($judul_film == ''){
		$error_judul_film = "title is required";
		$valid = FALSE;
	}
	$genre = $_POST['genre'];
	if ($genre == '' || $genre == 'none'){
		$error_genre = "genre is required";
		$valid = FALSE;
	}
	
	$durasi = test_input($_POST['durasi']);
	if ($durasi == ''){
		$error_durasi = "durasi is required";
		$valid = FALSE;
	}
	
	$rating = test_input($_POST['rating']);
	if ($rating == ''){
		$error_rating = "rating is required";
		$valid = FALSE;
	}
	
	//update data into database
	if ($valid){
		//escape inputs data
		// $address = $db->real_escape_string($address);
		//Asign a query
		$query = " UPDATE film SET film_id='".$film_id."', judul_film='".$judul_film."', genre='".$genre."', durasi='".$durasi."', rating='".$rating."' WHERE film_id=".$id."";
		// Execute the query
		$result = $db->query( $query );
		if (!$result){
		   die ("Could not query the database: <br />". $db->error. '<br>Query:' .$query);
		}else{
			$db->close();
			header('Location: view_customer.php');
		}
	}
}

?>
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
<div class="card-header">Edit Customers Data</div>
<div class="card-body">
<form method="POST" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]).'?id='.$id;?>">
<div class="form-group">
	<label for="film_id">Id:</label>
	<input type="text" class="form-control" id="film_id" name="film_id">
	<div class="error"><?php if(isset($error_film_id)) echo $error_film_id;?></div>
  </div>
  <div class="form-group">
	<label for="judul_film">Judul:</label>
	<input type="text" class="form-control" id="judul_film" name="judul_film">
	<div class="error"><?php if(isset($error_judul_film)) echo $error_judul_film;?></div>
  </div>
  <div class="form-group">
	<label for="genre">Genre:</label>
	<textarea class="form-control" id="genre" name="genre"></textarea>
	<div class="error"><?php if(isset($error_genre)) echo $error_genre;?></div>
  </div>
  <div class="form-group">
	<label for="durasi">Durasi:</label>
	<input type="text" class="form-control" id="durasi" name="durasi">
	<div class="error"><?php if(isset($error_durasi)) echo $error_durasi;?></div>
  </div>
  <div class="form-group">
	<label for="rating">Rating:</label>
	<select name="rating" id="rating" class="form-control" required>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
    	<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<div class="error"><?php if(isset($error_rating)) echo $error_rating;?></div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
  <a href="view_customer.php" class="btn btn-secondary">Cancel</a>
</table>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
$db->close();
?>