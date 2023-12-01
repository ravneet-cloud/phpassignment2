
<?php
require("connection/connection.php");
session_start();
?>

<?php 
include 'header/header.php';
?>   
    
  <div class="top-buffer">

    <div class="container bg-dark text-light p-3 rounderd my-4 " style="width:2500px;">
        <div class="d-flex align-items justify-content-between px-3">
            <h2>
                <a href="index.php" class="text-white text-decoration-none">USER LIST</a>

            </h2>
        </div>
    </div>

    
    <div class="container mt-5 p-0">
            <table class="table table-hover text-center">
                <thead class="bg-dark text-light">
                    <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
                    <th width="20%"scope="col">Full Name</th>
                    <th width="20%" scope="col">Username</th>
                    <th width="30%" scope="col">Email</th>
                    <th width="20%" scope="col">User Type</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                        $query= "SELECT * FROM `registered_users`";
                        $result=mysqli_query($conn,$query);
                        $i=1;
                        $fetch_src=FETCH_SRC;

                        while($fetch=mysqli_fetch_assoc($result))
                        {
                            echo<<<product
                                <tr class="align-middle">
                                    <th scope="row">$i</th>
                                    <td>$fetch[full_name]</td>
                                    <td>$fetch[username]</td>
                                    <td>$fetch[email]</td>
                                    <td>$fetch[usertype]</td>
                                </tr>
                            product;
                            $i++;
                        }
                    ?>
                    
                </tbody>
        </table>

    </div>
    
    <?php
            $query = "SELECT COUNT(*) AS count, FLOOR(price/100)*100 AS price_range FROM products GROUP BY FLOOR(price/100)*100";
            $result=mysqli_query($conn,$query);
            

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    ?>
    
   
<?php 
include 'footer/footer.php';
?>   
