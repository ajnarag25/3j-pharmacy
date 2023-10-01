<?php 
include('db_conn.php');
session_start();
// error_reporting();

// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    try {
        $user = $auth->getUserByEmail($email);
    
        if ($user !== null) {
            try {
                $signInResult = $auth->signInWithEmailAndPassword($email, $pass);
                $idTokenString = $signInResult->idToken();
                $verifiedIdToken = $auth->verifyIdToken($idTokenString);
                $uid = $verifiedIdToken->claims()->get('sub');
    
                // Store user ID and token in session
                $_SESSION['verified_user_id'] = $uid;
                $_SESSION['idTokenString'] = $idTokenString;
    
                // Redirect to the dashboard
                header('Location: dashboard.php');
                exit();
            } catch (Kreait\Firebase\Exception\Auth\InvalidToken | \InvalidArgumentException $e) {
                handleAuthenticationError('Invalid Credentials');
            } catch (Exception $e) {
                handleAuthenticationError('Wrong Password');
            }
        } else {
            handleAuthenticationError('User does not exist');
        }
    } catch (Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        handleAuthenticationError('Invalid Credentials');
    } catch (Kreait\Firebase\Exception\InvalidArgumentException $e) {
        handleAuthenticationError('Invalid Email Address');
    }
    
}

// Function to handle authentication errors and redirect
function handleAuthenticationError($errorMessage) {
    $_SESSION['status'] = $errorMessage;
    header('Location: index.php');
    exit();
}

// ADDING ACCOUNT USER'S
if (isset($_POST['add_user'])) {
    
    $uid = $_POST['uid'];
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];   
    $city = $_POST['city'];

    // Check if the email already exists in the database
    $ref_table = "users";
    $existingUsers = $database->getReference($ref_table)->orderByChild('email')->equalTo($email)->getSnapshot()->numChildren();

    if ($existingUsers > 0) {
        $_SESSION['status'] = 'Email Account Already Exists';
        $_SESSION['status_icon'] = 'warning';
    } else {
        // Prepare data to add
        $postData = [
            'uid' => $uid,
            'fullname' => $fullname,
            'email' => $email,
            'contact' => $contact,
            'city' => $city
        ];

        // Add the user data to the database
        $postRef_result = $database->getReference($ref_table)->push($postData);

        if ($postRef_result) {
            $_SESSION['status'] = 'Successfully Created the Account';
            $_SESSION['status_icon'] = 'success';
        } else {
            $_SESSION['status'] = 'Failed to Create the Account';
            $_SESSION['status_icon'] = 'error';
        }
    }

    header('location: users.php');
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

    // Check if the item already exists based on ProductID or ItemNumber
    $inventoryRef = $database->getReference('inventory');
    $query = $inventoryRef->orderByChild('ProductID')->equalTo($pid)->getSnapshot();
    
    if ($query->hasChildren()) {
        $_SESSION['status'] = 'Inventory item already exists with this ProductID';
        $_SESSION['status_icon'] = 'warning';
        header('location: inventory.php');
        exit;
    }

    $query = $inventoryRef->orderByChild('ItemNumber')->equalTo($itemnum)->getSnapshot();

    if ($query->hasChildren()) {
        $_SESSION['status'] = 'Inventory item already exists with this ItemNumber';
        $_SESSION['status_icon'] = 'warning';
        header('location: inventory.php');
        exit;
    }

    // If item doesn't exist, add it
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

// GENERATE REPORT
if (isset($_POST['generate_report'])) {
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];

    $salesRef = $database->getReference('orders');

    if ($startDate === $endDate) {
        // If start and end dates are equal, query for that specific date
        $query = $salesRef->orderByChild('DateOrder')->equalTo($startDate);
    } else {
        // Query for the date range
        $query = $salesRef->orderByChild('DateOrder')
            ->startAt($startDate)
            ->endAt($endDate);
    }

    $salesSnapshot = $query->getSnapshot();

    $tableRows = '';

    foreach ($salesSnapshot->getValue() as $order) {
        $customerName = $order['FullName'];
        $dateOrdered = $order['DateOrder'];
        $dateDelivered = $order['DateDelivered'];
        $product = $order['ItemName'];
        $amount = $order['Amount'];

        $tableRows .= "<tr><td>$customerName</td><td>$dateOrdered</td><td>$dateDelivered</td><td>$product</td><td>$amount</td></tr>";
    }

    // Output table rows or "No available data"
    if ($tableRows !== '') {
        $_SESSION['sales_report'] = $tableRows; // Store the report in the session
        echo $tableRows;
    } else {
        $customerName = "No Data Available in Table";
        $dateOrdered = "";
        $dateDelivered = "";
        $product = "";
        $amount = "";
        $message = "<tr><td>$customerName</td><td>$dateOrdered</td><td>$dateDelivered</td><td>$product</td><td>$amount</td></tr>";
        $_SESSION['sales_report'] = $message;
    }

    header('location: sales.php');
}

