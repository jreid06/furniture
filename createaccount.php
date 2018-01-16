<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<div class="container-fluid create-account-page home">
    <div class="row">
        <div class="col-12">
            <div class="create-account">
                <form id="createAccount">
                    <div class="form-group">
                        <label for="inputTitleSelect">Title</label>
                        <select class="inputTitleSelect" name="user-title" required>
                            <option value="default">Please select option</option>
                            <option value="M-MR">Mr.</option>
                            <option value="F-MISS">Miss.</option>
                            <option value="F-MRS">Mrs.</option>
                            <option value="F-MS">Ms.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">First name</label>
                        <input type="text" class="form-control" id="inputFnameCreate" required>
                    </div>
                    <div class="form-group">
                        <label for="">Last name</label>
                        <input type="text" class="form-control" id="inputLnameCreate" required>
                    </div>
                    <div class="form-group">
                        <label for="inputEmailCreate">Email address</label>
                        <input type="email" class="form-control" id="inputEmailCreate" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="inputreEmailCreate">Re-enter email address</label>
                        <input type="email" class="form-control" id="inputreEmailCreate" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="inputPasswordCreate">Password</label>
                        <input type="password" class="form-control" id="inputPasswordCreate" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="inputrePasswordCreate">Re-enter Password</label>
                        <input type="password" class="form-control" id="inputrePasswordCreate" placeholder="Password" required>
                    </div>

                    <input type="submit" class="btn btn-primary btn-block btn-large" value="Create account" v-on:click.prevent="createUser">

                </form>

            </div>
        </div>

    </div>
</div>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
