<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container-fluid login-page home">
    <div class="row">
        <div class="col-12">
            <div class="login">
                <form id="userLogin">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                   <div class="form-group">
                       <label for="exampleInputPassword1">Password</label>
                       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                   </div>
                   <div class="form-check rememberme-div">
                       <input type="checkbox" class="form-check-input" id="exampleCheck1">
                       <label class="form-check-label" for="exampleCheck1">Remember me</label>
                   </div>
                   <input type="submit" class="btn btn-primary btn-block btn-large" value="Log In" v-on:click="validateUser">
                </form>

                <div class="loginextra d-flex flex-wrap flex-row">
                    <div class="p-2">
                        <a href="/createaccount">Create Account</a>
                    </div>
                    <div class="p-2">
                        <a href="#">Forgot password</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
