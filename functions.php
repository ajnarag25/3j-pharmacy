<?php 
include('db_conn.php');
session_start();
if (isset($_POST['add_user'])) {
    
    $uid = $_POST['uid'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];

    $postData = [
        'uid'=>$uid,
        'fullname'=>$fullname,
        'email'=>$email,
        'contact'=>$contact,
        'city'=>$city
    ];

    $ref_table = "users";
    $postRef_result = $database->getReference($ref_table)->push($postData);

    if($postRef_result){
        $_SESSION['status'] = 'Successfully Created the Account';
        $_SESSION['status_icon'] = 'success';
        header('location:users.php');
    }else{
        $_SESSION['status'] = 'Email Account Already Exists';
        $_SESSION['status_icon'] = 'warning';
        header('location:users.php');
    }

}

?>