<?php include('./header.php');

if (isset($_SESSION['useremail']) && isset($_SESSION['user_id'])) {
    header('Location:/puredelight/');
}
?>
<section class="hero-sec">
    <div class="container">
        <div class="hero-content login-hero" style="background-image:url(./assets/images/login-page-hero.jpg);">
            <div class="hero-inner-wrapper">
                <?php if (isset($_SESSION['useremail']) && isset($_SESSION['user_id'])) { ?>
                    <h5>Welcome</h5>
                    <h1>Admin / User Login</h1>
                    <p>Integer congue malesuada eros congue varius. Sed malesuada dolor eget velit pretium. Etiam porttitor finibus. Nam suscipit vel ligula at dharetra.</p>
                <?php } else { ?>
                    <h5>Welcome</h5>
                    <h3><?php echo isset($_GET['msg']) ? $_GET['msg'] : ""; ?></h3>
                    <h1>Admin / User Login</h1>
                    <p>Integer congue malesuada eros congue varius. Sed malesuada dolor eget velit pretium. Etiam porttitor finibus. Nam suscipit vel ligula at dharetra.</p>
                <?php   } ?>



            </div>
        </div>
    </div>
</section>

<section class="login-warpper">
    <div class="container">
        <div class="login-inner d-flex" style="background-image:url(./assets/images/ban2.png)">
            <div class="admin-login-form">
                <h2>Admin Login</h2>
                <form id="login_admin" method="POST">
                    <div>
                        <label for="email">Email Or Username</label>
                        <input type="text" name="admin_email" id="admin_email" placeholder="E.g.">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="admin_password" id="admin_password" placeholder="E.g.">
                    </div>
                    <div class="btn-wrap">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
            <div class="user-login-form">
                <div class="login_form signup-btn">
                    <h2>User Login</h2>
                    <form id="login_user" method="POST">
                        <div>
                            <label for="email">Email Or Username</label>
                            <input type="text" name="login_email" id="login_email" placeholder="E.g.">
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="login_password" id="login_password" placeholder="E.g.">
                        </div>
                        <div class="checkbox-wrapper">
                            <input type="checkbox" name="remember" id="">
                            <label for="password">Remember Me</label>
                        </div>
                        <div class="btn-wrap">
                            <input type="submit" value="Login">
                        </div>
                    </form>
                </div>
                <div class="signup_form login-btn">
                    <h2>Sign Up</h2>
                    <form method="POST" id="signup_user">
                        <div>
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" placeholder="E.g. Vijay Thapa">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="E.g.">
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" placeholder="E.g.">
                        </div>
                        <div class="btn-wrap">
                            <input type="submit" value="Sign Up">
                        </div>
                    </form>
                </div>
                <div class="signup-btn">
                    <h5>Don't have an account?<a href="javascript:;"> Sign Up</a></h5>
                </div>
                <div class="login-btn" style="display: none;">
                    <h5>Already Have an account?<a href="javascript:;"> Login</a></h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('footer.php') ?>