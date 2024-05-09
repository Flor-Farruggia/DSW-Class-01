<?php

require_once 'abp/funciones.php';

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

$msg = '';

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

    #VALIDACIONES NOMBRE ######################################################################
        $valNombre = validacion('nombre', 3, 100, 'nombre');

        if ($valNombre['error']) {
            $errorNombre = $valNombre['msg'];
        } else {
            $nombre = $valNombre['campo2'];
        }

    #FINAL validaciones NOMBRE ######################################################################

    #VALIDACIONES APELLIDO ######################################################################
    $valApellido = validacion('apellido', 3, 100, 'apellido');

    if ($valApellido['error']) {
        $errorApellido = $valApellido['msg'];
    } else {
        $apellido = $valApellido['campo2'];
    }
    #FINAL validaciones APELLIDO ######################################################################

    #VALIDACIONES DNI ######################################################################
    $valDNI = validacion('DNI', 7, 11, 'DNI');

    if ($valDNI['error']) {
        $errorDNI = $valDNI['msg'];
    } else {
            if (!is_numeric($valDNI['campo2'])) {
                $errorDNI = 'Por favor ingrese solo números';
                $error = true;
            } else {
                $DNI = $valDNI['campo2'];
            }
    }

    #FINAL validaciones DNI ######################################################################

    #VALIDACIONES FECHA NACIMIENTO ################################################################
    $valFechaNac = validacion('fechaNac', 10, 10, 'fecha de nacimiento');

    if ($valFechaNac['error']) {
        $errorFechaNac = $valFechaNac['msg'];
    } else {
        $fechaValida =  Strtotime($fechaNac);
        if ($fechaValida !== false) {
            $errorFechaNac = 'Formato de fecha inválido';
            $errorFlag = true;
        } else {
            $fechaNac = $valFechaNac['campo2'];
        }
    }
    #FINAL validaciones FECHA NACIMIENTO ######################################################################

    #VALIDACIONES GENERO ######################################################################
    $campoValidoGenero = array ('M', 'F', 'O');

    $valGen = validarChecks('genero', 'genero', $campoValidoGenero);

    if ($valGen['error']) {
        $errorGenero = $valGen['msg'];
    } else {
        $genero = $valGen['campo2'];
    }

    #FINAL validaciones GENERO ################################################################

    #VALIDACIONES TELEFONO ######################################################################
        $valTel = validacion('telefono', 9, 18, 'teléfono');

        if ($valTel['error']) {
            $errorTel = $valTel['msg'];
        } else {
            $telefono = $valTel['campo2'];
        }
    #FINAL validaciones TELEFONO################################################################

    #VALIDACIONES PROVINCIA ######################################################################
    $provinciasValidas = array("BuenosAires", "Catamarca", "Chaco", "Chubut", "Córdoba", "Corrientes",
    "EntreRíos", "Formosa", "Jujuy", "LaPampa", "LaRioja", "Mendoza", "Misiones", "Neuquén", "RíoNegro",
    "Salta", "SanJuan", "SanLuis", "SantaCruz", "SantaFe", "SantiagoDelEstero", "TierraDelFuego", "Tucumán");

    $valProv = validarChecks('provincia', 'provincia', $provinciasValidas);

    if ($valProv['error']) {
        $errorProvincia = $valProv['msg'];
    } else {
        $provincia = $valProv['campo2'];
    }
    #FINAL validaciones PROVINCIA ################################################################

    #VALIDACIONES MAIL ######################################################################
    $valMail = validacion('mail', 5, 120, 'e-mail');

    if ($valMail['error']) {
        $errorMail = $valMail['msg'];
    } else {
        if (!filter_var($valMail['campo2'], FILTER_VALIDATE_EMAIL)) {
            $errorMail = 'Formato no válido';
            $error = true;
        } else {
            $mail = $valMail['campo2'];
        }
    }
    #FINAL validaciones mail ######################################################################

    #INICIO VALIDACIONES PASSWORD ######################################################################
    $valPass = validacion('password', 5, 10, 'contraseña');

    if ($valPass['error']) {
        $errorPass = $valPass['msg'];
    } else {
        $password = $valPass['campo2'];
    }
    #FINAL validaciones password ######################################################################

    #VALIDACIONES SEGUNDA PASSWORD ######################################################################
    $valPass2 = validacion('password2', 5, 10, 'contraseña');

    if ($valPass2['error']) {
        $errorPass2 = $valPass2['msg'];
    } else {
        $password2 = $valPass2['campo2'];
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
    #VALIDACIONES TÉRMINOS Y CONDICIONES ######################################################################
    //Existe?
    // $termCondVal = array (true, false);

    // $valTerm = validarChecks('termCond', 'terminos y condiciones', $termCondVal);

    // if ($valTerm['error']) {
    //     $errorTerm = $valTerm['msg'];
    //     $errorFlag = true;
    // } else {
    //     $termCond = $valTerm['campo2'];
    // }
    #FINAL validaciones TÉRMINOS Y CONDICIONES ################################################################

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
                    <option value="" selected disabled>Selecciona una provincia</option>
                    <option value="BuenosAires" <?= ($provincia == 'BuenosAires') ? 'selected' : '' ?>
                    >Buenos Aires</option>
                    <option value="Catamarca" <?= ($provincia == 'Catamarca') ? 'selected' : '' ?>
                    >Catamarca</option>
                    <option value="Chaco" <?= ($provincia == 'Chaco') ? 'selected' : '' ?>
                    >Chaco</option>
                    <option value="Chubut" <?= ($provincia == 'Chubut') ? 'selected' : '' ?>
                    >Chubut</option>
                    <option value="Córdoba" <?= ($provincia == 'Córdoba') ? 'selected' : '' ?>
                    >Córdoba</option>
                    <option value="Corrientes" <?= ($provincia == 'Corrientes') ? 'selected' : '' ?>
                    >Corrientes</option>
                    <option value="EntreRíos" <?= ($provincia == 'EntreRíos') ? 'selected' : '' ?>
                    >Entre Ríos</option>
                    <option value="Formosa" <?= ($provincia == 'Formosa') ? 'selected' : '' ?>
                    >Formosa</option>
                    <option value="Jujuy" <?= ($provincia == 'Jujuy') ? 'selected' : '' ?>
                    >Jujuy</option>
                    <option value="LaPampa" <?= ($provincia == 'LaPampa') ? 'selected' : '' ?>
                    >La Pampa</option>
                    <option value="LaRioja" <?= ($provincia == 'LaRioja') ? 'selected' : '' ?>
                    >La Rioja</option>
                    <option value="Mendoza" <?= ($provincia == 'Mendoza') ? 'selected' : '' ?>
                    >Mendoza</option>
                    <option value="Misiones" <?= ($provincia == 'Misiones') ? 'selected' : '' ?>
                    >Misiones</option>
                    <option value="Neuquén" <?= ($provincia == 'Neuquén') ? 'selected' : '' ?>
                    >Neuquén</option>
                    <option value="RíoNegro" <?= ($provincia == 'RíoNegro') ? 'selected' : '' ?>
                    >Río Negro</option>
                    <option value="Salta" <?= ($provincia == 'Salta') ? 'selected' : '' ?>
                    >Salta</option>
                    <option value="SanJuan" <?= ($provincia == 'SanJuan') ? 'selected' : '' ?>
                    >San Juan</option>
                    <option value="SanLuis" <?= ($provincia == 'SanLuis') ? 'selected' : '' ?>
                    >San Luis</option>
                    <option value="SantaCruz" <?= ($provincia == 'SantaCruz') ? 'selected' : '' ?>
                    >Santa Cruz</option>
                    <option value="SantaFe" <?= ($provincia == 'SantaFe') ? 'selected' : '' ?>
                    >Santa Fe</option>
                    <option value="SantiagoDelEstero" <?= ($provincia == 'SantiagoDelEstero')? 'selected' : '' ?>
                    >Santiago del Estero</option>
                    <option value="TierraDelFuego" <?= ($provincia == 'TierraDelFuego') ? 'selected' : '' ?>>
                    Tierra del Fuego</option>
                    <option value="Tucumán" <?= ($provincia == 'Tucumán') ? 'selected' : '' ?>
                    >Tucumán</option>
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
                <input type="password" name="password2" placeholder="Vuelva a ingresar contraseña" value="<?=$password2?>">
                <output class="col_12 msg_error "><?=$errorPass2?></output>
            </div>
            <div class="col_12 column flex">
                <div class="col_12 flex checked">
                    <input type="checkbox" name="termCond" value="true"<?= ($termCond == 'true') ? 'checked' : '' ?>>
                    <label for="termCond"> Acepta los términos y condiciones?</label>
                </div>
                <output class="col_12 msg_error "><?=$errorTerm?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_reg">
                <button type="submit" name="registro">Registrarse</button>
            </div>
        </form>
    </main>
</body>
</html>