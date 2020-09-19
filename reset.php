<?php
session_start();
setcookie("QUE","",time() - 3600);
session_destroy();