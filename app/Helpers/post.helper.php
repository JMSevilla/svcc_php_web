<?php

include_once "../Controllers/PostController.php";

if(isset($_POST['trigger']) == true) {
    //class ng controller ./.
    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname']
    ];
    $callback = new PostController();
    $callback->postData($data);
}