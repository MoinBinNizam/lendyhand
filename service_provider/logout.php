<?php
session_start();
unset ($_SESSION['SERVICE_PROVIDER_LOGIN']);
unset ($_SESSION['SERVICE_PROVIDER_EMAIL']);
header ('location:../service_provider.php');
die();