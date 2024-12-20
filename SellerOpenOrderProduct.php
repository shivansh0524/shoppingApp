<?php
ob_start();
session_start();
include_once('database.php');
if(!isset($_SESSION['email'])){
  header("Location:index.php");

}
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $_SESSION['order_id']=$id;
}
$id=$_SESSION['order_id'];

?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="style.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" sizes="250x250" href="uploads/logo3.png">
    
    <title>Shop Now</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>

@media (max-width: 767.98px) { .border-sm-start-none { border-left: none !important; } }
*{
    padding:0;
    margin:0;
}
/* #loading{
position:fixed;
width:100%;
height:100vh;
background:#fff url('uploads/navGIF.gif') no-repeat  center;
z-index: 999999;


} */
.checked {
  color: orange;
}
body{
  background-color:rgba(88, 88, 88, 0.856);
  background-size: cover;
  background-image:url("uploads/b1.jpg");
  background-blend-mode: lighten;
}
.content{
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}

.Button1{
  position: relative;
  display:flex;

  height: 6vh;
  margin:2em 0 1rem 0.25em;
  width:10em;
  cursor: pointer;
  border:2px solid  red;
    color:red;;
  text-decoration: none;
  background: rgba(255, 255, 255, 0);

  text-decoration: none;
  color: red;
  font-size:1rem;
  font-weight: bold;
  padding:0.5em 0.5em;
  z-index:1;
  align-items: center;
  vertical-align: middle;
  text-align: center;
  justify-content: center;
  border-radius: var(--radius-4);
    box-shadow: var(--shadow-3);
}

.Button1::after{
 content:'';
 position: absolute;
 color:white;
 width:100%;
 height: 100%;
 border-radius: var(--radius-5);
 background-color: red; 
 top:0;
 left:0;
 z-index: -1;
 transition:transform 200ms ease-in;
}
.Button1:hover{
    color:white;
}
.Button-one1::after{
    border-radius: var(--radius-4);
  transform: scaleX(0);
  transform-origin: left;
  transform-origin: right;
  color:white;
}
.Button-one1:hover::after{
    border-radius: var(--radius-4);
  transform: scaleX(1);
  transform-origin: left;
  color:white;
}


.shipped{
  position: relative;
  display:flex;

  height: 6vh;
  margin:2em 0 1rem 0.25em;
  width:10em;
  cursor: pointer;
  border:2px solid  rgb(245, 163, 11);
    color:rgb(245, 163, 11);;
  text-decoration: none;
  background: rgba(255, 255, 255, 0);

  text-decoration: none;
  color: rgb(245, 163, 11);;
  font-size:1rem;
  font-weight: bold;
  padding:0.5em 0.5em;
  z-index:1;
  align-items: center;
  vertical-align: middle;
  text-align: center;
  justify-content: center;
  border-radius: var(--radius-4);
    box-shadow: var(--shadow-3);
}

.shipped::after{
 content:'';
 position: absolute;
 color:white;
 width:100%;
 height: 100%;
 border-radius: var(--radius-5);
 background-color: rgb(245, 163, 11);; 
 top:0;
 left:0;
 z-index: -1;
 transition:transform 200ms ease-in;
}
.shipped:hover{
    color:white;
}
.shipped-one1::after{
    border-radius: var(--radius-4);
  transform: scaleX(0);
  transform-origin: left;
  transform-origin: right;
  color:white;
}
.shipped-one1:hover::after{
    border-radius: var(--radius-4);
  transform: scaleX(1);
  transform-origin: left;
  color:white;
}

.delivery{
  position: relative;
  display:flex;

  height: 6vh;
  margin:2em 0 1rem 0.25em;
  width:10em;
  cursor: pointer;
  border:2px solid  rgb(245, 163, 11);
    color:rgb(245, 163, 11);;
  text-decoration: none;
  background: rgba(255, 255, 255, 0);

  text-decoration: none;
  color: rgb(245, 163, 11);;
  font-size:1rem;
  font-weight: bold;
  padding:0.5em 0.5em;
  z-index:1;
  align-items: center;
  vertical-align: middle;
  text-align: center;
  justify-content: center;
  border-radius: var(--radius-4);
    box-shadow: var(--shadow-3);
}

