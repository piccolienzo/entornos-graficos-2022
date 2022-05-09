<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asd</title>
    <link rel="stylesheet" href="static/css/global.css" /> 
</head>
<body>
 <h1>Ingreso alumnos</h1>
<form action="controllers/login/login.php" method="post">
    <input type="text" id="legajo" name="legajo" />
    <input type="password" id="password" name="password" />
    <button type="submit" class="btn-violeta"> Entrar </button>
</form>

<p>¿Olviaste tu contraseña? <a href="views/forgot-password.php" target="_blank" rel="noopener noreferrer">Click acá</a></p>
</body>
</html>