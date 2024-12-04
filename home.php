<?php
    // CONNECTING TO DATABASE
    include 'connect.php';

        // SELECTING THE DATE AND TIME STAMP OF THE RECENT CREATED ITEM
        $sql_added = "SELECT ProdName, Category, created_at FROM prodinvent ORDER BY created_at DESC LIMIT 10"; 
        // FETCHING DATA IN THE DATABASE AND SAVING IT IN A VARIABLE
        $result_added = $connection->query($sql_added);
        //SELECTING THE COUNT OF QUANTITY IN THE ITEMS
        $sql_stocks = "SELECT ProdName, Price, Quantity FROM prodinvent ORDER BY Quantity DESC LIMIT 10";
        // FETCHING DATA IN THE DATABASE AND SAVING IT IN A VARIABLE
        $result_stocks = $connection->query($sql_stocks);

        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | NAVI Merchandise</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
    <script type="text/javascript" src="home.js" defer></script>
</head>
<body>
    <!-- NAVIGATION BAR -->
    <nav>
        <h4 class="title">NAVI General Merchandise</h4>
        <a href="index.php">Logout</a>
    </nav>
    <!-- SIDE BAR -->
    <aside id="sidebar">
      <ul>
        <li>
            <img src="svg/logo-removebg-preview.png" alt="">
            <button onclick=toggleSidebar() id="toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
            </button>
        </li>
        <li class="active">
           <a href="home.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg>
            <span>Home</span>
           </a>     
        </li> 
        <li>
            <button onclick=toggleSubMenu(this) class="dropdown-btn">
                <svg class="icon" xmlns="http://wwwl.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M280-280h160v-160H280v160Zm240 0h160v-160H520v160ZM280-520h160v-160H280v160Zm240 0h160v-160H520v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg>
                <span>Items</span>
                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
            </button>
                    <ul class="sub-menu">
                        <div>
                            <li><a href="items-add.php">Add</a></li>
                            <li><a href="items-editanddelete.php">Edit & Delete</a></li>
                            
                        </div>
                    </ul>
        <li>
            <a href="inventory.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-80q-33 0-56.5-23.5T120-160v-451q-18-11-29-28.5T80-680v-120q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v120q0 23-11 40.5T840-611v451q0 33-23.5 56.5T760-80H200Zm0-520v440h560v-440H200Zm-40-80h640v-120H160v120Zm200 280h240v-80H360v80Zm120 20Z"/></svg>
                <span>Inventory</span>
            </a>
        </li>
       
        </li>
      </ul>
    </aside>
        <?php
        // CONNECTING TO THE DATA BASE
        include 'connect.php';
        
        //SELECTS THE COUNT OF CATEGORY AND ITEMS IN THE TABLE PRODINVENT
        $sql = 'SELECT COUNT(DISTINCT category) AS category_count, COUNT(DISTINCT prodname) AS item_count FROM prodinvent';
    
        $result = mysqli_query($connection, $sql);
        
        // ACQUIRING DATA TO THE DATABASE
        if ($result) {
        $row = mysqli_fetch_assoc($result);
        
        //SAVING THE DATA IN A VARIABLE
        $categoryCount = $row['category_count'];
        $itemCount = $row['item_count'];
        
        } else {
        $categoryCount = "Error: " . mysqli_error($conn);
        }   
        ?>

        <!-- MAIN DASHBOARD -->
    <main class="dashboard">
        <div class="container">
            <!-- SHOW THE NUMBER OF CATEGORIES AND ITEMS IN THE TABLE -->
             <div class="box">
                <img src="svg/category_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="">              
                   <div class="content">    
                    <p>Category</p>
                    <span><?php echo  $categoryCount ?></span>
                </div>
            </div>
            <div class="box">
                  <img src="svg/dataset_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.svg" alt="">
                <div class="content">
                    <p>Items</p>
                    <span><?php echo $itemCount?></span>
                </div>
        </div>
        </div>

        <!-- RECENTLY ITEMS TABLE -->

        <div class="home-table">
            <div class="highlights">
            <table class="pure-table pure-table-horizontal">
                <h4>Recently Added</h4>
                <thead>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Created At</th>
                </thead>
                <tbody>
        <?php
            //DISPLAYING THE DATA BY USING A TABLE
            while($row = $result_added->fetch_assoc()) {
                echo "<tr>
                        <td>$row[ProdName]</td>
                        <td>$row[Category]</td>
                        <td>$row[created_at]</td>
                    </tr>";
            }
    
        ?>
                </tbody>
            </table>      
            
            <!-- STOCKS OF THE ITEMS -->

            <table class="pure-table pure-table-horizontal">
                <h4>Item Stocks</h4><thead>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                <?php
                    //DISPLAYING THE DATA BY USING A TABLE
                    while($row = $result_stocks->fetch_assoc()) {
                        echo "<tr>
                                <td>$row[ProdName]</td>
                                <td>$row[Price]</td>
                                <td>$row[Quantity]</td>
                            </tr>";
                    }

                ?>
                </tbody>
            </table>
        </div>
        </div> 
</main>
    <footer></footer>
</body>
</html>