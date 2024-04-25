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

//validar
if (isset($_POST['ingreso'])) {

    $errorFlag = false;
    #validaciones mail
        #existe?
        if (!isset($_POST['mail'])) {
            $error_mail = "No existe mail";
            $errorFlag = true;
        } else {
            echo 'Existe mail.<hr>';
            $mail = trim($_POST['mail']);
        }

        #está vacío?
        if (empty($error_mail)) {
            if (empty($mail)) {
                $error_mail = 'No puede estar vacío';
                $errorFlag = true;
            } else {
                echo 'Mail no vacío.<hr>';
            }        
        }

        #Cantidad caracteres
        if (empty($error_mail)) {
            if (strlen($mail) < 5 || strlen($mail) > 120) {
                $error_mail = 'Por favor ingreso un mail entre 5 y 120 caracteres';
                $errorFlag = true;
            } else {
                echo 'Cantidad de caracteres válidos.<hr>';
            }
        }

        #Formato válido
            if (empty($error_mail)) {
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $error_mail = 'Formato no válido';
                    $errorFlag = true;
                } else {
                    echo 'Formato válido.<hr>';
            }
        }
    #FINAL validaciones

    #Inicio validaciones password
        
        #Existe mail
        if (!isset($_POST['password'])) {
            $error_pass = 'No existe contraseña';
            $errorFlag = true;
        } else {
            echo 'Existe contraseña.<hr>';
        }

    #FINAL validaciones password
    

/*
    if (!isset($_POST['mail'])) {
        $error_mail = "No existe mail";
        $errorFlag = true;
    } else {
        echo 'Existe mail.<hr>';
        $mail = trim($_POST['mail']);
        if (empty($mail)) {
            $error_mail = 'No puede estar vacío';
            $errorFlag = true;
        } else {
            echo 'Mail no vacío.<hr>';
            if (strlen($mail) < 5 || strlen($mail) > 120) {
                $error_mail = 'Por favor ingreso un mail entre 5 y 120 caracteres';
                $errorFlag = true;
            } else {
                echo 'Es un correo válido.<hr>';
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $error_mail = 'Formato no válido';
                    $errorFlag = true;
                } else {
                    echo 'Formato válido.<hr>';
                    if ($mail !== $usuarioPrueba_user) {
                        $error_mail = 'Usuario inválido';
                        $errorFlag = true;
                    } else {
                        echo 'Usuario válido.<hr>';
                    }
                }
            }
        }
    } 
    if (!isset($_POST['password'])) {
        $error_pass = 'No existe contraseña';
        $errorFlag = true;
    } else {
        echo 'Existe contraseña.<hr>';
        $password = trim($_POST['password']);
        if (empty($password)) {
            $error_pass = 'No puede estar vacío';
            $errorFlag = true;
        } else {
            echo 'Contraseña no vacío.<hr>';
            if (strlen($password) < 3 || strlen($password) > 10) {
                $error_pass = 'Por favor ingrese una contraseña entre 3 y 10 caracteres';
                $errorFlag = true;
            } else {
                echo 'Contraseña válida.<hr>';
                
                if ($mail === $usuarioPrueba_user) {
                    $verificar = password_verify($password, $usuarioPrueba_passHash);
                    if ($verificar === false) {
                        $error_pass = 'Contraseña incorrecta';
                        $errorFlag = true;
                    } else {
                        echo 'Todo correcto!BIENVENIDO!.<hr>';
                    }
                } else {
                    $error_mail = 'Usuario incorrecto';
                    $errorFlag = true;
                }
            }
        }
    } 
    */
} else {
    echo'Botón de ingreso no existe.<hr>';
}

?>