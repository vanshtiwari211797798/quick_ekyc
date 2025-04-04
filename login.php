<?php 

if(!isset($_SESSION))
{ 
    session_start(); 
} 
include('includes/config.php');
if(isset($_SESSION['loggedin']) == true){
  ?>
  <script> 
  window.setTimeout(function() {
  window.location.href = "admin";
  }, 1500);
  </script>
  
    <?php
}  
if(isset($_POST['secret']) && $_POST['secret'] == "ahkwebsolutions" && !empty($_POST['username']) && !empty($_POST['password'])){
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);

  $res = mysqli_query($conn,"SELECT * FROM `usertable` WHERE phone='$username'  OR emailid='$username' OR userid='$username'  ");

  if(mysqli_num_rows($res) == 1 ){
    $userdata = mysqli_fetch_assoc($res);
    $vpass = password_verify($password,$userdata['password']);
    if($vpass){
      if($userdata['status'] == "verified"){
        
        if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
        ?>
			<script>
				$(function(){
					Swal.fire(
						'Success!',
						'You Are Logged In Successfully!',
						'success'
					)
				});
			</script>
			<?php
      
      $_SESSION['loggedin'] = true;
      $_SESSION['userid'] = $userdata['userid'];
      $_SESSION['name'] = $userdata['name'];
      $_SESSION['emailid'] = $userdata['emailid'];
      $_SESSION['phone'] = $userdata['phone'];
      $_SESSION['walletamount'] = $userdata['walletamount'];
      $_SESSION['usertype'] = $userdata['usertype'];
     
      ?>
      <script>
      window.setTimeout(function() {
      window.location.href = "admin";
      }, 1500);
      </script>
      
        <?php

        // 
      }else{
        ?>
        <script>
          $(function(){
            Swal.fire(
              'Opps!',
              'Your Account is Blocked or inactive Please Contact With Admin',
              'error'
            )
          });
        </script>
        <?php

      }


    }else{
      ?>
      <script>
        $(function(){
          Swal.fire(
            'Opps!',
            'Password Wrong!',
            'error'
          )
        });
      </script>
      <?php
    }

  }else{
    ?>
    <script>
      $(function(){
        Swal.fire(
          'Opps!',
          'Entered username Wrong or Not Exist',
          'error'
        )

      });

    </script>
    <?php
  }



}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login And Registration</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: linear-gradient(90deg, #e2e2e2, #c9d6ff);
}

.container {
    position: relative;
    width: 850px;
    height: 550px;
    background: #fff;
    border-radius: 30px;
    box-shadow: 0 0 30px rgba(0, 0, 0, .2);
    margin: 20px;
    overflow: hidden;
}

.form-box {
    position: absolute;
    right: 0;
    width: 50%;
    height: 100%;
    background: #fff;
    display: flex;
    align-items: center;
    color: #333;
    text-align: center;
    padding: 40px;
    z-index: 1;
    transition: .6s ease-in-out 1.2s, visibility 0s 1s;
}

.container.active .form-box {
    right: 50%;
}

.form-box.register {
    visibility: hidden;
}

.container.active .form-box.register {
    visibility: visible;
}

form {
    width: 100%;
}

.container h1 {
    font-size: 36px;
    margin: -10px 0;
}

.input-box {
    position: relative;
    margin: 30px 0;
}

.input-box input {
    width: 100%;
    padding: 13px 50px 13px 20px;
    background: #eee;
    border-radius: 8px;
    border: none;
    outline: none;
    font-size: 16px;
    color: #333;
    font-weight: 500;
}

.input-box input::placeholder {
    color: #888;
    font-weight: 400;
}

.input-box i {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    color: #888;
}

.forgot-link {
    margin: -15px 0 15px;
}

.forgot-link a {
    font-size: 14.5px;
    color: #333;
    text-decoration: none;
}

.btn {
    width: 100%;
    height: 48px;
    background: #7494ec;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, .1);
    border: none;
    cursor: pointer;
    font-size: 16px;
    color: #fff;
    font-weight: 600;
}

.container p {
    font-size: 14.5px;
    margin: 15px 0;
}

.social-icons {
    display: flex;
    justify-content: center;
}

.social-icons a {
    display: inline-flex;
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 8px;
    font-size: 24px;
    color: #333;
    text-decoration: none;
    margin: 0 8px;
}

.toggle-box {
    position: absolute;
    width: 100%;
    height: 100%;
}

.toggle-box::before {
    content: '';
    position: absolute;
    left: -250%;
    width: 300%;
    height: 100%;
    background: #7494ec;
    border-radius: 150px;
    z-index: 2;
    transition: 1.8s ease-in-out;
}

.container.active .toggle-box::before {
    left: 50%;
}

.toggle-panel {
    position: absolute;
    width: 50%;
    height: 100%;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 2;
    transition: .6s ease-in-out;
}

.toggle-panel.toggle-left {
    left: 0;
    transition-delay: 1.2s;
}

.container.active .toggle-panel.toggle-left {
    left: -50%;
    transition-delay: .6s;
}

.toggle-panel.toggle-right {
    right: -50%;
    transition-delay: .6s;
}

.container.active .toggle-panel.toggle-right {
    right: 0;
    transition-delay: 1.2s;
}

.toggle-panel p {
    margin-bottom: 20px;
}

.toggle-panel .btn {
    width: 160px;
    height: 46px;
    background: transparent;
    border: 2px solid #fff;
    box-shadow: none;
}

