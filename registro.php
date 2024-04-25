<?php
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
        <div class="col_12">
            <h1>Registro</h1>
        </div>
        <form class="col_4 reg_cont" method="POST">
            <div class="col_12 inputs">
                <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?=$nombre?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="text" name="apellido" placeholder="Ingrese su apellido" value="<?=$apellido?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="number" name="DNI" placeholder="Ingrese su DNI" value="<?=$DNI?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="date" name="fechaNac" placeholder="Ingrese su fecha de nacimiento" value="<?=$fechaNac?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <p>Selecione su sexo:</p>
                <input type="radio" id="femenino" name="sexType" value="Femenino">
                <label for="femenino">Femenino</label>
                <input type="radio" id="masculino" name="sexType" value="Masculino">
                <label for="masculino">Masculino</label>
                <input type="radio" id="otro" name="sexType" value="Otro">
                <label for="otro">Otro</label>
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="text" name="telefono" placeholder="Ingrese su teléfono" value="<?=$telefono?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="text" name="telefono" placeholder="Ingrese su teléfono" value="<?=$telefono?>">
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 inputs">
                <input type="email" name="mail" placeholder="Ingrese su email" value="<?=$mail?>" autofocus>
                <output class="col_12 msg_error"><?=$error_mail?></output>
            </div>
            <div class="col_12 inputs">
                <input type="password" name="password" placeholder="Ingrese contraseña" value="<?=$password?>">
                <output class="col_12 msg_error "><?=$error_pass?></output>
            </div>
            <div class="col_12 inputs">
                <input type="password" name="password" placeholder="Vuelva a ingresar contraseña" value="<?=$password?>">
                <output class="col_12 msg_error "><?=$error_pass?></output>
            </div>
            <div class="col_12 inputs">
                <input type="checkbox" id="termCond" name="termCond" value="termCond">
                <label for="termCond"> Acepta los términos y condiciones?</label>
                <output class="col_12 msg_error "><?=$error?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_log">
                <button type="submit" name="ingreso">Ingresar</button>
            </div>
        </form>
<!--
NOMBRE - text
APELLIDO - text
DNI -number
FECHA NAC - date
SEXO - radio
TEL - text
PROVINCIA -select
EMAIL - email
CONTRASEÑA -pass
CONTRASEÑA verif -pass
TERMINOS Y CONDICIONES -checkbox  
-->
    </main>
</body>
</html>