<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="">
        <h2>FORMULARIO</h2>
        <label for="nombre">Introduzca su nombre</label>
        <input type="text" name="nombre" class="formInputs" required>
        <label for="apellido">Introduzca su apellido</label>
        <input type="text" name="apellido" class="formInputs" required>
        <label for="email">Introduzca su email</label>
        <input type="text" name="email" class="formInputs" required>
        <input type="submit" class="button">
        
        <?php
            if ($_POST) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cursosql";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO usuario (nombre, apellido, email)
                VALUES ('$nombre', '$apellido', '$email')";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created succesfully";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        ?>
    </form>
</body>
</html>