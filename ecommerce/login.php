<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Login";
include "layouts/header.php";
include "App/Http/Middlewares/guest.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";
// submit 
// $_POST
$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    // $_POST
    // validation
    $validation->setValueName('email')->setValue($_POST['email'] ?? NULL)->
    required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/',' ');
    $validation->setValueName('password')->setValue($_POST['password'] ?? NULL)->required()->regex('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/',"Wrong Email Or Password. <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a>");
    if (empty($validation->getErrors())) {
        // check if data is correct
        $user = new User;
        $user->setEmail($_POST['email']);
        $result = $user->getUserByEmail();
        if($result->num_rows == 1){
            // correct email
            $userData = $result->fetch_object();
            if(password_verify($_POST['password'],$userData->password)){
                // check if email is verified
                if(! is_null($userData->email_verified_at)){
                    // save session
                    $_SESSION['user'] = $userData;
                    if(isset($_POST['remember_me'])){
                        setcookie('user',$_POST['email'],time() + (86400*365) ,'/');
                    }
                    header('location:index.php');die;
                    // header index
                }else{
                    $_SESSION['verification_email'] = $_POST['email'];
                    header('location:verification-code.php?page=login');die;
                }
            }else{
                $error = "<p class='text-danger font-weight-bold'> Wrong Email Or Password. <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a> </p>";
            }
        }else{
            $error = "<p class='text-danger font-weight-bold'> Wrong Email Or Password. <a class='text-primary font-weight-bold' href='register.php'> Create Account Here</a> </p>";
        }
        
    }

    
}


?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" value="<?= $_POST['email'] ?? "" ?>" name="email" placeholder="Email Address">
                                        <?= $validation->getMessage('email') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getMessage('password') ?>
                                        <?= $error ?? "" ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input name="remember_me" type="checkbox">
                                                <label>Remember me</label>
                                                <a href="forgetten-password.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
include "layouts/footer.php";
include "layouts/scripts.php";
?>
