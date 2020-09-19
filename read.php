<?php
$f = fopen("database/time.dbs","r");
echo fread($f,filesize("database/time.dbs"));
fclose($f);
?>