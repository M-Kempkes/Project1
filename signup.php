<?php
    require_once('Database.php');
    $DB = new Database;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['password'] === $_POST['confirmpass']){
            $accountSQL = 'INSERT INTO account (id, email, password) VALUES (:id,:email,:password);';
            $accountValues = ['id' => NULL, 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)];
            $AccountId = $DB->execute($accountSQL, $accountValues);
            $personSQL = 'INSERT INTO persoon (id, voornaam, achternaam, username, accountid) VALUES (:id,:voornaam,:achternaam,:username,:accountid);';
            $personValues = ['id' => NULL, 'voornaam' => $_POST['firstname'], 'achternaam' => $_POST['lastname'], 'username' => $_POST['username'], 'accountid' => $AccountId];
            $DB->execute($personSQL, $personValues);
            header('Location: http://localhost/programming/project1/');
        }
        else{
            echo('passwords do not match');
        }
    }
?>
<html>
<body>
<form action="" method="POST">

    Voornaam: <input required type="text" name="firstname"><br>
    Achternaam: <input required type="text" name="lastname"><br>
    E-mail: <input required type="email" name="email"><br>
    Username: <input required type="text" name="username"><br>
    Password: <input required type="password" name="password"><br>
    Confirm password: <input required type="password" name="confirmpass"><br> 
    <button type="submit">Create user</button>

</form>
</body>
</hmtl>