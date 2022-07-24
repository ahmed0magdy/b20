<?php

use App\Http\Requests\Validation;

$title = "Register";
include "layouts/header.php";
include "layouts/navbar.php";
include "layouts/breadcrumb.php";
// submit form
$validation = new Validation;
if ($_SERVER['REQUEST_METHOD'] == "POST" &&  $_POST) {
    // $_POST
    // validation
    $validation->setValueName('first name')->setValue($_POST['first_name'])->required()->string()->max(32);
    $validation->setValueName('last name')->setValue($_POST['last_name'])->required()->string()->max(32);
    $validation->setValueName('email')->setValue($_POST['email'])->required()->regex("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/");
    $validation->setValueName('phone')->setValue($_POST['phone'])->required()->regex("/^01[0125][0-9]{8}$/");
    $validation->setValueName('password')->setValue($_POST['password'])->required()->regex("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}$/","Minimum eight and maximum 32 characters, at least one uppercase letter, one lowercase letter, one number and one special character.")->confirmed($_POST['password_confirmation']);
    $validation->setValueName('password confirmation')->setValue($_POST['password_confirmation'])->required();
    $validation->setValueName('gender')->setValue($_POST['gender'])->required()->in(['m', 'f']);
    if (empty($validation->getErrors())) {
        // password hashing
        // insert user
        // generate verification code
        // send mail
        // header(verification-code.php);
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
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane  active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="text" value="<?= $_POST['first_name'] ?? "" ?>" name="first_name" placeholder="First Name">
                                        <?= $validation->getMessage('first name') ?>
                                        <input type="text" value="<?= $_POST['last_name'] ?? "" ?>" name="last_name" placeholder="Last Name">
                                        <?= $validation->getMessage('last name') ?>
                                        <input name="email" value="<?= $_POST['email'] ?? "" ?>" placeholder="Email" type="email">
                                        <?= $validation->getMessage('email') ?>
                                        <input name="phone" value="<?= $_POST['phone'] ?? "" ?>" placeholder="Phone" type="tel">
                                        <?= $validation->getMessage('phone') ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= $validation->getMessage('password') ?>
                                        <input type="password" name="password_confirmation" placeholder="Password Confirmation">
                                        <?= $validation->getMessage('password confirmation') ?>
                                        <select name="gender" class="form-control">
                                            <option <?= isset($_POST['gender']) && $_POST['gender'] == 'm' ? 'selected' : '' ?> value="m">Male</option>
                                            <option <?= isset($_POST['gender']) && $_POST['gender'] == 'f' ? 'selected' : '' ?> value="f">Female</option>
                                        </select>
                                        <?= $validation->getMessage('gender') ?>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
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

include "layouts/footer.php";
include "layouts/scripts.php";
?>