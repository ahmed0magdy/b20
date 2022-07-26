<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;

$title = "Verify Your Account";
include "layouts/header.php";
include "App/Http/Middlewares/EmailChecker.php";
$validation = new Validation;
// page validation
$validation->setValueName('page')->setValue($_GET['page'] ?? null)->required()->in(['login','register','forget']);
if($validation->getErrors()){
     header("location:layouts/errors/404.php");die;
}
// submit form
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    // $_POST
    // validation
    $validation->setValueName('verification code')->setValue($_POST['verification_code'])->
    required()->regex( $_GET['page'] == 'forget' ? '/^[0-9]{5}$/' : '/^[0-9]{6}$/')->exists('users','verification_code');
    if (empty($validation->getErrors())) {
       $user = new User;
       $user->setEmail($_SESSION['verification_email'])->setVerification_code($_POST['verification_code']);
       $result = $user->checkCode();
       if($result->num_rows == 1){
            $user->setEmail_verified_at(date('Y-m-d H:i:s'));
            if($user->emailVerification()){
                if($_GET['page'] == 'register' || $_GET['page'] == 'login'){
                    $success = "<div class='alert alert-success text-center'> Correct code you will be redirected to home page shortly .. </div>";
                    $_SESSION['user'] = $result->fetch_object();
                    unset($_SESSION['verification_email']);
                    header('refresh:5;url=index.php');
                }elseif($_GET['page'] == 'forget'){
                    $success = "<div class='alert alert-success text-center'> Correct code you will be redirected to change your password .. </div>";
                    header('refresh:5;url=set-new-password.php');
                }
                
            }else{
                $error = "<div class='alert alert-danger text-center'> Something Went Wrong </div>";
            }
       }else{
            $error = "<div class='alert alert-danger text-center'> Wrong Verification Code </div>";
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
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> Verification Code </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane  active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?= $error ?? "" ?>
                                    <?= $success ?? "" ?>
                                    <form method="post">
                                        <input type="number" value="<?= $_POST['verification_code'] ?? "" ?>" name="verification_code" placeholder="Verification Code">
                                        <?= $validation->getMessage('verification code') ?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Check</span></button>
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

</html>
<?php
include "layouts/scripts.php";
?>