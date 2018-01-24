<?php

    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';

    if (isset($_COOKIE['idyl_tkn']) || isset($_SESSION['idyl_tkn'])) {
        header('location: /');
    }
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';


?>

<div class="container-fluid login-page home">
    <div class="row">
        <div class="col-12">
            <div class="login-signup-form-div">
                <h3 class="text-center">Sign In</h3>
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="new-customer-tab" data-toggle="pill" href="#pills-newcus" role="tab" aria-controls="pills-newcus" aria-selected="false">Sign up</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="login-tab">

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
                               <input type="submit" class="btn btn-primary btn-block btn-large" value="Log In" v-on:click.prevent="login">
                            </form>

                            <div class="loginextra d-flex flex-wrap flex-row">
                                <div class="p-2">
                                    <a href="#">Forgot password</a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-newcus" role="tabpanel" aria-labelledby="new-customer-tab">
                        <form id="newUser">
                            <div class="form-group">
                                <label for="checkEmail1">Email address</label>
                                <input type="email" class="form-control" id="checkEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="error-message-email" class="form-text text-danger text-center"></small>
                                <small id="emailHelp1" class="form-text text-muted text-center">We'll never share your email with anyone else.</small>
                            </div>
                           <input type="submit" class="btn btn-primary btn-block btn-large" value="Continue" v-on:click.prevent="checkIfExists">
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
