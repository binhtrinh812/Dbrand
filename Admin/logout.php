<?php
session_start();
ob_start();
unset($_SESSION['id_account']);
unset($_SESSION['role_account']);
unset($_SESSION['name_account']);
unset($_SESSION['email_account']);

setcookie("username", "", time()-3600);
setcookie("password", "", time()-3600);
header("location: ../Auth");