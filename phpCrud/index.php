<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
         
    <style>
    .m-r-1em{ margin-right:1em; }
    .m-b-1em{ margin-bottom:1em; }
    .m-l-1em{ margin-left:1em; }
    .mt0{ margin-top:0; }
    </style>
 
</head>
<body>
 
    <div class="container">
  
        <div class="page-header">
            <h1>Read Products</h1>
        </div>
     
        <?php
        include 'config/database.php';
        
        // delete message prompt will be here

        $query = "SELECT id, name, description, price FROM products ORDER BY id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();        
        $num = $stmt->rowCount();
        
        // link to create record form
        echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";        
        if($num>0){
        
            echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
            //creating our table heading
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Name</th>";
                echo "<th>Description</th>";
                echo "<th>Price</th>";
                echo "<th>Action</th>";
            echo "</tr>";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                // extract row
                // this will make $row['firstname'] to
                // just $firstname only
                extract($row);
                 
                // creating new table row per record
                echo "<tr>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$name}</td>";
                    echo "<td>{$description}</td>";
                    echo "<td>{$price}</td>";
                    echo "<td>";
                        // read one record 
                        echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";
                         
                        // we will use this links on next part of this post
                        echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";
             
                        // we will use this links on next part of this post
                        echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
                    echo "</td>";
                echo "</tr>";
            }
        
        // end table
        echo "</table>";
            
        }
        else{
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>
         
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>