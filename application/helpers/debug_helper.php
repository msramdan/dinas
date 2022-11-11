<?php 


function pJson($data){
    header('Content-type: application/json');
    echo json_encode($data);
    die;
}





?>