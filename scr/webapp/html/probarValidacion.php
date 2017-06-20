<html>
<head></head>
<body>

<form action="probarValidacion.php" method="post">
    <input type="text" name="input">
    <input type="submit" value="probar">
</form>
<br>

<?php
if(isset($_REQUEST['input'])){
    require_once('../php/funcionesValidacion.php');
    $input = $_REQUEST['input'];
    echo esInputLongitudMaxima($input,3);
}
?>

</body>
</html>


