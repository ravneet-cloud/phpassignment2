
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
                <a href="index.php" class="text-white text-decoration-none">Spark Jewellery</a>

            </h2>
        
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct1">
            <i class="bi bi-plus"></i>Add Product
            </button>
        </div>
    </div>

    <?php
        if(isset($_GET['alert']))
        {
            if($_GET['alert']=='img_upload1')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Image upload failed! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
            if($_GET['alert']=='add_failed1')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Cannot Add Product! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
            
        }
        else if(isset($_GET['success']))
        {
            
            
            if($_GET['success']=='added1')
            {
                echo<<<alert
                    <div class="container alert alert-success alert-dismissible text-center" role="alert">
                        <strong>Product Added!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            
        
        }


    ?>

    <div class="container mt-5 p-0">
            <table class="table table-hover text-center">
                <thead class="bg-dark text-light">
                    <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
                    <th width="15%"scope="col">Image</th>
                    <th width="10%" scope="col">Name</th>
                    <th width="10%" scope="col">Price</th>
                    <th width="35%" scope="col" class="rounded-end">Description</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    <?php
                        $query= "SELECT * FROM `products`";
                        $result=mysqli_query($conn,$query);
                        $i=1;
                        $fetch_src=FETCH_SRC;

                        while($fetch=mysqli_fetch_assoc($result))
                        {
                            echo<<<product
                                <tr class="align-middle">
                                    <th scope="row">$i</th>
                                    <td><img src="$fetch_src$fetch[image]" width="100px"></td>
                                    <td>$fetch[name]</td>
                                    <td>$$fetch[price]</td>
                                    <td>$fetch[description]</td>
                                </tr>
                            product;
                            $i++;
                        }
                    ?>
                    
                </tbody>
        </table>

    </div>

    <div class="modal fade" id="addproduct1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
        <form action="crud.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" >Add Product</h1>
                
            </div>
            <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >Name</span>
                        <input type="text" class="form-control"name="name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" >Price</span>
                        <input type="number" class="form-control"name="price"  min=1 required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="desc" required></textarea>
                    </div>
            </div>
            <div class="input-group mb-3">
                    <label class="input-group-text" >Image</label>
                    <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg" required>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="addproduct1">Add</button>
            </div>
            </div>
        </form>
    </div>
</div>
                    </div>
<?php 
include 'footer/footer.php';
?>   
