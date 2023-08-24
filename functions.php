<?php 
include('db_conn.php');
session_start();

// ADDING ACCOUNT USER'S
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

// EDIT ACCOUNT USER'S
if (isset($_POST['edit_user'])) {
    $key = $_POST['pk'];
    $uid = $_POST['uid'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];   
    $city = $_POST['city'];

    // Retrieve existing data from the database for the user
    $existingData = $database->getReference("users/$key")->getValue();

    // Check if any field values have changed
    $fieldsToUpdate = [];
    if ($uid !== $existingData['uid']) {
        $fieldsToUpdate['uid'] = $uid;
    }
    if ($fullname !== $existingData['fullname']) {
        $fieldsToUpdate['fullname'] = $fullname;
    }
    if ($email !== $existingData['email']) {
        $fieldsToUpdate['email'] = $email;
    }
    if ($contact !== $existingData['contact']) {
        $fieldsToUpdate['contact'] = $contact;
    }
    if ($city !== $existingData['city']) {
        $fieldsToUpdate['city'] = $city;
    }

    if (!empty($fieldsToUpdate)) {
        $updatequery_result = $database->getReference("users/$key")->update($fieldsToUpdate);

        if ($updatequery_result) {
            $_SESSION['status'] = 'Successfully Updated the Account';
            $_SESSION['status_icon'] = 'success';
        } else {
            $_SESSION['status'] = 'Error Updating the Account';
            $_SESSION['status_icon'] = 'warning';
        }
    } else {
        $_SESSION['status'] = 'No changes were made to the account';
        $_SESSION['status_icon'] = 'info';
    }

    header('location:users.php');
}

// DELETE ACCOUNT USER'S
if (isset($_POST['del_user'])) {
    $key = $_POST['del_pk'];

    $deleteResult = $database->getReference("users/$key")->remove();

    if ($deleteResult) {
        $_SESSION['status'] = 'Successfully Deleted the Account';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Deleting the Account';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location:users.php');
}


?>