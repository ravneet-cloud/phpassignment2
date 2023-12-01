
<?php
require("connection/connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Jewellery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
<header>
    
        <h2> <img src="Images/download.jpeg" height="50px" width="50px" > Spark Jewellary</h2>
        <nav class="navigation">
            
            <a href="user_login.php">Home</a>
            <?php
                
                if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==true))
                { echo '<a href="index2.php">Dashboard</a>';}
                else
                {
                    echo '<a href="index.php">Dashboard</a>';
                }
            ?>
            <a href="user_login.php#services">Services</a>
            <a href="user_login.php#contact">Contact</a>

        </nav>

        <?php
        
            
                echo"
                    <div class='user'>
                         <a href='logout.php'>LOGOUT</a>
                    </div>
                ";
            
            
        ?>
       <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')">x</button>
                </h2>
                <input type="text" placeholder="Email or Username" name="email_username">
                <input type="password" placeholder="Password" name="passsword">
                <button type="submit" class="login-btn" name="login">LOGIN</button>

            </form>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')"><i class="bi bi-x-circle-fill"></i></button>
                </h2>
                <div class="input-icons">
                <i class="bi bi-person-lines-fill"></i>
                <input type="text" placeholder="Full Name" name="fullname">
                <i class="fa fa-user icon"></i>
                <input type="text" placeholder="Username" name="username">
                <i class="bi bi-envelope-fill"></i>
                <input type="email" placeholder="E-mail" name="email">
                <i class="bi bi-key-fill"></i>
                <input type="password" placeholder="Password" name="password">
                <button type="submit" class="register-btn" name="register">REGISTER</button>
        </div>
            </form>
        </div>
    </div>

    <?php
        if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']==true)
        {
            
        }
    ?>

    <script>
        function popup(popup_name)
        {
            get_popup=document.getElementById(popup_name);
            if(get_popup.style.display=="flex"){
                get_popup.style.display="none";
            }
            else{
                get_popup.style.display="flex";
            }
        }
    </script>

    </header>
    <div id="page-container">
<div class="top-buffer-updated" >
    <div class="container bg-dark text-light p-3 rounderd my-4" style="width:2600px;">
        <div class="d-flex align-items justify-content-between px-3">
            <h2>
                <a href="index2.php" class="text-white text-decoration-none">Spark Jewellery</a>

            </h2>
        
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct">
            <i class="bi bi-plus"></i>Add Product
            </button>
        </div>
    </div>

    <?php
        if(isset($_GET['alert']))
        {
            if($_GET['alert']=='img_upload')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Image upload failed! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['alert']=='img_rem_fail')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Image Removal failed! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['alert']=='add_failed')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Cannot Add Product! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['alert']=='remove_failed')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Cannot Remove Product! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['alert']=='update_failed')
            {
                echo<<<alert
                    <div class="container alert alert-danger alert-dismissible text-center" role="alert">
                        <strong>Cannot Update Product! Server Down</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
        }
        else if(isset($_GET['success']))
        {
            
            if($_GET['success']=='updated')
            {
                echo<<<alert
                    <div class="container alert alert-success alert-dismissible text-center" role="alert">
                        <strong>Product Updated </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['success']=='added')
            {
                echo<<<alert
                    <div class="container alert alert-success alert-dismissible text-center" role="alert">
                        <strong>Product Added!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
            if($_GET['success']=='removed')
            {
                echo<<<alert
                    <div class="container alert alert-success alert-dismissible text-center" role="alert">
                        <strong>Product Removed!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                alert;
            }
        
        }


    ?>

    <div class="container mt-4 p-0">
            <table class="table table-hover text-center">
                <thead class="bg-dark text-light">
                    <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No.</th>
                    <th width="15%" scope="col">Image</th>
                    <th width="10%" scope="col">Name</th>
                    <th width="10%" scope="col">Price</th>
                    <th width="35%" scope="col">Description</th>
                    <th width="20%" scope="col" class="rounded-end">Action</th>
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
                                        <td>
                                            <a href="?edit=$fetch[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                            <a href="?id=$fetch[id]" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                        </td>
                                    </tr>
                                product;
                                $i++;
                            }
                    ?>
                        
                    
                </tbody>
        </table>

    </div>

<div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <button type="submit" class="btn btn-success" name="addproduct">Add</button>
            </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
        <form action="crud.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" >Edit Product</h1>
                
            </div>
            <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" >Name</span>
                        <input type="text" class="form-control"name="name" id="editname" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" >Price</span>
                        <input type="number" class="form-control"name="price" id="editprice" min=1 required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Description</span>
                        <textarea class="form-control" name="desc" id="editdesc" required></textarea>
                    </div>
            </div>
            <img src="" id="editimg" width="50%" class="mb-9" ><br>
            <div class="input-group mb-3" >
                    <label class="input-group-text" >Image</label>
                    <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg" >
            </div>
            <input type="hidden" name="editpid" id="editpid">
            <div class="modal-footer">
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
            </div>
            </div>
        </form>
    </div>
</div>
                        </div>
<?php
if(isset($_GET['edit']) && $_GET['edit']>0)
{
    $query="SELECT * FROM `products` WHERE `id`='$_GET[edit]'";
    $result=mysqli_query($conn,$query);
    $fetch=mysqli_fetch_Assoc($result);
    echo"
        <script>
        var editproduct = new bootstrap.Modal(document.getElementById('editproduct'), {
            keyboard:false
        });
        document.querySelector('#editname').value=`$fetch[name]`;
        document.querySelector('#editprice').value=`$fetch[price]`;
        document.querySelector('#editdesc').value=`$fetch[description]`;
        document.querySelector('#editimg').src=`$fetch_src$fetch[image]`;
        document.querySelector('#editpid').value=`$fetch[id]`;
        editproduct.show();

        </script>
    ";
}

?>
<?php
    if(isset($_GET['id'])&& $_GET['id']>0)
    {
        $id=$_GET['id'];
        $query="SELECT * FROM `products` WHERE `id`='$_GET[id]'";
        $result=mysqli_query($conn,$query);
        $fetch=mysqli_fetch_assoc($result);
        $query="DELETE FROM `products` WHERE `id`='$id'";
        $result=mysqli_query($conn,$query);
        
    }
?>
<script>
    function confirm_rem(id){
        if(confirm("Are you sure, you want to delete this item?")){
            window.location.href="crud.php?rem="+id;
        }
    }
    </script>
<?php 
include 'footer/footer.php';
?>   
