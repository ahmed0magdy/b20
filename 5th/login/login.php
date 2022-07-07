<?php

$users = [
    [
        'id' => 1,
        'name' => 'esraa',
        'email' => 'esraa@gmail.com',
        'password' => 123456,
        'gender' => 'f',
        'image' => '1.jpg'
    ],
    [
        'id' => 2,
        'name' => 'fatma',
        'email' => 'fatma@gmail.com',
        'password' => 123456,
        'gender' => 'f',
        'image' => '2.jpg'
    ],
    [
        'id' => 2,
        'name' => 'ahmed',
        'email' => 'ahmed@gmail.com',
        'password' => 123456,
        'gender' => 'm',
        'image' => '3.jpg'
    ]
];

$title = "login";
include_once "layouts/header.php";
include_once "App/Http/Middlewares/Guest.php";
include_once "layouts/navbar.php";
if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST)){
    $errors = [];
    if(empty($_POST['email'])){
        $errors['email'] = "<p class='text-danger font-weight-bold'>* Email Is Required</p>";
    }
    if(empty($_POST['password'])){
        $errors['password'] = "<p class='text-danger font-weight-bold'>* Password Is Required</p>";
    }
    // no validation errors
    if(empty($errors)){
        foreach($users AS $user){
            if($user['email'] == $_POST['email'] && $user['password'] == $_POST['password']){
                $_SESSION['user'] = $user;
                header('location:index.php');
                die;
            }
        }
        $errors['email-password'] = "<p class='text-danger font-weight-bold'>* Wrong Email Or Password</p>";
    }
}
?> 
<div class="container">
    <div class="row">
        <div class="col-12 text-center h1 text-dark mt-5">
            Login Now!
        </div>
        <div class="col-4 offset-4 mt-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Eamil</label>
                    <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? "" ?>" class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['email'] ?? "" ?>
                    <?= $errors['email-password'] ?? "" ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                    <?= $errors['password'] ?? "" ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark"> Login </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
include_once "layouts/footer.php";
include_once "layouts/scripts.php";
?>
   