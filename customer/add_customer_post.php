<?php
	require_once('db_login.php');
	$film_id = $db->real_escape_string($_POST['film_id']);
	$judul_film = $db->real_escape_string($_POST['judul_film']);
	$genre = $db->real_escape_string($_POST['genre']);
	$durasi = $db->real_escape_string($_POST['durasi']);
	$rating = $db->real_escape_string($_POST['rating']);
	//Asign a query
	$query = " INSERT INTO customers (film_id, judul_film, genre, durasi, rating) VALUES('".$film_id."','".$judul_film."','".$genre."','".$durasi."','".$rating."') ";
	$result = $db->query( $query );
	if (!$result){
		echo '<div class="alert alert-danger alert-dismissible">
				<strong>Error!</strong> Could not query the database<br>'.
				$db->error. '<br>query = '.$query.
			 '</div>';
	}else{
		echo '<div class="alert alert-success alert-dismissible">
				<strong>Success!</strong> Data has been added.<br>
				id: '.$_POST['film_id'].'<br>
				Judul: '.$_POST['judul_film'].'<br>
				Genre: '.$_POST['genre'].'<br>
				Durasi: '.$_POST['durasi'].'<br>
				Rating: '.$_POST['rating'].'<br>
			  </div>';
	}
	//close db connection
	$db->close();
?>