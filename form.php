<?php

$errors = [];
$data = [];

if (empty($_POST['userName'])) {
    $errors['userName'] = 'Name is required.';
}

if (empty($_POST['gamePoints'])) {
    $errors['gamePoints'] = 'Bruh';
}
if (!empty($errors)) {

    

    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    
    $points = $_POST['gamePoints'];
    $user = $_POST['userName'];

    echo $user;

    $dbconn = pg_connect("host=localhost port=5432 dbname=Space  user=edvige password=edvige") or die(' Could not connect: ' . pg_lasterror());
    $query = 'INSERT INTO records (create_time,points,name) VALUES (current_timestamp, $points ,$user );';
    pg_send_query($dbconn, $query) or die(' Query failed: ' . pg_lasterror());
    pg_close($dbconn);

    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);
