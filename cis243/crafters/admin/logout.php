<?php
session_start();
session_destroy();
Header("Location: ../login-crafters-home.php");
?>