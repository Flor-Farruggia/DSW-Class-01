<?php
var_dump($_POST);
$nombre = '';
$apellido = '';
$DNI = '';
$fechaNac = '';
$genero = '';
$telefono = '';
$provincia = '';
$mail = '';
$password = '';
$password2 = '';
$termCond = '';

$fechaMin = date('1920-01-01'); #104
$fechaMax = date('2007-01-01'); #17
$fechaValida = '';

$errorNombre = '';
$errorApellido = '';
$errorDNI = '';
$errorFechaNac = '';
$errorGenero = '';
$errorTel = '';
$errorProvincia = '';
$errorMail = '';
$errorPass = '';
$errorPass2 = '';
$errorTerm = '';


if (isset($_POST['registro'])) {

    $errorFlag = false;

    #VALIDACIONES NOMBRE ######################################################################
        #existe?
        if (!isset($_POST['nombre'])) {
            $errorNombre = "No existe campo nombre";
            $errorFlag = true;
        } else {
            $nombre = trim($_POST['nombre']);
        }

        #está vacío?
        if (empty($errorNombre)) {
            if (empty($nombre)) {
                $errorNombre = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Cantidad caracteres
        if (empty($errorNombre)) {
            if (strlen($nombre) < 3 || strlen($nombre) > 100) {
                $errorNombre = 'Por favor ingreso un nombre entre 3 y 100 caracteres';
                $errorFlag = true;
            } else {
            }
        }

        #validar caracteres aceptables
#        if (empty($errorNombre)) {
#            if () {
#                $errorNombre = 'Por favor ingreso un nombre con caracteres alfabéticos';
#                $errorFlag = true;
#            } else {
#            }
#        }
    #FINAL validaciones NOMBRE ######################################################################

    #VALIDACIONES APELLIDO ######################################################################
        #existe?
        if (!isset($_POST['apellido'])) {
            $errorApellido = "No existe campo apellido";
            $errorFlag = true;
        } else {
            $apellido = trim($_POST['apellido']);
        }

        #está vacío?
        if (empty($errorApellido)) {
            if (empty($apellido)) {
                $errorApellido = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Cantidad caracteres
        if (empty($errorApellido)) {
            if (strlen($apellido) < 3 || strlen($apellido) > 100) {
                $errorApellido = 'Por favor ingreso un apellido entre 3 y 100 caracteres';
                $errorFlag = true;
            } else {
            }
        }

        #Validar caracteres aceptables
        if (empty($errorApellido)) {
            if () {
                $errorApellido = 'Por favor ingreso un apellido con caracteres alfabéticos';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones APELLIDO ######################################################################

    #VALIDACIONES DNI ######################################################################
        #existe?
        if (!isset($_POST['DNI'])) {
            $errorDNI = "No existe campo DNI";
            $errorFlag = true;
        } else {
            $DNI = trim($_POST['DNI']);
        }

        #está vacío?
        if (empty($errorDNI)) {
            if (empty($DNI)) {
                $errorDNI = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Cant. números
        if (empty($errorDNI)) {
            if (strlen($DNI) < 7 || strlen($DNI) > 11) {
                $errorDNI = 'Por favor ingrese un DNI entre 7 y 11 números';
                $errorFlag = true;
            } else {
            }
        }

        #Caracteres numéricos
        if (empty($errorDNI)) {
            if (!is_numeric($DNI)) {
                $errorDNI = 'Por favor ingrese solo números';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones DNI ######################################################################

    #VALIDACIONES FECHA NACIMIENTO ######################################################################
        #existe?
        if (!isset($_POST['fechaNac'])) {
            $errorFechaNac = "No existe campo Fecha de nacimiento";
            $errorFlag = true;
        } else {
            $fechaNac = trim($_POST['fechaNac']);
        }

        #está vacío?
        if (empty($errorFechaNac)) {
            if (empty($fechaNac)) {
                $errorFechaNac = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }
        #Cantidad caracteres
        if (empty($errorFechaNac)) {
            if (strlen($fechaNac) < 10 || strlen($fechaNac) > 10) {
                $errorFechaNac = 'Por favor ingrese una fecha válida como 2000-12-10';
                $errorFlag = true;
            } else {
            }
        }

        #Validación formato fecha
        if (empty($errorFechaNac)) {
            $fechaValida =  Strtotime($fechaNac);
            if ($fechaValida !== false) {
                $errorFechaNac = 'Formato de fecha inválido';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones FECHA NACIMIENTO ######################################################################

    #VALIDACIONES GENERO ######################################################################
        #existe?
        if (!isset($_POST['genero'])) {
            $errorGenero = "No existe campo genero";
            $errorFlag = true;
        } else {
            $genero = trim($_POST['genero']);
        }

        #es un valor válido?
        $campoValidoGenero = array ('M', 'F', 'O');
        $generoFlag= true;
        foreach ($campoValidoGenero as $indice => $value) {
            if (strtolower($genero) == strtolower($value)) {
                $generoFlag = false;
            }
        }
        if($generoFlag===true){
            $errorGenero = "No existe campo genero";
            $errorFlag = true; 
        }


    #FINAL validaciones GENERO ################################################################

    #VALIDACIONES TELEFONO ######################################################################
        #existe?
        if (!isset($_POST['telefono'])) {
            $errorTel = "No existe campo telefono";
            $errorFlag = true;
        } else {
            $telefono = trim($_POST['telefono']);
        }

        #está vacío?
        if (empty($errorTel)) {
            if (empty($telefono)) {
                $errorTel = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #caracteres validos (numericos)
        //Está mal porque si en el número agregan el (+54) te desconfigura todo
//        if (empty($errorTel)) {
//            if (!is_numeric($telefono)) {
//                $errorTel = 'Por favor ingrese solo números';
//                $errorFlag = true;
//            } else {
//            }
//        }
    #FINAL validaciones TELEFONO################################################################

    #VALIDACIONES PROVINCIA ######################################################################
        #existe?
        if (!isset($_POST['provincia'])) {
            $errorProvincia = "No existe campo provincia";
            $errorFlag = true;
        } else {
            $provincia = trim($_POST['provincia']);
        }

        #está vacío? ---------------DEBERÍA SER SI ESTÁ SELECTED EN ALGUNA OPCIÓN---------
        if (empty($errorProvincia)) {
            if (empty($Provincia)) {
                $errorProvincia = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones PROVINCIA ################################################################

    #VALIDACIONES MAIL ######################################################################
        #existe?
        if (!isset($_POST['mail'])) {
            $errorMail = "No existe mail";
            $errorFlag = true;
        } else {
            $mail = trim($_POST['mail']);
        }

        #está vacío?
        if (empty($errorMail)) {
            if (empty($mail)) {
                $errorMail = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Cantidad caracteres
        if (empty($errorMail)) {
            if (strlen($mail) < 5 || strlen($mail) > 120) {
                $errorMail = 'Por favor ingreso un mail entre 5 y 120 caracteres';
                $errorFlag = true;
            } else {
            }
        }

        #Formato válido
            if (empty($errorMail)) {
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $errorMail = 'Formato no válido';
                    $errorFlag = true;
                } else {
            }
        }
    #FINAL validaciones mail ######################################################################

    #INICIO VALIDACIONES PASSWORD ######################################################################

        #Existe?
        if (!isset($_POST['password'])) {
            $errorPass = 'No existe contraseña';
            $errorFlag = true;
        } else {
            $password = trim($_POST['password']);
        }

        #Vacío?
        if (empty($errorPass)) {
            if (empty($password)) {
                $errorPass = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Caracteres validos?
        if (empty($errorPass)){
            if (strlen($password) < 3 || strlen($password) > 10) {
                $errorPass = 'Por favor ingrese una contraseña entre 3 y 10 caracteres';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones password ######################################################################
    
    #VALIDACIONES SEGUNDA PASSWORD ######################################################################
    
        #Existe?
        if (!isset($_POST['password2'])) {
            $errorPass2 = 'No existe segunda contraseña';
            $errorFlag = true;
        } else {
            $password2 = trim($_POST['password2']);
        }

        #Vacío?
        if (empty($errorPass2)) {
            if (empty($password2)) {
                $errorPass2 = 'No puede estar vacío';
                $errorFlag = true;
            } else {
            }
        }

        #Caracteres validos?
        if (empty($errorPass2)){
            if (strlen($password2) < 3 || strlen($password2) > 10) {
                $errorPass2 = 'Por favor ingrese una contraseña entre 3 y 10 caracteres';
                $errorFlag = true;
            } else {
            }
        }

        #Es la misma que la anterior?
        if (empty($errorPass&&$errorPass2)){
            if ($password !== $password2) {
                $errorPass = 'Por favor ingrese la misma contraseña en ambos campos';
                $errorPass2 = 'Por favor ingrese la misma contraseña en ambos campos';
                $errorFlag = true;
            } else {
            }
        }
    #FINAL validaciones SEGUNDA PASSWORD################################################################

    #VALIDACIONES TERMINOS Y CONDICIONES ######################################################################
        #Existe?
        if (!isset($_POST['termCond'])) {
            $errorTerm = 'No existen los termino y condiciones';
            $errorFlag = true;
        } else {
            $termCond = trim($_POST['termCond']);
        }
        #está en check?
        

    #FINAL validaciones TERMINOS Y CONDICIONES################################################################

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
                <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?=$nombre?>">
                <output class="col_12 msg_error "><?=$errorNombre?></output>
            </div>
            <div class="col_12 inputs">
                <input type="text" name="apellido" placeholder="Ingrese su apellido" value="<?=$apellido?>">
                <output class="col_12 msg_error "><?=$errorApellido?></output>
            </div>
            <div class="col_12 inputs chico">
                <input type="number" name="DNI" placeholder="Ingrese su DNI" value="<?=$DNI?>">
                <output class="col_12 msg_error "><?=$errorDNI?></output>
            </div>
            <div class="col_12 inputs chico">
                <input type="date" name="fechaNac" placeholder="Ingrese su fecha de nacimiento" min="<?=$fechaMin;?>"
                max="<?=$fechaMax;?>" value="<?=$fechaNac?>">
                <output class="col_12 msg_error "><?=$errorFechaNac?></output>
            </div>
            <div class="col_12 inputs column">
            <div class="col_3 flex flex-align-center">
                    <input type="radio"name="genero" value="M" <?=($genero=='M')?'checked':''?>>
                    <label for="M">Masculino</label>
                </div>
                <div class="col_3 flex flex-align-center">
                    <input type="radio" name="genero" value="F"<?=($genero=='F')?'checked':''?>>
                    <label for="F">Femenino</label>
                </div>
                <div class="col_3 flex flex-align-center">
                    <input type="radio" name="genero" value="O"<?=($genero=='O')?'checked':''?>>
                    <label for="O">Otro</label>
                </div>
                <output class="col_12 msg_error "><?=$errorGenero?></output>
            </div>
            <div class="col_12 inputs chico">
                <input type="text" name="telefono" placeholder="Ingrese su teléfono" value="<?=$telefono?>">
                <output class="col_12 msg_error "><?=$errorTel?></output>
            </div>
            <div class="col_12 inputs chico">
                <select name="provincia">
                    <option value="">Selecciona una provincia</option>
                    <option value="BuenosAires">Buenos Aires</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="EntreRíos">Entre Ríos</option>
                    <option value="Formosa">Formosa</option>
                    <option value="Jujuy">Jujuy</option>
                    <option value="LaPampa">La Pampa</option>
                    <option value="LaRioja">La Rioja</option>
                    <option value="Mendoza">Mendoza</option>
                    <option value="Misiones">Misiones</option>
                    <option value="Neuquén">Neuquén</option>
                    <option value="RíoNegro">Río Negro</option>
                    <option value="Salta">Salta</option>
                    <option value="SanJuan">San Juan</option>
                    <option value="SanLuis">San Luis</option>
                    <option value="SantaCruz">Santa Cruz</option>
                    <option value="SantaFe">Santa Fe</option>
                    <option value="SantiagoDelEstero">Santiago del Estero</option>
                    <option value="TierraDelFuego">Tierra del Fuego</option>
                    <option value="Tucumán">Tucumán</option>
                </select>
                <output class="col_12 msg_error "><?=$errorProvincia?></output>
            </div>
            <div class="col_12 inputs">
                <input type="email" name="mail" placeholder="Ingrese su email" value="<?=$mail?>" autofocus>
                <output class="col_12 msg_error"><?=$errorMail?></output>
            </div>
            <div class="col_12 inputs chico">
                <input type="password" name="password" placeholder="Ingrese contraseña" value="<?=$password?>">
                <output class="col_12 msg_error "><?=$errorPass?></output>
            </div>
            <div class="col_12 inputs chico">
                <input type="password" name="password" placeholder="Vuelva a ingresar contraseña" value="<?=$password2?>">
                <output class="col_12 msg_error "><?=$errorPass2?></output>
            </div>
            <div class="col_12 inputs column">
                <input type="checkbox" name="termCond" value="termCond">
                <label for="termCond"> Acepta los términos y condiciones?</label>
                <output class="col_12 msg_error "><?=$errorTerm?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_reg">
                <button type="submit" name="registro">Registrarse</button>
            </div>
        </form>
    </main>
</body>
</html>