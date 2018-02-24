<?php
include_once '../api/config/core.php';
$session = Session::getInstance();
require_once('interface/mainHeader.html');
echo $session->loggedOn."<br />";
echo $session->username."<br />";
require_once('interface/footer.php');
?>