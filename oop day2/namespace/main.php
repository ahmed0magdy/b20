<?php

include "classes/user/login.php";
include "classes/admin/login.php";
include "classes/seller/register.php";

use classes\user\login;
use classes\admin\login As AdminLogin;
use classes\seller\register;


$user = new login;
$user = new login;

$admin = new AdminLogin;
$admin = new AdminLogin;

$seller = new register;
$seller = new register;