<?php
require_once 'core/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');



// <!-- NOTE: -->
// <!-- For development of IsAdmin column in tblemployeesinfo -->
// <!-- only Admins should be able to register new users.  -->