<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="jquery.timeago.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            $("time.timeago").timeago();
        });
    </script>
</head>
<body>
<?php
	$DBhost = "localhost";
	$DBuser = "root";
	$DBpass = "";
	$DBname = "tiempos";

	try {
        $DBcon = new PDO("mysql:host=$DBhost;port=3306;dbname=$DBname",$DBuser,$DBpass);
        //$DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $ex){
        die($ex->getMessage());
    }
    
$time = new DateTime;
$tiempo = $time->format(DateTime::ATOM);

$query = "SELECT * from tiempo WHERE id=3";
$stmt = $DBcon->prepare( $query );
$stmt->execute();
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
?>
    <time class="timeago" datetime="<?php echo $row['date']; ?>"></time><br>
<?php
}
?>
<time class="timeago" datetime="<?php echo $tiempo; ?>"></time>
</body>
</html>