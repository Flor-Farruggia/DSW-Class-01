<?php

var_dump($_POST);

$mailFinal = '';

$msg = '';

$errorMail = '';


if (isset($_POST['registro'])) {

    $errorFlag = false;

    function validacion($campo, $min, $max, $campoName) {
        $msg = '';
        $error = false;
        $campo2 = '';

        if (!isset($_POST[$campo])) {
            $msg = "No existe campo ".$campoName;
            $error = true;
        } else {
            $campo2 = trim($_POST[$campo]);
            if (empty($campo2)) {
                $msg = 'No puede estar vacío el campo '.$campoName;
                $error = true;
            } else {
                if (strlen($campo2) < $min || strlen($campo2) > $max) {
                    $msg = 'Por favor ingrese entre '.$min.' y '.$max.' caracteres';
                    $error = true;
                } else {
                }
            }
        }
        $resultado['msg'] =$msg;
        $resultado['error'] =$error;
        $resultado['campo2'] =$campo2;

        return $resultado;
    }


#VALIDACIONES MAIL ######################################################################
        $valMail = validacion('mail', 5, 120, 'e-mail');

        if ($valMail['error']) {
            $errorMail = $valMail['msg'];
        } else {
            if (!filter_var($valMail['campo2'], FILTER_VALIDATE_EMAIL)) {
                $errorMail = 'Formato no válido';
                $error = true;
            } else {
                //$mail = $valMail['campo2'];
                // Establecer la conexión a la base de datos
                $dsn = "mysql:host=localhost;dbname=pruebita;charset=utf8";
                $usuario = "root";
                $contrasena = "";
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $pdo = new PDO($dsn, $usuario, $contrasena, $opciones);

                $mail = $valMail['campo2'];

                // Ejecutar una consulta
                $consulta = "SELECT mail FROM usuarios WHERE".$valMail['campo2'];

                $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE mail = :mail");
                $stmt->bindParam(':mail', $mail);
                $stmt->execute();

                if ($stmt->rowCount() !== 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $errorMail = 'Mail ya existente';
                    $error = true;
                    exit();
                } 
//HAY UN ERROR PORQUE ESTÉ O NO EL MAIL SE INSERTA IGUAL EL DATO
                if ($error == false) {
                    $nombre = 'Roco';
                    $apellido = 'Rojas';

                    $cons = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, mail) VALUES (:nombre,
                    :apellido, :mail)");
                    // Vincular los parámetros
                    $cons->bindParam(':nombre', $nombre);
                    $cons->bindParam(':apellido', $apellido);
                    $cons->bindParam(':mail', $mail);

                    // Ejecutar la consulta
                    $cons->execute();
                    echo "Registro insertado con éxito.";
                    $mailFinal = $valMail['campo2'];
                }
            }
        }
        } else {
    }
//FINAL VALIDACIONES
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <main class="row flex flex-justify-center">
    <form class="col_4 reg_cont" method="POST">
            <div class="col_12">
                <h1>Registro</h1>
            </div>
            <div class="col_12 inputs">
                <input type="email" name="mail" placeholder="Ingrese su email" value="<?=$mailFinal?>" autofocus>
                <output class="col_12 msg_error"><?=$errorMail?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_reg">
                <button type="submit" name="registro">Registrarse</button>
            </div>
        </form>
    </main>
</body>
</html>