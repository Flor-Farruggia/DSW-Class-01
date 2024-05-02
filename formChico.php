<?php
var_dump($_POST);
$nombre = '';
$error = '';
$msg = '';



if (isset($_POST['enviar'])) {

    function validacion($campo, $min, $max) {
        $msg = '';
        $error = false;
        $campo2 = '';

        if (!isset($_POST[$campo])) {
            $msg = "No existe campo $campo";
            $error = true;
        } else {
            $campo2 = trim($_POST[$campo]);
            if (empty($campo2)) {
                $msg = 'No puede estar vacío';
                $error = true;
            } else {
                if (strlen($campo2) < $min || strlen($campo2) > $max) {
                    $msg = 'Por favor ingreso entre '.$min.' y '.$max.' caracteres';
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

$valNombre = validacion('nombre', 3, 10);
echo "<pre>";
var_dump ($valNombre);
echo "</pre>";


}

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
                <output class="col_12 msg_error"><?=$msg?></output>
            </div>
            <div class="col_12 flex flex-justify-center button_reg">
                <button type="submit" name="enviar">Enviar</button>
            </div>
        </form>
    </main>
</body>
</html>