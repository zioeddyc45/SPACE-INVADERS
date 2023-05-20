<?php

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['points'])) {
    $errors['points'] = 'Bruh';
}
if (!empty($errors)) {

    

    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    
    $points = $_POST['points'];
    $user = $_POST['name'];
    $q = array("points"=>$points,"name"=>$user);
   

    $dbconn = pg_connect("host=localhost port=5432 dbname=Space  user=edvige password=edvige") or die(' Could not connect: ' . pg_lasterror());
    $res = pg_insert($dbconn,"records", $q);
    if($res){
        $data['query'] = 'Done';
    }
    else{
        $data['query'] = 'Q error';
    }
    pg_close($dbconn);

    $data['success'] = true;
    $data['message'] = 'Success!';
}
