<!DOCTYPE html>
<!-- CRUD 
     Hämtad ifrån starTutorial.com 
-->
<html>
    <head>
        <meta charset="UTF-8">
       <title>Anders Rochester</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script> 
        
    </head>
<body>
    <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email Address</th>
                      <th>Mobile Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   //include_once 'config.php'; '';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM customers ORDER BY custId DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['custName'] . '</td>';
                            echo '<td>'. $row['custEmail'] . '</td>';
                            echo '<td>'. $row['custMobile'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['custId'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['custId'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['custId'].'">Delete</a>';
                            echo '</td>';                            
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
  </body>
</html>
