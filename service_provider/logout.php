<?php
session_start();
unset ($_SESSION['SERVICE_PROVIDER_LOGIN']);
unset ($_SESSION['login_email']);
header ('location:..service_provider.php');
die();