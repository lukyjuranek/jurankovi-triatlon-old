<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>

<body>
    <br>
    <div class="container">
        <h1>Upload images:</h2>
        <form enctype="multipart/form-data" action="upload.php" method="POST">
            <p>Upload your file</p>
            <input type="file" name="uploaded_file" class="form-control-file border"></input><br />
            <input type="submit" value="Upload" class="btn btn-success"></input>
        </form>
        <br>
        <?php

        //=================================================================================================
        //oveří zda je uživatel přihlášen
        session_start();
        if ($_SESSION['password'] != "heidialuky") {
            header('Location: backend_login.php');
            exit();
        }
        //=================================================================================================
        
            $file_number = count(scandir("uploads/")) - 1;

            if(!empty($_FILES['uploaded_file']))
            {
                $path = "uploads/";
                $new_name = $file_number.".".pathinfo($_FILES['uploaded_file']['name'], PATHINFO_EXTENSION);
                $path = $path . basename($new_name);
                if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                    echo "<div class='alert alert-success alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Success!</strong> The file <strong>".  basename( $_FILES['uploaded_file']['name'])."</strong> has been uploaded as <strong>".$new_name."</strong>
                  </div>";
                } else{
                    echo "<div class='alert alert-danger alert-dismissible fade show'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Error!</strong> There was an error uploading the file, please try again!
                  </div>";
                }
            }
        ?>
        <a href="gallery.php">&lt Back to gallery</a>
        <h3>All images:</h3>
        <ul>
            <?php
                $x=0;
                $results=array();
                if ($handle = opendir('uploads/')) {
                    while (false !== ($entry = readdir($handle))) {                
                        if ($entry != "." && $entry != "..") {    
                            $x++;  
                            $results[$x] = $entry;        
                            
                        }
                    }
                    closedir($handle);
                }
                $results = array_reverse($results);
                foreach($results as $file){
                    echo "<li><a href='uploads/$file'>$file</a></li>";
                }

            ?>
        </ul>
        
    </div>
</body>

</html>