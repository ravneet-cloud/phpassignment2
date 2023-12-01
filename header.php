
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spark Jewellery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <link rel="stylesheet" href="css/user_login.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-light">
    <header>
    
        <h2> <img src="Images/download.jpeg" height="50px" width="50px" > Spark Jewellery</h2>
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
        
            if((isset($_SESSION['logged_in'])) && ($_SESSION['logged_in']==true))
            {
                echo"
                    <div class='user'>
                        
                         <a href='logout.php'>LOGOUT</a>
                    </div>
                ";
            }
            else
            {
                echo"
                    <div class='sign-in-up'>
                    <button type='button' onclick=\"popup('admin-popup')\">ADMIN LOGIN</button>
                        <button type='button' onclick=\"popup('login-popup')\">USER LOGIN</button>
                        <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
                    </div>
                ";
            }
            
        ?>
       <div class="popup-container" id="login-popup">
        <div class="popup">
            <form method="POST" action="login_register.php" onsubmit="return validateLoginForm()">
                <h2>
                    <span>USER LOGIN</span>
                    <button type="reset" onclick="popup('login-popup')"><i class="bi bi-x-circle-fill"></i></button>
                </h2>
                <div class="input-icons">
                <i class="bi bi-envelope-fill"></i>
                <input type="text" placeholder="Email or Username" name="email_username" required>
                <i class="bi bi-key-fill"></i>
                <input type="password" placeholder="Password" name="password" id="userpassword" required>
                <button type="submit" class="login-btn" name="login">LOGIN</button>
        </div>
            </form>
        </div>
    </div>

    <div class="popup-container" id="admin-popup">
        <div class="admin popup">
            <form method="POST" action="login_register.php" onsubmit="return validateAdminForm()">
                <h2>
                    <span>ADMIN LOGIN</span>
                    <button type="reset" onclick="popup('admin-popup')"><i class="bi bi-x-circle-fill"></i></button>
                </h2>
                <div class="input-icons">
                <i class="bi bi-envelope-fill"></i>
                <input type="text" placeholder="Email or Username" name="email_username" required>
                <i class="bi bi-key-fill"></i>
                <input type="password" placeholder="Password" name="password" id="adminpassword" required>
                <button type="submit" class="admin-btn" name="admin">LOGIN</button>
        </div>
            </form>
        </div>
    </div>

    <div class="popup-container" id="register-popup">
        <div class="register popup">
            <form method="POST" action="login_register.php" onsubmit="return validateForm()">
                <h2>
                    <span>USER REGISTER</span>
                    <button type="reset" onclick="popup('register-popup')"><i class="bi bi-x-circle-fill"></i></button>
                </h2>
                <div class="input-icons">
                <i class="bi bi-person-lines-fill"></i>
                <input type="text" placeholder="Full Name" name="fullname" id="fullname" required>
                <i class="fa fa-user icon"></i>
                <input type="text" placeholder="Username" name="username" id="username" required>
                <i class="bi bi-envelope-fill"></i>
                <input type="email" placeholder="E-mail" name="email" id="email" required>
                <i class="bi bi-key-fill"></i>
                <input type="password" placeholder="Password" name="password" id="password" required>
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
    
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Validate email (same as before)
            if (!validateEmail(email)) {
                alert("Invalid email format");
                return false;
            }

            // Validate password
            if (password.length < 6 || !password.match(/[^\w\s]/)) {
                alert("Password must have at least 6 characters and include at least one special character.");
                return false;
            }

            // Other validations (if any)

            return true; // Submit the form if all validations pass
        }

        function validateLoginForm() {
            
            var password = document.getElementById('loginpassword').value;
      
            if (password.length < 6 || !password.match(/[^\w\s]/)) {
                alert("Password must have at least 6 characters and include at least one special character.");
                return false;
            }
            return true; 
        }
        
        function validateAdminForm() {
            
            var password = document.getElementById('adminpassword').value;
      
            if (password.length < 6 || !password.match(/[^\w\s]/)) {
                alert("Password must have at least 6 characters and include at least one special character.");
                return false;
            }
            return true; 
        }
        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    </script>
 
        
    </header>
    <div id="page-container">