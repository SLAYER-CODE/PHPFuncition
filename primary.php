<?php
include "./Controllers/WordText.php";


if (isset($_POST["submit"])) {
    echo "<p>Se envio</p>";
    
    PRINT_R($_FILES["fileToUpload"]);
    $TmpDOC= $_FILES["fileToUpload"]["tmp_name"];
    $InfoDoc = pathinfo($TmpDOC);
    echo "<p></p>";
    print_r($InfoDoc);
    $WordDumbi =  new DocxConversion($TmpDOC);
    $Dat = $WordDumbi->convertToText();
    echo "<h2> $Dat </h2>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="" style="border:2px;padding:20dp;margin:20px;">
        Analizar documento
        <form action="primary.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Obtener Texto" name="submit">
        </form>
    </div>
</body>

</html>