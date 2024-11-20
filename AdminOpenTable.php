<?php 
include('navadmin.php');
$table=$_GET['name'];
$_SESSION['table']=$table;
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
    <link rel="icon" sizes="250x250" href="uploads/logo3.png">

    </head>
    <body>

    <div class="row">
        <div class="col-2">
        <div class="dropdown" >
  <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false" style="margin-top:6rem; background-color:rgb(6, 94, 145);border:none">
     Operations On table
  </button>
  <div class="dropdown-menu" style="width:11rem" >
    <a class="dropdown-item insert" href="insertColumn.php?id=<?php echo $table?>" style="border-bottom:1px solid rgb(0,0,0,0.200);text-align:center">Insert</a>
  
    
    <!-- <div class="dropdown-item drop" style="text-align:center;background:red;color:white;text-weight:bolder; cursor:pointer">Drop Table</div> -->


  </div>
</div>
        </div>
        <div class="col-10" style="margin-right:3rem">
        <table class="table table-striped" style="margin-top:1rem; margin-right:3rem">
  <thead>
    <tr>
    <?php 
    $columns = array();
    // echo $table;
    $table=$_SESSION['table'];
   $sql = "SHOW COLUMNS FROM $table";
   $result = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_array($result)){
    array_push($columns,$row['Field']);
    
    ?>
      <th scope="col" style="color:white;text-align:center;background:rgb(6, 94, 145)"><?php echo $row['Field']?></th>
    <?php }
    ?> 
    <th scope="col" style="color:white;text-align:center;background:rgb(6, 94, 145)">Action</th>
    </tr>
  </thead>
  <tbody style="text-align:center">
     <?php 
     $query = "SHOW COLUMNS FROM $table";
     $result = $conn->query($query);
     
     if ($result->num_rows > 0) {
         // Fetch the first row
         $row = $result->fetch_assoc();
         
         // Get the column name of the first column
         $columnName = $row['Field'];
         $_SESSION['field']=$columnName;
         $query = "SELECT $columnName FROM $table ";
          $result = $conn->query($query);

          
            if ($result->num_rows > 0) {
              // Loop through the result and fetch the first column values
              while ($row = $result->fetch_assoc()) {
                  $columnValue = $row["$columnName"];
                  
                  // Display or process the column value as needed
                  // echo $columnValue ;
              }
            }}
     $SQL="SELECT * FROM $table";
     $RESULT=mysqli_query($conn,$SQL);
     if(mysqli_num_rows($RESULT)>0){

      while($ROW=mysqli_fetch_assoc($RESULT)){
        
        ?>
    <tr>

        <?php
        foreach ($columns as $x) {
          if($x=="Password"){
            $plain_text_password = $ROW['Password'];
$hashed_password = password_hash($plain_text_password, PASSWORD_DEFAULT);

// $plain_text_password = 'password123';
// $hashed_password = '$2y$10$uV5d.yXk32iV7L5SywwaJO1gt2QZWtUpfvBN7aJY4ZB3q4MWXfJ9C';

// if (password_verify($plain_text_password, $hashed_password)) {
//     echo 'Password is correct';
// } else {
//     echo 'Password is incorrect';
// }

// echo $hashed_password;
?>
      <td><?php echo $hashed_password;?></td>

<?php
          }
          else{
?>
      <td><?php echo $ROW[$x];?></td>

<?php
        }
        }
        ?>
        
        <td style="text-align:center;display:flex;height:100%"><div class="dltrow" data-serial="<?php echo $ROW["$columnName"] ?>" data-field="<?php echo $columnName ?>"style="color:rgb(6, 94, 145);text-decoration:none; cursor:pointer;" ><i class="fa-solid fa-square-minus" style="color: #ff0505; cursor:pointer"></i> &nbsp;Delete</div>
         &nbsp; <a href='updateTable.php?id=<?php echo $ROW["$columnName"] ?>'style="color:rgb(6, 94, 145);text-decoration:none"><i class="fa-solid fa-pencil" style="color: #fdd71c;"></i> &nbsp;Change</a>
    </tr>
        
        <?php
      }
     }
     ?>
      
   
  </tbody>
</table>
        </div>
</div>
<script>
  //drop table
  document.addEventListener("DOMContentLoaded", function() {
  var dropButton = document.querySelector(".drop");
  dropButton.addEventListener("click", function() {
   
    if (confirm("Do you really want to drop this table?")) {
      var id = "<?php echo $table ?>";
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "dropTable.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      var params = "id=" + encodeURIComponent(id);

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4) {
          if (xhr.status == 200) {
            var data = xhr.responseText;
            if (data == 1) {
              window.location.href = "Adminddatabase.php";
            } else {
              alert("Something went wrong");
            }
          } else {
            alert("Request failed with status: " + xhr.status);
          }
        }
      };

      xhr.send(params);
    }
  });
});

</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
  document.addEventListener("click", function(event) {
    if (event.target.classList.contains("dltrow")) {
      var serial = event.target.getAttribute("data-serial");
      var field = event.target.getAttribute("data-field");
      var table = "<?php echo $table?>";
      
     
      
      if (confirm("Do you really want to delete this row?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deleteTable.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText == 1) {
              window.location.href = "AdminOpenTable.php?name="+table;
            } else {
              alert("Something went wrong");
            }
          }
        };
        
        xhr.send("table=" + encodeURIComponent(table) + "&serial=" + encodeURIComponent(serial) + "&field=" + encodeURIComponent(field));
      }
    }
  });
});

</script>

  
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script> -->
<script src="jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script>

  
</script>
<script>
    var preloader= document.getElementById('loading');
    function myFunction(){
        preloader.style.display='none';
    }
</script>
</body>

</html>    