<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Item | NAVI Merchandise</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <script type="text/javascript" src="home.js" defer></script>
</head>
<body>
    <!-- NAV BAR -->
    <nav>
        <h4 class="title">NAVI General Merchandise</h4>
        <a href="index.php">Logout</a>
    </nav>
    <!-- SIDEBAR -->
    <aside id="sidebar">
      <ul>
        <li>
            <img src="svg/logo-removebg-preview.png" alt="">
            <button onclick=toggleSidebar() id="toggle-btn">
                <svg xmlns="http:www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
            </button>
        </li>
        <li>
           <a href="home.php">
            <svg xmlns="http:www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
            <span>Home</span>
           </a>     
        </li> 
        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <svg class="icon" xmlns="http:www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-280h160v-160H280v160Zm240 0h160v-160H520v160ZM280-520h160v-160H280v160Zm240 0h160v-160H520v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                <span>Items</span>
                <svg class="arrow" xmlns="http:www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
            </button>
                        <ul class="sub-menu">
                            <div>
                                <li><a href="items-add.php">Add</a></li>
                                <li class="active"><a href="items-editanddelete.php">Edit & Delete</a></li>            
                            </div>
                        </ul>
        </li>
        <li>
            <a href="inventory.php">
                <svg xmlns="http:www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z"/></svg>
                <span>Inventory</span>
            </a>
        </li>
       </ul>
    </aside>
    <!-- MAIN  -->
    <main class="inventory-table">
        <h2>Customize Items</h2>
        <!-- CUSTOMIZE ITEM TABLE -->
        <div class="table">
        <table class="pure-table pure-table-horizontal">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // CONNECTING TO THE SERVER AND DATABASE
                include 'connect.php';
                //ERROR HANDLING
                    if($connection->connect_error){
                        die("Connection failed: " . $connection->connect_error);
                    }
                //SELECTING DATA TO THE SERVER 
                    $sql = "SELECT * FROM prodinvent";
                    $result = $connection->query($sql);
                //ERROR HANDLING
                    if(!$result){
                        die("Invalid query: " . $connection->error);
                    }
                    // FETCHING DATA TO THE SERVER
                    // DISPLAYING THE DATA
                    while($row = $result->fetch_assoc()){
                        echo " 
                                <tr>
                                    <td>$row[ProdId]</td>
                                    <td>$row[ProdName]</td>
                                    <td>$row[Price]</td>
                                    <td>$row[Quantity]</td>
                                    <td>$row[Category]</td>
                                    <td>
                                     <a href='items-edit.php?editid=$row[ProdId]'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#e8eaed'><path d='M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z'/></svg></a>
                                     <a href='items-delete.php?deleteid=$row[ProdId]'><svg xmlns='http://www.w3.org/2000/svg' height='24px' viewBox='0 -960 960 960' width='24px' fill='#e8eaed'><path d='M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z'/></svg></a>        
                                     </td>
                                </tr>
                        ";

                    }


                ?>
               
            </tbody>
        </table>
        </div>
    </main>
   
    <footer>Footer                   </footer>
</body>
</html>