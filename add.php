<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Incarca fisierul XML
    $xml = simplexml_load_file('./xml/accounts.xml');

    // Preia datele din formular
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Gestioneaza incarcarea fisierului
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Verifica daca fisierul este o imagine reala sau nu
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Fisierul nu este o imagine.";
        $uploadOk = 0;
    }

    // Verifica dimensiunea fisierului
    if ($_FILES["image"]["size"] > 500000) {
        echo "Fisierul este prea mare.";
        $uploadOk = 0;
    }

    // Permite doar anumite formate de fisier
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sunt permise doar fisiere JPG, JPEG, PNG si GIF.";
        $uploadOk = 0;
    }

    // Verifica daca $uploadOk este setat la 0 din cauza unei erori
    if ($uploadOk == 0) {
        echo "Fisierul nu a fost incarcat.";
    // Incearca sa incarci fisierul
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Fisierul ". htmlspecialchars( basename( $_FILES["image"]["name"])). " a fost incarcat.";

            // Adauga un nou cont in fisierul XML
           $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $xml = simplexml_load_file('xml/accounts.xml');
    $lastAccountId = count($xml->account);
    $account = $xml->addChild('account');
    $account->addChild('image', $target_file);
    $account->addChild('id', $lastAccountId + 1);
    $account->addChild('username', $username);
    $account->addChild('email', $email);
    $account->addChild('password', $password);
    $account->addChild('edit', 'edit.php?id=' . ($lastAccountId + 1));
    $account->addChild('delete', 'delete.php?id=' . ($lastAccountId + 1));
    $account->addChild('confirm', "return confirm('Are you sure you want to delete this user?');");
    file_put_contents('xml/accounts.xml', $xml->asXML());

    echo 'User registered successfully.';
    header('Location: tables.php');
            exit();
        } else {
            echo "A aparut o eroare la incarcarea fisierului.";
        }
    }
} else {
    echo "Failed.";
}
?>
