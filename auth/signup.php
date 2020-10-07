<?php
require '../vendor/autoload.php';

use AWSCognitoApp\AWSCognitoWrapper;

$wrapper = new AWSCognitoWrapper();
$wrapper->initialize();
$error = '';

if(isset($_POST['action'])) {

    $username = htmlspecialchars(strip_tags($_POST['username']));
    $password = htmlspecialchars(strip_tags($_POST['password']));

    if($_POST['action'] === 'register') {
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $error = $wrapper->signup($username, $email, $password);

        if(empty($error)) {
            header('Location: confirm.php?username=' . $username);
            exit;
        }
    }
}

?>

<?php require_once './partials/auth.header.inc.php'; ?>
        
        <div class="alpha-app">
            <div class="container">
                <div class="login-container">
                    <div class="row justify-content-center row align-items-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="card login-box">
                                <div class="card-body">
                                    <div id="errorAlert" style="color: #fff;width:100%;display: none;position: absolute;top: 0;left: 0%;text-align: center;" class="alert alert-danger errorAlert" role="alert">
                                        Incorrect password!! try again.
                                    </div>
                                    <p style='color: red;'><?php echo $error;?></p>
                                    <h5 class="card-title">Sign Up</h5>
                                    <form method="POST" id="signup_form" >
                                        <!-- <script>
                                            
                                        </script> -->
                                        <div class="form-group">
                                            <label for="username">username</label>
                                            <input type="username" class="form-control" name="username" id="username" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">email</label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"  required>
                                        </div>

                                        <input type='hidden' name='action' value='register' />

                                        <div class="form-group">
                                           	<button type="submit" class="btn btn-primary float-right" id="submit" value="submit">Sign Up</button>
                                            <button id="loader" style="display: none;cursor: not-allowed;" class="btn btn-primary float-right" type="button" disabled>
                                                <span class="spinner-border spinner-border-sm" role="status"></span>
                                                Loading...
                                            </button>
                                            <a class="btn btn-text-secondary float-right m-r-sm" href="login.php"><b>Login</b></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php require_once './partials/auth.footer.inc.php'; ?>