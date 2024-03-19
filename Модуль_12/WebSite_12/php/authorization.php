<?php

$host='localhost';
$databse='tele3';
$user='root';
$password='';

$conn=mysqli_connect($host, $user, $password, $databse) or die("ошибка". mysqli_error($conn));

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$login = $_POST['Login'];
$password = $_POST['Password'];

$sql = "SELECT Kod_sotrudnik, Familia, Imia, Telefon, Pochta FROM sotrudnik WHERE Login = '$login' AND Password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['Kod_sotrudnik'] = $user['Kod_sotrudnik'];
    $_SESSION['Imia'] = $user['Imia'];
    print("<!DOCTYPE html>
    <html lang='en' translate='no'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap'
            rel='stylesheet'>
        <link rel='stylesheet' href='../css/reset.css'>
        <link rel='stylesheet' href='../css/style.css'>
        <title>Registration</title>
    </head>
    <body>
        <div class='wrapper'>
            <div class='container-authorization'>
                <section class='authorization'>
                <div class='authorization-img'>
                </div>
              <div class='authorization__content'>
                <div class='registracia__close'>
                    <a class='link link__registration' href='../home.html'>X</a>
                </div>
                    <h1>Авторизация успешна! Добро пожаловать,
                ");
                echo  $user['Imia'] . "!";
    print("  </h1>    </div>
            </section>
        </div>
        </div>
        </body>
        </html>");
} else {
    print("<!DOCTYPE html>
    <html lang='en' translate='no'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='preconnect' href='https://fonts.googleapis.com'>
        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap'
            rel='stylesheet'>
        <link rel='stylesheet' href='../css/reset.css'>
        <link rel='stylesheet' href='../css/style.css'>
        <title>Registration</title>
    </head>
    <body>
        <div class='wrapper'>
            <div class='container-authorization'>
                <section class='authorization'>
                <div class='authorization-img'>
                </div>
              <div class='authorization__content'>
                <div class='registracia__close'>
                    <a class='link link__registration' href='../index.html'>X</a>
                </div>
                    <h1>Неверный логин или пароль. Попробуйте снова</h1>
                    </div>
            </section>
        </div>
        </div>
        </body>
        </html>");
}

$conn->close();
?>