// UPDATING STATUS ORDERS
if (isset($_POST['approve_order'])) {
    $pk = $_POST['approve_pk'];
    $stat = "Approved";

    $status = [
        'Status' => $stat,
    ];

    $orderRef = $database->getReference('orders/' . $pk);
    $updateResult = $orderRef->update($status);

    if ($updateResult) {
        $_SESSION['status'] = 'Successfully Approved the Order';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Approving the Order';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location: ongoing.php');
}

if (isset($_POST['decline_order'])) {
    $pk = $_POST['decl_pk'];
    $stat = "Declined";

    $status = [
        'Status' => $stat,
    ];

    $orderRef = $database->getReference('orders/' . $pk);
    $updateResult = $orderRef->update($status);

    if ($updateResult) {
        $_SESSION['status'] = 'Successfully Declined the Order';
        $_SESSION['status_icon'] = 'success';
    } else {
        $_SESSION['status'] = 'Error Declining the Order';
        $_SESSION['status_icon'] = 'warning';
    }

    header('location: ongoing.php');
}


// ADDING ACCOUNT ADMIN
if (isset($_POST['add_admin'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['a_password'];
    $pass2 = $_POST['a_repassword'];

    if ($pass1 != $pass2) {
        $_SESSION['status'] = 'Password does not match';
        $_SESSION['status_icon'] = 'warning';
    } else {
        try {
            $postData = [
                'email' => $email,
                'password' => $pass1,
                'displayName' => $name,
            ];

            $createAdmin = $auth->createUser($postData);

            $_SESSION['status'] = 'Successfully Created the Account';
            $_SESSION['status_icon'] = 'success';
        } catch (Kreait\Firebase\Exception\Auth\EmailExists $e) {
            $_SESSION['status'] = 'Email Account Already Exists';
            $_SESSION['status_icon'] = 'warning';
        } catch (Kreait\Firebase\Exception\InvalidArgumentException $e) {
            $_SESSION['status'] = 'Invalid Data';
            $_SESSION['status_icon'] = 'error';
        }
    }

    header('Location: users.php');
    exit();
}

// EDIT ADMIN
if (isset($_POST['edit_admin'])) {
    $uid = $_POST['user_id'];

    $newEmail = $_POST['email'];
    $newName = $_POST['name'];

    try {
        $user = $auth->getUser($uid);
        $updateData = [];
        if ($newEmail !== $user->email) {
            $updateData['email'] = $newEmail;
        }
        if ($newName !== $user->displayName) {
            $updateData['displayName'] = $newName;
        }
        if (!empty($updateData)) {
            $updatedUser = $auth->updateUser($uid, $updateData);
            $_SESSION['status'] = 'Successfully Updated the Account';
            $_SESSION['status_icon'] = 'success';
        } else {
            $_SESSION['status'] = 'No changes to update';
            $_SESSION['status_icon'] = 'info';
        }
    } catch (Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = 'User not found';
        $_SESSION['status_icon'] = 'warning';
    } catch (Kreait\Firebase\Exception\InvalidArgumentException $e) {
        $_SESSION['status'] = 'Invalid Data';
        $_SESSION['status_icon'] = 'error';
    }

    header('Location: users.php');
    exit();
}

// DELETE ADMIN
if (isset($_POST['del_admin'])) {
    $uid = $_POST['user_id'];

    try {
        $auth->deleteUser($uid);

        $_SESSION['status'] = 'Successfully Deleted the Account';
        $_SESSION['status_icon'] = 'success';
    } catch (Kreait\Firebase\Exception\Auth\UserNotFound $e) {
        $_SESSION['status'] = 'User not found';
        $_SESSION['status_icon'] = 'warning';
    } catch (Kreait\Firebase\Exception\InvalidArgumentException $e) {
        $_SESSION['status'] = 'Invalid Data';
        $_SESSION['status_icon'] = 'error';
    }

    header('Location: users.php');
    exit();
}



// ADD ORDERS TEST
// if (isset($_POST['add_orders'])) {

//     $d1 = "2023-08-28";
//     $d2 = 1234;
//     $d3 = 123;
//     $d4 = "Sample Item 2";
//     $d5 = 12;
//     $d6 = 120;

//     $d7 = "Julianna Marquez";
//     $d8 = "Imus Cavite";
//     $d9 = "091234567";
//     $d10 = "Pending";
//     $d11 = "Sample Presc";

//     $d12 = "G-Cash";
//     $d13 = "400";
//     $d14 = 3;

//     $d15 = "mod delivery";
//     $d16 = "total price";
//     $d17 = "2023-08-28";
        
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
//         'DateDelivered' => $d17,
//     ];

//     $addorderReference = $database->getReference('orders')->push($newOrders);

//     echo"successfully added orders";
// }

?>