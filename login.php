<?php include('./header.php'); ?>
<style>
    label{
        color: white;
    }
</style>
<div>
    <div class="login_form">
        <h1>Login</h1>
        <form id="login_user" method="POST">
            <div>
                <label for="email">Email Or Username</label>
                <input type="text" name="email" id="email" placeholder="E.g.">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="E.g.">
            </div>
            <div class="btn">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>
    <div class="signup_form">
        <h1>Sign Up</h1>
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
            <div class="btn">
                <input type="submit" value="Sign Up">
            </div>
        </form>
    </div>
    <div>
        <h5>Don't have an account? <a href="javascript:;">Sign Up</a></h5>
    </div>
</div>
<?php include('./footer.php'); ?>