@media screen and (max-width: 650px) {
    .container {
        height: calc(100vh - 40px);
    }

    .form-box {
        bottom: 0;
        width: 100%;
        height: 70%;
    }

    .container.active .form-box {
        right: 0;
        bottom: 30%;
    }

    .toggle-box::before {
        left: 0;
        top: -270%;
        width: 100%;
        height: 300%;
        border-radius: 20vw;
    }

    .container.active .toggle-box::before {
        left: 0;
        top: 70%;
    }

    .toggle-panel {
        width: 100%;
        height: 30%;
    }

    .toggle-panel.toggle-left {
        top: 0;
    }

    .container.active .toggle-panel.toggle-left {
        left: 0;
        top: -30%;
    }

    .toggle-panel.toggle-right {
        right: 0;
        bottom: -30%;
    }

    .container.active .toggle-panel.toggle-right {
        bottom: 0;
    }
}

@media screen and (max-width: 400px) {
    .form-box {
        padding: 20px;
    }

    .toggle-panel h1 {
        font-size: 30px;
    }
}
    </style>
</head>

<body>

    <div class="container">
        <div class="form-box login">
            <form action="" method="POST">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Forgot password?</a>
                </div>
                <input type="hidden" name="secret" value="ahkwebsolutions">
                <button type="submit" class="btn">Login</button>
                <p>Or Login with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>
        
<?php
include('includes/config.php');
if (isset($_POST['reg']) && $_POST['reg'] == "ahkweb") {

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $profilepic = mysqli_real_escape_string($conn, $_POST['profilepic']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  if (!empty($password) && $phone != "ADMIN" && $email != "ADMIN") {
    $fpassword = password_hash($password, PASSWORD_DEFAULT);
    $checksql = mysqli_query($conn, "SELECT * FROM usertable WHERE emailid='$email' OR phone='$phone'");
    
    if (!empty($name) && !empty($phone) && !empty($email) && !empty($password)) {
      if (mysqli_num_rows($checksql) == 0) {
        
        $sql = "INSERT INTO `usertable` (`phone`, `emailid`, `name`, `psaid`, `cprize`, `password`, `city`, `state`, `userid`, `status`, `profilepic`, `createdby`, `joineddate`, `joinedtime`, `usertype`, `walletamount`, `otp`) VALUES ('$phone', '$email', '$name', 'NOT ALOTED', '98', '$fpassword', 'cc', 'sdds', '$userid', 'verified', '$profilepic', NULL, '', '', 'OPERATER', '0','');";
        $res = mysqli_query($conn, $sql);

        if($res){
          ?>
          <script>
            $(function() {
              Swal.fire(
                  'Success',
                  'Register Successfully! You can Login',
                  'success'
              )
            });
            window.setTimeout(function() {
              window.location.href = "index.php";
            }, 1500);
          </script>
          <?php
        } else {
          ?>
          <script>
            $(function(){
              Swal.fire(
                'Oops!',
                'Internet Server Error, Please Try Again Later!',
                'error'
              )
            });
          </script>
          <?php
        }

      } else {
        ?>
        <script>
          $(function() {
            Swal.fire(
              'Oops!',
              'Your email or phone already exists!',
              'error'
            )
          });
          window.setTimeout(function() {
            window.location.href = "reg.php";
          }, 1500);
        </script>
        <?php
      }

    } else {
      ?>
      <script>
        $(function() {
          Swal.fire(
            'Oops!',
            'Please fill all data',
            'error'
          )
        });
      </script>
      <?php
    }

  } else {
    ?>
    <script>
      $(function() {
        Swal.fire(
          'WOW trying to Cheat!!!',
          'You Are A Cheater GET OUT!',
          'error'
        )
      });
    </script>
    <?php
  }
}
?>
        
        
        <div class="form-box register">
            <form action="" method="POST">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="hidden" name="reg" value="ahkweb">
                    <input type="text" id="name" name="name" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="text" id="phone" name="phone" placeholder="Phone number" required>
                    <i class='bx bxs-phone'></i>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Email" required>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" name="submit" class="btn">Register</button>
                <p>Or Register with social platforms</p>
                <div class="social-icons">
                    <a href="#"><i class='bx bxl-google' ></i></a>
                    <a href="#"><i class='bx bxl-facebook' ></i></a>
                    <a href="#"><i class='bx bxl-github' ></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome!</h1>
                <P>Don't have an account?</P>
                <button class="btn register-btn">Register</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back !</h1>
                <P>Already have an account?</P>
                <button class="btn login-btn">Login</button>
            </div>
        </div>
    </div>
    

    <script>
const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
});
    </script>
</body>

</html>
<script>
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
      alert('THIS CODE DESIGN BY THEME SEVA RIGHT CLICK IS DISABLE');
    });
  </script>
<script>
  function checkDevTools() {
    // Check if DevTools is open
    if (window.outerWidth - window.innerWidth > 160 || window.outerHeight - window.innerHeight > 160) {
      // Log out the user or take any action you want
    //   alert('You are not allowed to use inspect mode.');
      
      // Redirect to the logout page or any other page
      window.location.href = 'chutiya.php';
    }
  }

  // Check every second (you may adjust the interval as needed)
  setInterval(checkDevTools, 1000);
</script>
	
	</script>
	<script>
document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
  
}
</script>
</html>