.delivery::after{
 content:'';
 position: absolute;
 color:white;
 width:100%;
 height: 100%;
 border-radius: var(--radius-5);
 background-color: rgb(245, 163, 11);; 
 top:0;
 left:0;
 z-index: -1;
 transition:transform 200ms ease-in;
}
.delivery:hover{
    color:white;
}
.delivery-one1::after{
    border-radius: var(--radius-4);
  transform: scaleX(0);
  transform-origin: left;
  transform-origin: right;
  color:white;
}
.delivery-one1:hover::after{
    border-radius: var(--radius-4);
  transform: scaleX(1);
  transform-origin: left;
  color:white;
}





.fancy-link{
  text-decoration: none;
  color:rgb(6, 94, 132);
  position:relative;
  font-size:20px;
}
.fancy-link::after{
content:'';
position:absolute;
left:0;
bottom: 0;
width:100%;
height:2px;
background-color: currentColor;

transform:scaleX(0);
transform-origin:right;
transition:transform 250ms ease-in;
}
.fancy-link:hover::after{
  transform: scaleX(1);
  transform-origin: left;
}
.Button{
  position: relative;
  display:flex;

  height: 6vh;
  margin:2em 0 1rem 0.25em;
  width:10em;
  cursor: pointer;
  border:2px solid rgb(6, 94, 132);
    color:rgb(6, 94, 132);
  text-decoration: none;
  background: rgba(255, 255, 255, 0);

  text-decoration: none;
  color:rgb(6, 94, 132);
  font-size:1rem;
  font-weight: bold;
  padding:0.5em 0.5em;
  z-index:1;
  align-items: center;
  vertical-align: middle;
  text-align: center;
  justify-content: center;
  border-radius: var(--radius-1);
    box-shadow: var(--shadow-3);
}
input{
    color:black;
    
}
.Button::after{
 content:'';
 position: absolute;
 color:white;
 width:100%;
 height: 100%;
 border-radius: var(--radius-1);
 background-color:rgb(6, 94, 132) ;
 top:0;
 left:0;
 z-index: -1;
 transition:transform 200ms ease-in;
}
.Button:hover{
    color:white;
}
.Button-one::after{
    border-radius: var(--radius-4=1);
  transform: scaleX(0);
  transform-origin: left;
  transform-origin: right;
  color:white;
}
.Button-one:hover::after{
    border-radius: var(--radius-1);
  transform: scaleX(1);
  transform-origin: left;
  color:white;
}




.photo{
    position: relative;
    height:35vh;
    width:35vh;
    border-radius:360px ;
    /* border-radius: var(--radius-8); */
    box-shadow: 5px 5px 20px rgba(43, 42, 42, 0.445);


    margin:2rem 4rem;
    border:4px solid rgb(6, 94, 145);

}
/* width */
#scroll::-webkit-scrollbar {
   width: 20px;
}

/* Track */
#scroll::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 15px;
}
 
/* Handle */
#scroll::-webkit-scrollbar-thumb {
    background: rgba(88, 88, 88, 0.26);
  border-radius: 15px;
}

/* Handle on hover */
#scroll::-webkit-scrollbar-thumb:hover {
 background: rgba(88, 88, 88, 0.61); 
}
.media-scroller{
    --spacer: 1rem;
    display: grid;
    gap: var(--spacer);
    grid-auto-flow: column;
    grid-auto-columns: 24%;

    padding: 0 var(--spacer) var(--spacer);
    overflow-x:auto;
    overscroll-behavior-inline: contain;

}
.media-scroller{
    --spacer: 1rem;
    display: grid;
    gap: var(--spacer);
    grid-auto-flow: column;
    grid-auto-columns: 24%;

    padding: 0 var(--spacer) var(--spacer);
    overflow-x:auto;
    overscroll-behavior-inline: contain;

}
.media-element{
    display: grid;
    grid-template-rows: min-content;
    gap: var(--size-1rem);
    padding:var(--spacer);
    background: var(--surface-6);
    border-radius: var(--radius-2);
    box-shadow: var(--shadow-4);

}
.media-element > img{
    inline-size: 100%;
   aspect-ratio: 16/14;
   object-fit: cover;


}
.media-element:hover{
  background-color:rgb(6, 94, 145,0.100)
}
.productData{
    align-items: center;
    justify-content: center;
    color:black;
    
}
.heading{
    
}
.productData > p{
    color:rgb(0,0,0,0.500);
    margin: 1rem 0;


}
.img > img{
    inline-size: 50%; 
    aspect-ratio: 16/9; 
   border-radius: var(--radius-3);

   height:10rem ;
   width:10rem;
   object-fit: cover;
   margin:2rem 4rem;
}

