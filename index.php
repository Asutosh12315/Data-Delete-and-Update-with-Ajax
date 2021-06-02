<?php
require_once('DB.php');

if (isset($_POST['delete_id'])) {
  
$id=$_POST['delete_id'];
$query="delete from student where id=$id";

mysqli_query($conn ,$query);


}

if (isset($_POST['rid'])) {
  
$id=$_POST['rid'];

$name=$_POST['name'];

$query="UPDATE student set name='$name' WHERE id='$id'";

mysqli_query($conn ,$query);



}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Delete With Ajax</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 90%;
          margin: 30px;

        }
        
        #customers td, #customers th {
          border: 1px solid black;
          padding: 8px;
          font-size:20px;
          font-weight:bold;
          text-align:center;
        }
        
        #customers tr:nth-child(odd){background-color:green;}       

        #customers tr:nth-child(even){background-color:gray;}  

        #customers tr:hover {background-color: tomato;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          background-color:blue;
          color: white;
        }

        #customers th:nth-child(odd){
            width: 20px;
            
        }
    </style>


</head>
<body>
    

    <table id="customers">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th colspan="2">Action</th>
         
        </tr>

   <?php    

  require_once('DB.php');

   $call = "SELECT * FROM student";
   $result=$conn->query($call);

   while ($row=$result->fetch_assoc()) {
   
  
   
   ?>
        <tr>
          <td><?php echo $row['id'] ?></td>
          <td contenteditable id="<?php echo $row['id'] ?>" onblur="update('#<?php echo $row['id'] ?>','<?php echo $row['id'] ?>')"><?php echo $row['name']?></td>
          <td><?php echo $row['email']?></td>
          <td><a href="" class="btn btn-success">Edit</a></td>
          <td><a href="" class="delete_data btn btn-danger" id="<?php echo $row['id'] ?>" onclick="deleteData()">Delete</a></td>
        </tr>


      <?php  }?>  



      </table>

   

 <!-- jQuery CDN -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="Data Delete and Update.js" type="text/javascript"></script>   
</body>
</html>