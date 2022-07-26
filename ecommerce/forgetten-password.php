<?php

use App\Database\Models\User;
use App\Http\Requests\Validation;
use App\Mails\ForgetPasswordMail;

$title = "Forgetten Password";
include "layouts/header.php";
// submit form
$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    // $_POST
    // validation
    $validation->setValueName('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/');
    if (empty($validation->getErrors())) {
        $user = new User;
        $result = $user->setEmail($_POST['email'])->getUserByEmail();
        if ($result->num_rows == 1) {
            $forgetPasswordCode = rand(10000, 99999);
            $user->setVerification_code($forgetPasswordCode);
            if ($user->updateCode()) {
                // send code
                $subject = "Password Reset";
                $body = "<p> Dear {$_POST['email']}</p>
                            <p>Your Forget Password Code:<b style='color:blue'>{$forgetPasswordCode}</b></p>
                            <p>Thank You</p>";
                $forgetPasswordCodeMail = new ForgetPasswordMail($_POST['email'], $subject, $body,"Ecommrece Team");
                if ($forgetPasswordCodeMail->send()) {
                    $_SESSION['verification_email'] = $_POST['email'];
                    header('location:verification-code.php?page=forget');
                    die;
                } else {
                    $error = "<p class='text-danger font-weight-bold'> Try Again Later </p>";
                }
            } else {
                $error = "<p class='text-danger font-weight-bold'> Something Went Wrong </p>";
            }
        } else {
            $error = "<p class='text-danger font-weight-bold'> This email dosen't match our records </p>";
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
                            <h4> Find Your Account </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane  active">
                            <div class="login-form-container">
                                <div class="login-register-form">

                                    <?= $success ?? "" ?>
                                    <form method="post">
                                        <input type="email" value="<?= $_POST['email'] ?? "" ?>" name="email" placeholder="Email Address">
                                        <?= $validation->getMessage('email') ?>
                                        <?= $error ?? "" ?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Find</span></button>
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