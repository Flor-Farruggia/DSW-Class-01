<?php
echo"<pre>";
var_dump('$_POST');
echo"</pre>";

//validar

if (!isset($_POST['mail'])) {
    echo "No existe mail.<hr>";
} else {
    echo 'Existe mail.<hr>';
    $mail = $_POST['mail'];
    if (empty(trim($mail))) {
        echo 'No puede estar vacío.<hr>';
    } else {
        echo 'Mail no vacío.<hr>';
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            echo 'Formato no válido.<hr>';
        } else {
            echo 'Formato válido.<hr>';
        }
    }
} 
if (!isset($_POST['password'])) {
    echo "No existe contraseña.<hr>";
} else {
    echo 'Existe contraseña.<hr>';
    $password = $_POST['password'];
    if (empty(trim($password))) {
        echo 'No puede estar vacío.<hr>';
    } else {
        echo 'Mail no vacío.<hr>';
    }
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="row flex flex-justify-center">
        <form class="col_4 login_cont" method="POST">
            <div class="col_12">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="col_12 inputs">
                <input type="email" name="mail" placeholder="Ingrese su email">
            </div>
            <div class="col_12 inputs">
                <input type="password" name="password" placeholder="Ingrese su contraseña">
            </div>
            <div class="col_12 flex flex-justify-center button_log">
                <button>Iniciar</button>
            </div>
        </form>
    </main>
</body>
</html>