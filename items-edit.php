<?php
// CONNECTING TO THE SERVER AND DATABASE
include 'connect.php';

// GETTING THE PRODID TO SELECT THE DATA TO BE EDIT
$ProdId = $_GET['editid'];

$sql = "SELECT * FROM prodinvent WHERE ProdId=$ProdId";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

// DISPLAYING THE DATA THAT HAS BEEN SELECTED TO THE FORM
    $ProdId=$row['ProdId'];
    $ProdName=$row['ProdName'];
    $Price=$row['Price'];
    $Quantity=$row['Quantity'];
    $Category=$row['Category'];

// INITIALIZING THE DATA THAT HAS BEEN EDITED
if(isset($_POST['submit'])){
    $ProdId=$_POST['ProdId'];
    $ProdName=$_POST['ProdName'];
    $Price=$_POST['Price'];
    $Quantity=$_POST['Quantity'];
    $Category=$_POST['Category'];

// UPDATING THE DATA TO THE SERVER
    $sql = "UPDATE prodinvent SET  ProdId='$ProdId', ProdName='$ProdName', Price='$Price', Quantity='$Quantity', Category='$Category'
            WHERE ProdId=$ProdId";
            $result = mysqli_query($connection,$sql);
// REDIRECTING THE USER TO THE CUSTOMIZE ITEM PAGE
            If($result){
                header('location: items-editanddelete.php');
            //ERROR HANDLING
            }else{
                die(mysqli_error($connection));
            }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item | NAVI Merchandise</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="home.js" defer></script>
</head>
<body>
    <!-- NAV BAR -->
    <nav>
        <h4 class="title">NAVI General Merchandise</h4>
        <a href="index.php">Logout</a>
    </nav>
    <!-- SIDEBAR  -->
    <aside id="sidebar">
      <ul>
        <li>
            <img src="svg/logo-removebg-preview.png" alt="">
            <button onclick=toggleSidebar() id="toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
            </button>
        </li>
        <li>
           <a href="home.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
            <span>Home</span>
           </a>     
        </li>   
        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <svg class="icon" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-280h160v-160H280v160Zm240 0h160v-160H520v160ZM280-520h160v-160H280v160Zm240 0h160v-160H520v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                <span>Items</span>
                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
            </button>
                        <ul class="sub-menu">
                            <div>
                                <li class="active"><a href="items-add.php">Add</a></li>
                                <li><a href="items-editanddelete.php">Edit & Delete</a></li>
                            </div>
                        </ul>
        </li>
        <li>
            <a href="inventory.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z"/></svg>
                <span>Inventory</span>
            </a>
        </li>
     
      </ul>
    </aside>

    <!-- MAIN PAGE -->
    <main>
        <!-- EDIT FORM -->
        <form action="" method="post" class="add-form">
            <label for="">Product ID</label>
                <input type="text" name="ProdId" placeholder="Product ID" value="<?php echo $ProdId; ?>">
            <label for="">Product Name</label>
                <input type="text" name="ProdName" placeholder="Product Name" value="<?php echo $ProdName; ?>">
            <label for="">Price</label>
                <input type="text" name="Price" placeholder="Price" value="<?php echo $Price; ?>">
            <label for="">Quantity</label>
                <input type="text" name="Quantity" placeholder="Quantity" value="<?php echo $Quantity; ?>">
            <label for="">Category</label>
                <input type="text" name="Category" placeholder="Category" value="<?php echo $Category; ?>">
            
            <button type="submit" name="submit">Save</button>
        </form>


         
    </main>
    <footer>Footer</footer>
</body>
</html>