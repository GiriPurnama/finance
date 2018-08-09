
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <?PHP 
        include 'include/library-header.php';
    ?>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Login Admin Harda</title>
</head>
<body>
    <section class="login"> 
        <!--
        you can substitue the span of reauth email for a input with the email and
        include the remember me checkbox
        -->
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="images/hera_pt_black.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" method="POST" action="proses-login.php">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
    <!--                 <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <input type="submit" value="Login" name="login" class="btn btn-lg btn-primary btn-block btn-signin">
                </form><!-- /form -->
                <!-- <a href="#" class="forgot-password">
                    Forgot the password?
                </a> -->
            </div><!-- /card-container -->
        </div><!-- /container -->
    </section>
</body>
</html>



