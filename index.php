<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'Buy books', 'buy books from us', current_timestamp());
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "notes";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $database);

 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
 }
 if($_SERVER['REQUEST_METHOD']== 'POST'){
  $title=$_POST['title'];
  $description=$_POST['description'];
  $sql= "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
  $result= mysqli_query($conn,$sql);

if($result){
 echo "The value is insert successfully";


}
else{
    echo "Error push data. Check your code again".mysqli_error($conn);
}
 }
 ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Project 1 PHP CRUD</title>
</head>

<body>


  <!--  -->
  <!-- Navbar start here -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!--  Navbar end here -->


  <!-- Form start here -->

  <div class="container my-4">
    <h2>Add a note</h2>
    <form action="index.php" method="post">
    <div class="mb-3">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Note description</label>
        <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter your note here"></textarea>
      </div>


      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>
  <!-- Form end here -->


  <!-- data table start here -->
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">S.NO</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
          <!-- PHP start here -->
  
    <?php
         
         $sql = "SELECT * FROM `notes`";
         $result = mysqli_query($conn, $sql);
         
         if (!$result) {
             die("Query failed: " . mysqli_error($conn));
         }
         
         while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
          <th scope='row'>" . $row['sno'] . "</th>
          <td>" . $row['title'] . "</td>
          <td>" . $row['description'] . "</td>
          <td>Action</td>
        </tr>";
         }
         ?>
  <!-- PHP end here -->
        
      </tbody>
    </table>
  </div>
    <!-- data table end here -->






  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>