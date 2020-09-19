<?php
if(isset($_COOKIE["QUE"]))
{
    header("Location: stat.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/extra.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>ระบบลงทะเบียนเลือกเวลาการคัดคทากร</title>
</head>
<body>
<nav class="cpink" role="navigation">
    <div class="nav-wrapper container">
        <a class="brand-logo">
            <img src="images/TUCMC_logo.png" style="height: 35px;vertical-align: middle;margin-right: -13px">
            ระบบลงทะเบียน
            <span class="hide-on-med-and-down" style="margin-left: -5px">เลือกเวลาคัดคทากร</span>
        </a>
        <ul class="right hide-on-med-and-down">
            <li class="active"><a>หน้าแรก</a></li>
            <li><a>ติดต่อเรา</a></li>
        </ul>
        <a href="#" data-target="slider" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<ul id="slider" class="sidenav">
    <li class="active"><a href="/TUDM">หน้าแรก</a></li>
    <li><a href="/TUDM/contact.html">ติดต่อเรา</a></li>
</ul>
<main class="container">
    <div class="z-depth-1 card-panel codebox">
        <div class="row">
            <h4 class="center">ลงทะเบียนเลือกเวลาคัดคทากร</h4>
        </div>
        <div class="text-section grey lighten-4 red-text">
            เลือกเวลาคัดอย่างระมัดระวัง ไม่สามารถแก้ไขได้ในภายหลัง มีปัญหาติดต่อได้ที่คณะกรรมการกิจกรรมพัฒนาผู้เรียน IG: tucmc_official
        </div>
        <form id="check" action="register.php" method="post">
        <div class="row">
            <div class="input-field col s12">
                <input id="username" name="user" class="validate invalid" required="" type="text">
                <label for="username" class="">เลขประจำตัวผู้สมัคร</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="id" name="code" class="validate invalid" required="" type="text">
                <label for="id" class="">รหัสลงทะเบียนเวลา</label>
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col s12">
                <?php if(isset($_GET["action"]) && $_GET["action"] == "error"){echo '<p class="red-text" style="text-align: center;margin-top: -7px">บัญชีไม่สามารใช้งานได้ โปรดลองอีกครั้ง</p>';} ?>
                <a id="s_check" class="waves-effect waves-light btn-large blue" style="width: 100%" href="#"><i class="material-icons left">lock_open</i>เข้าสู่ระบบ</a>
            </div>
        </div>

    </div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
</script>
<script>
    $("#s_check").on("click",function () {
        $("#check").submit();
    });
</script>
</body>
</html>