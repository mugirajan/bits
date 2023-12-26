<?php

require_once("./mailTrigger.php");

$sm = new sndMail();

if (isset($_POST)) {
    
    $res = array("success" => false, "message" => "");

    $res = $sm->contactEnquiry($_POST);
    
    echo json_encode($res);
}



?>