<?php
$usuarioPrueba_user ='usuario@prueba.ts';
$usuarioPrueba_pass ='password';
$usuarioPrueba_passHash = password_hash($usuarioPrueba_pass, PASSWORD_DEFAULT);


/**
 *echo "usuario prueba:$usuarioPrueba_user".'<br>';
*echo 'constraseña prueba: '.$usuarioPrueba_pass.'<br>';
*echo 'contraseña hasheada: '.$usuarioPrueba_passHash.'<br>';

*echo"<pre>";
*var_dump('$_POST');
*echo"</pre>";
 */
$mail = '';
$password = '';

$error_mail = '';
$error_pass = '';

//validaciones
#Existe boton?
if (isset($_POST['ingreso'])) {

    $errorFlag = false;
    
    #VALIDACIONES MAIL
        #existe?
        if (!isset($_POST['mail'])) {
            $error_mail = "No existe mail";
            $errorFlag = true;
        } else {
            $mail = trim($_POST['mail']);
        }

        #está vacío?
        if (empty($error_mail)) {
            if (empty($mail)) {
                $error_mail = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }        
        }

        #Cantidad caracteres
        if (empty($error_mail)) {
            if (strlen($mail) < 5 || strlen($mail) > 120) {
                $error_mail = 'Por favor ingreso un mail entre 5 y 120 caracteres';
                $errorFlag = true;
            } else {
            }
        }

        #Formato válido
            if (empty($error_mail)) {
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $error_mail = 'Formato no válido';
                    $errorFlag = true;
                } else {
                   // echo 'Formato válido.<hr>';
            }
        }
    #FINAL validaciones mail

    #INICIO VALIDACIONES PASSWORD

        #Existe?
        if (!isset($_POST['password'])) {
            $error_pass = 'No existe contraseña';
            $errorFlag = true;
        } else {
            //echo 'Existe contraseña.<hr>';
            $password = trim($_POST['password']);
        }

        #Vacío?
        if (empty($error_pass)) {
            if (empty($password)) {
                $error_pass = 'No puede estar vacío';
                $errorFlag = true;
            } else {
                //echo 'Contraseña no vacío.<hr>';
            }
        }

        #Caracteres validos?
        if (empty($error_pass)){
            if (strlen($password) < 3 || strlen($password) > 10) {
                $error_pass = 'Por favor ingrese una contraseña entre 3 y 10 caracteres';
                $errorFlag = true;
            } else {
               // echo 'Contraseña con cant. caracteres válidos.<hr>';
            }
        }
    #FINAL validaciones password

    #VALIDACION BD
    if (empty($error_pass&&$error_mail)){
        if ($mail === $usuarioPrueba_user) {
            $verificar = password_verify($password, $usuarioPrueba_passHash);
            if ($verificar === false) {
                $error_pass = 'Contraseña incorrecta';
                $errorFlag = true;
            } else {
            }
        } else {
            $error_mail = 'Usuario incorrecto';
            $errorFlag = true;
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
                <input type="email" name="mail" placeholder="Ingrese su email" value="<?=$mail?>" autofocus>
                <output class="col_12 msg_error"><?=$error_mail?></output>
            </div>
            <div class="col_12 inputs">
                <input type="password" name="password" placeholder="Ingrese su contraseña" value="<?=$password?>">
                <output class="col_12 msg_error "><?=$error_pass?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_log">
                <button type="submit" name="ingreso">Ingresar</button>
            </div>
        </form>
    </main>
</body>
</html>