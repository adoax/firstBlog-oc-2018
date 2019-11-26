<?php
session_start();
unset($_SESSION['auth']);
unset($_SESSION['users']);
header('Location: index.php');