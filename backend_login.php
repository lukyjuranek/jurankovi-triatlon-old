<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <br>
    <h1>Login</h1>
    <br>

    <form method="POST">
        <div class="form-group">
            <input type="password" class="form-control mb-2" placeholder="Password" name="pass">
            <button type="submit" class="btn bg-black">Login</button>
        </div>
    </form>


    <?php
        session_start();
        //oveří zda je uživatel přihlášen
        if (isset($_SESSION['password'])) {
            header('Location: upload.php');
            exit();
        };
        if ($_POST) {
            // $uzivatel = Db::queryOne('
            //     SELECT uzivatel_id, heslo, prezdivka
            //     FROM uzivatel
            //     WHERE email=?
            //     ', $_POST['email']);
            // if (!$uzivatel || !password_verify($_POST['heslo'], $uzivatel['heslo'])) {
                //     echo "<div class='alert alert-success alert-dismissible'>
                //     <button type='button' class='close' data-dismiss='alert'>&times;</button>
                //     Neplatný email nebo heslo
                //   </div>";
                // } else {
                    //     $_SESSION['uzivatel_id'] = $uzivatel['uzivatel_id'];
                    //     $_SESSION['prezdivka'] = $uzivatel['prezdivka'];
                    //     header('Location: soubory.php');
                    //     exit();

                    if($_POST["pass"] == "heidialuky"){
                        echo $_SESSION["pass"];
                        $_SESSION["password"] = $_POST["pass"];
                        header('Location: upload.php');

                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        Wrong password
                        </div>";
                    };
                };
                //=================================================================================================
                ?>
            </div>



</body>
</html>
