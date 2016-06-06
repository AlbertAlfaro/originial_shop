<?php
echo '<html>
<head>
<title>'.$_SERVER[PHP_SELF].'</title>
</head>
<body>';
$variable_php="variable en php";
echo '<script languaje="JavaScript">
var varjs="'.$variable_php.'";
alert(varjs);
</script>';
echo "<a href=$_SERVER[PHP_SELF]>Recargar la Página</a>";
echo '</body>
</html>';
?>
            