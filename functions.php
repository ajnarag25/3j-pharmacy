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

// ADD INVENTORY
if (isset($_POST['add_inventory'])) {
    $pid = $_POST['ProductID'];
    $itemnum = $_POST['ItemNumber'];
    $itemname = $_POST['ItemName'];
    $discount = $_POST['Discount'];
    $mg = $_POST['MG'];
    $stock = $_POST['Stock'];
    $up = $_POST['UnitPrice'];
    $stat = $_POST['Status'];
    $desc = $_POST['Description'];

    $fileName = $_FILES['UploadImage']['name'];

    $uploadPath = 'uploads/' . $fileName;

    if (!move_uploaded_file($_FILES['UploadImage']['tmp_name'], $uploadPath)) {
        $_SESSION['status'] = 'Error uploading image';
        $_SESSION['status_icon'] = 'warning';
        header('location: inventory.php');
        exit;
    }

    $newInventory = [
        'ProductID' => $pid,
        'ItemNumber' => $itemnum,
        'ItemName' => $itemname,
        'Discount' => $discount,
        'MG' => $mg,
        'Stock' => $stock,
        'UnitPrice' => $up,
        'Status' => $stat,
        'Description' => $desc,
        'ImageName' => $fileName
    ];

    $addinventoryReference = $database->getReference('inventory')->push($newInventory);

    if ($addinventoryReference->getKey()) {
        $_SESSION['status'] = 'Successfully Added the Product';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Adding a Product';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location: inventory.php');
}


// EDIT INVENTORY
if (isset($_POST['edit_inventory'])) {
    $key = $_POST['pk_inventory'];
    $pid = $_POST['ProductID'];
    $itemnum = $_POST['ItemNumber'];
    $itemname = $_POST['ItemName'];
    $discount = $_POST['Discount'];
    $mg = $_POST['MG'];
    $stock = $_POST['Stock'];
    $up = $_POST['UnitPrice'];
    $stat = $_POST['Status'];
    $desc = $_POST['Description'];

    // Check if a new image is uploaded
    $newFileName = $_FILES['UploadImage']['name'];
    if (!empty($newFileName)) {
        $uploadPath = 'uploads/' . $newFileName;
        if (!move_uploaded_file($_FILES['UploadImage']['tmp_name'], $uploadPath)) {
            $_SESSION['status'] = 'Error uploading image';
            $_SESSION['status_icon'] = 'warning';
            header('location: inventory.php');
            exit;
        }
        $imageName = $newFileName;
    } else {
        // Keep the existing image name
        $imageName = $_POST['ImageName'];
    }

    // Check if any changes were made before updating
    $currentInventory = $database->getReference('inventory/' . $key)->getValue();
    if (
        $currentInventory['ProductID'] === $pid &&
        $currentInventory['ItemNumber'] === $itemnum &&
        $currentInventory['ItemName'] === $itemname &&
        $currentInventory['Discount'] === $discount &&
        $currentInventory['MG'] === $mg &&
        $currentInventory['Stock'] === $stock &&
        $currentInventory['UnitPrice'] === $up &&
        $currentInventory['Status'] === $stat &&
        $currentInventory['Description'] === $desc &&
        $currentInventory['ImageName'] === $imageName
    ) {
        $_SESSION['status'] = 'No changes made';
        $_SESSION['status_icon'] = 'info';
        header('location: inventory.php');
        exit;
    }

    $updatedInventory = [
        'ProductID' => $pid,
        'ItemNumber' => $itemnum,
        'ItemName' => $itemname,
        'Discount' => $discount,
        'MG' => $mg,
        'Stock' => $stock,
        'UnitPrice' => $up,
        'Status' => $stat,
        'Description' => $desc,
        'ImageName' => $imageName
    ];

    // Update the inventory data in the database
    $updateResult = $database->getReference('inventory/' . $key)->update($updatedInventory);

    if ($updateResult) {
        $_SESSION['status'] = 'Successfully Updated the Product';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Updating the Product';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location: inventory.php');
}


// DELETE ACCOUNT USER'S
if (isset($_POST['del_inventory'])) {
    $key = $_POST['del_pk'];

    $deleteResult = $database->getReference("inventory/$key")->remove();

    if ($deleteResult) {
        $_SESSION['status'] = 'Successfully Deleted the Product';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Deleting the Product';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location:inventory.php');
}


// ADD ORDERS TEST
// if (isset($_POST['add_orders'])) {

//     $d1 = "Aug 12, 2023";
//     $d2 = 1234;
//     $d3 = 123;
//     $d4 = "Sample Item";
//     $d5 = 12;
//     $d6 = 120;

//     $d7 = "Juan Miguel Marquez";
//     $d8 = "Blk 4 lot 12 San Miguel St. Laguna";
//     $d9 = "091234567";
//     $d10 = "Pending";
//     $d11 = "Sample Presc";

//     $d12 = "G-Cash";
//     $d13 = "400";
//     $d14 = 3;

//     $d15 = "mod delivery";
//     $d16 = "total price";
        
//     $newOrders = [
//         'DateOrder' => $d1,
//         'ProductID' => $d2,
//         'ItemNumber' => $d3,
//         'ItemName' => $d4,
//         'Discount' => $d5,
//         'UnitPrice' => $d6,
//         'FullName' => $d7,
//         'ShipAddress' => $d8,
//         'Contact' => $d9,
//         'Status' => $d10,
//         'Prescription' => $d11,
//         'ModPay' => $d12,
//         'Amount' => $d13,
//         'Quantity' => $d14,
//         'ModDel' => $d15,
//         'TotalPay' => $d16,
//     ];

//     $addorderReference = $database->getReference('orders')->push($newOrders);

//     echo"successfully added orders";
// }



?>