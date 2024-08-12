<!--
File : user_form.html
Deskripsi : menambahkan isi input form customer ke database melalui ajax
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
<div class="card-header">Add Customers Data</div>
<div class="card-body">

<form method="GET" autocomplete="on">
  <div class="form-group">
	<label for="film_id">Id:</label>
	<input type="text" class="form-control" id="film_id" name="film_id">
  </div>
  <div class="form-group">
	<label for="judul_film">Judul:</label>
	<input type="text" class="form-control" id="judul_film" name="judul_film">
  </div>
  <div class="form-group">
	<label for="genre">Genre:</label>
	<textarea class="form-control" id="genre" name="genre"></textarea>
  </div>
  <div class="form-group">
	<label for="durasi">Durasi:</label>
	<input type="text" class="form-control" id="durasi" name="durasi">
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
  </div><br>
  <button type="submit" class="btn btn-primary" onclick="add_customer_post()">Add</button>
</form>
<br>
<div id="add_response"></div>
</div>
</div>
</div>
</body>
</html>