.name{
color:black;
text-decoration:none;

}
.name:hover{
text-decoration:underline;

}



</style>
    </head>
    <body style="background-color:hsl(0,0%,95%); margin:0 20px; font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; " >
<div id="loading"></div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
    <?php
$email=$_SESSION['email'];
$sql="SELECT * FROM sellerdetails WHERE Email='$email'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $sn=$row['Name'];
        $sgn=$row['Gender'];
        $se=$row['Email'];
        $su=$row['Username'];
        $sp=$row['Password'];
        $ssh=$row['Shop_name'];
        $sa=$row['Address'];
        $ss=$row['State'];
        $sph=$row['Phone'];
        $spid=$row['Photo_Id'];
        if(!empty($spid)){
            $photo="uploads/".$spid;
        }
        else{
            $sgn=strtolower($sgn);
            $photo="uploads/".$sgn.".jpg";
        }
      }
}
else{
    echo "<div  class='alert alert-danger' role='alert'>Something went wrong. Please try again later!!
  </div>"; 
}

?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <img src="uploads/logo.jpg" height="60rem" width="65rem" class="logo mt-2 mb-2 ml-2">

  <a class="navbar-brand" href="index.php" style="color:rgb(6, 94, 145) ;padding-left: 1vw; "> Shop Now</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link " href="SellerProducts.php" >Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="SellerDetails.php" >User Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="SellerAddItems.php"  >Add Items</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="SellerOrder.php"  >Orders</a>
      </li>
     
      <li>
      <a class="nav-link" href="SellerContactUs.php" >Contact Us</a>
      
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="logout.php">Log out</a>
      </li>

    </ul>
  
  </div>
  <!-- <div class="float-right"><i class="fa fa-shopping-cart" style="font-size:30px"></i></div> -->
  <div class="float-right"><a href="SellerDetails.php" style="display:flex;"><img src="<?php echo $photo;?>" style="height:9vh; width:9vh; object-fit: cover;  border-radius: 50px; margin-right:5vh;margin-left:5vh; cursor:pointer"></a></div>

