<?php
session_start();

unset($_SESSION['user']);

header('Location:a20190304_11_login.php');