<?php
if(isset($_POST["task"]) && $_POST["task"] == "request") {
    $f = fopen("database/time.dbs", "r");
    echo fread($f, filesize("database/time.dbs"));
    fclose($f);
}
?>