</nav>
<?php
$sql="SELECT * FROM orders";
?>
<table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Name</th>
      <th>Address</th>


      <th>Product</th>
      <th>Order Date</th>
      <th>Price</th>
      <th>Expected Delivery Date</th>

      <th>Delivery Status</th>
      <th>Operation</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $email=$_SESSION['email'];
    $sql22="SELECT * FROM orders WHERE Seller_Email='$email' AND Order_Id='$id' ORDER BY Serial_no DESC";
    $result22=mysqli_query($conn,$sql22);
    if(mysqli_num_rows($result22)>0){
      while($row22=mysqli_fetch_assoc($result22)){
        $Serial_no=$row22['Serial_no'];
        $Email=$row22['Email'];
        $sql23="SELECT * FROM buyerdetails WHERE Email='$Email'";
        $result23=mysqli_query($conn,$sql23);
        if(mysqli_num_rows($result23)>0){
          while($row23=mysqli_fetch_assoc($result23)){
        $Name=$row23['Name'];

            $Photo_Id=$row23['Photo_Id'];
            $bs=$row23['Serial_no'];
            $Gender=$row23['Gender'];
            if(!empty($Photo_Id)){
              $photo="buyerUpload/".$Photo_Id;
          }
          else{
              $sgn=strtolower($Photo_Id);
              $photo="uploads/".$Gender.".jpg";
          }
          }
        }
        $Phone_no=$row22['Phone_no'];
        $Product_no=$row22['Product_no'];
        $Product_name=$row22['Product_name'];
        $Address=$row22['Address'];
        $Brand=$row22['Brand'];
        $no_item=$row22['no_item'];
        $Weight=$row22['Weight'];
        $Date=$row22['Date'];
        $Order_Date=$row22['Order_Date'];
        $Price=$row22['Price'];
        $Delivery_Status=$row22['Delivery_Status'];
        $Delivery_Date=$row22['Delivery_Date'];
        $today= date("d/m/y");
        $date= DateTime::createFromFormat('d/m/y', $today);
        $today=$date;
        $exp_date=$Date;
        $date_convert = DateTime::createFromFormat('d/m/y', $exp_date);
        if ($today > $date_convert) {
          $dateval= "<td style='color:red;font-weight:bold'> $Date</td>";
      }
      elseif($today == $date_convert){
        $dateval= "<td style='color:green;font-weight:bold'>$Date</td>";
      }
      
      else {
          $dateval= "<td style='font-weight:bold'>  $Date </td>";
      }
      
    ?>
    <tr <?php echo ($Delivery_Status=='Delivered'||$Delivery_Status=='Cancelled' ?"style='background:rgb(0,0,0,0.150)'":"style='background:white'")?>>
      <td>
        <div class="d-flex align-items-center">
          <img
              src="<?php echo $photo?>"
              alt=""
              style="width: 45px; height: 45px"
              class="rounded-circle"
              />
          <div class="ms-3">
          <a  href="SellerBuyerView.php?id=<?php echo $bs?>" style="text-decoration:none; color:"><p class="fw-bold mb-1"><?php echo $Name ?></p></a>
            <p class="text-muted mb-0"><?php echo $Email ?></p>
            <p class="text-muted mb-0"><?php echo $Phone_no ?></p>


          </div>
        </div>
      </td>
      <td><?php echo $Address?></td>
      <td>
      <a href="ProductView.php?id=<?php echo $Product_no ?>" class="name"><p class="fw-normal mb-2"><?php echo $Product_name ?></p></a>
        <p class="text-muted mb-0">Brand: <?php echo $Brand ?></p>
        <p class="text-muted mb-0">Weight: <?php echo $Weight ?></p>
        <p class="text-muted mb-0">Items: <?php echo $no_item ?></p>



      </td>
      <td><?php echo $Order_Date ?></td>
     
      <td> <?php echo "₹$Price.00" ?></td>
      <?php echo $dateval?>

      <td>
        <p class="fw-normal mb-1"><?php echo $Delivery_Status ?></p>
        <p class="text-muted mb-0"><?php echo $Delivery_Date ?></p>

      </td>
      <td>
        <button type="button" id="status" class="button button-one" data-status="<?php echo $Delivery_Status?>" data-id="<?php echo $Serial_no ?>" >
          <?php echo $Delivery_Status?>
        </button>
        <button type="button" id="cencelbtn" data-id="<?php echo $Serial_no ?>"   id="cancelorder" class="button1 button-one1">
          Cancel
        </button>
      </td>
      </tr>
      <?php
       }
}
?>

  </tbody>
</table>
<script src="jquery.js"></script>
<script>
 $( document ).ready(function() {
          // loadtable();
          $(document).on("click","#cencelbtn",function(){
            var id= $(this).data("id");
            var ele=this;
            if (confirm('Do you really want to cancel this product?')) {
              $.ajax({
            url:"cancelOrder.php",
            type:"POST",
            data:{id:id},
            success: function (data) {
                if(data==1){
                  $('.table').load('SellerOpenOrderProduct.php .table');

                  // $('.table').load('SellerOrder.php .table tbody')


                   
                }
             else if(data==2){
              alert("Product have already been delivered");
             }
             else if(data==3){
              alert("Product have already been cancelled");
             }
                else {
                alert("Something Went wrong!!");
                
               }
              
                
            } });
            }
          })

          $(document).on("click","#status",function(){
            var id= $(this).data("id");
            var status= $(this).data("status");
            // alert(status);
            var ele=this;
            if (confirm('Do you really want to change the delivery status?')) {
            // alert(id);
            $.ajax({
            url:"status.php",
            type:"POST",
            data:{id:id,status:status},
            success: function (data) {
                if(data==1){
                  $('.table').load('SellerOpenOrderProduct.php .table');

                   
                }
                else if(data==2){
                alert("Product has already been delivered!!");

                }
                else if(data==3){
                alert("Product has already been cancelled!!");

                }
             
                else {
                alert("Something Went wrong!!");
                
               }
                
            } });
            
          }

          });
        });

</script>
</body></html>