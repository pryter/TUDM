<?php
session_start();
require ("system/database.php");
if(isset($_POST["time"]) && isset($_SESSION["user"]))
{
    $status = "failed";
    $dbs = new database("database/time.dbs");
    $obj_ref = $dbs->read_obj();
    $ref = array_count_values($obj_ref);
    if($ref[$_POST["time"]] < 6 || !isset($ref[$_POST["time"]])){
        $res = $dbs->append($_SESSION["user"],$_POST["time"]);
        if($res){
            $db2 = new database("database/users.dbs");
            setcookie("QUE",$_POST["time"],time() + (10 * 365 * 24 * 60 * 60));
            setcookie("USER",$_POST["user"],time() + (10 * 365 * 24 * 60 * 60));
            $db2->eliminate($_SESSION["user"]);
            session_destroy();
            $status = "success";
        }
    }
    echo json_encode(array("re" => $status));
}