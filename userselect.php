<?php
session_start();
require ("system/database.php");
session_regenerate_id();
$section1 = false;
$section2 = false;
$topsec = false;

if(isset($_POST["user"]) && isset($_POST["code"])){
    $dbs = new database("database/users.dbs");
    if($dbs->isin($_POST["user"],$_POST["code"]))
    {
        $_SESSION["code"] = $_POST["code"];
        $_SESSION["user"] = $_POST["user"];
    }else{
        header("Location: landing.php?action=error");
    }
}else{
    if(!isset($_SESSION["code"]))
    {
        header("Location: landing.php");
    }
}

if(isset($_SESSION["code"])){
    if(substr($_SESSION["user"],0,3) == "DM1")
    {
        $section1 = true;
    }
    if(substr($_SESSION["user"],0,3) == "DM2")
    {
        $section2 = true;
    }
    if($_SESSION["user"] == "admin")
    {
        header("Location: admin.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178547358-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-178547358-1');
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/extra.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>ระบบลงทะเบียนเวลาการคัดคทากร</title>
</head>
<script type="text/javascript" src="js/ex_user.js"></script>
<body>
<nav class="cpink" role="navigation">
    <div class="nav-wrapper container">
        <a class="brand-logo">
            <img src="images/TUCMC_logo.png" style="height: 35px;vertical-align: middle;margin-right: -13px">
            ระบบลงทะเบียน
            <span class="hide-on-med-and-down" style="margin-left: -5px">เวลาคัดคทากร</span>
        </a>
        <ul class="right hide-on-med-and-down">
            <li class="active"><a>หน้าแรก</a></li>
            <li><a href="contacts.html">ติดต่อเรา</a></li>
        </ul>
        <a href="#" data-target="slider" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<ul id="slider" class="sidenav">
    <li class="active"><a>หน้าแรก</a></li>
    <li><a href="contacts.html">ติดต่อเรา</a></li>
</ul>
<main class="container">
    <div class="z-depth-1 card-panel codebox">
        <div class="row">
            <h4 class="center">ลงทะเบียนเวลาคัดคทากร</h4>
        </div>
        <div class="text-section grey lighten-4 red-text">
            เลือกเวลาคัดอย่างระมัดระวัง ไม่สามารถแก้ไขได้ในภายหลัง มีปัญหาติดต่อได้ที่คณะกรรมการกิจกรรมพัฒนาผู้เรียน IG: tucmc_official
        </div>
        <div class="row">
            <h5>เลือกช่วงเวลาในการคัด</h5>
            <form id="timeselect">
                <?php if($section2){?>
            <div class="col s12" style="margin-left: 50px">
                <p>
                    <label>
                        <input name="time" value="1230" type="checkbox" class="filled-in" />
                        <span class="timetag">12.30 - 13.00</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1230_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1301" type="checkbox" class="filled-in" />
                        <span class="timetag">13.01 - 13.30</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1301_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1331" type="checkbox" class="filled-in" />
                        <span class="timetag">13.31 - 14.00</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1331_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1401" type="checkbox" class="filled-in" />
                        <span class="timetag">14.01 - 14.30</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1401_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1431" type="checkbox" class="filled-in" />
                        <span class="timetag">14.31 - 15.00</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1431_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1501" type="checkbox" class="filled-in" />
                        <span class="timetag">15.01 - 15.30</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1501_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1531" type="checkbox" class="filled-in" />
                        <span class="timetag">15.31 - 16.00</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1531_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1601" type="checkbox" class="filled-in" />
                        <span class="timetag">16.01 - 16.30</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1601_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1631" type="checkbox" class="filled-in" />
                        <span class="timetag">16.31 - 17.00</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1631_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1715" type="checkbox" class="filled-in" />
                        <span class="timetag">17.15 - 17.45</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1715_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input name="time" value="1746" type="checkbox" class="filled-in" />
                        <span class="timetag">17.46 - 18.15</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1746_c">6</span> ที่</span>
                </p>
                <p>
                    <label>
                        <input id="lastg" name="time" value="1816" type="checkbox" class="filled-in" disabled/>
                        <span class="timetag">18.16 - 18.45</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1816_c">6</span> ที่</span>
                </p>
            </div>
        <?php } ?>
                <?php if($section1){?>
                    <div class="col s12" style="margin-left: 50px">
                        <p>
                            <label>
                                <input name="time" value="1630" type="checkbox" class="filled-in" />
                                <span class="timetag">16.30 - 17.00</span>
                            </label>
                            <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1630_c">6</span> ที่</span>
                        </p>
                        <p>
                            <label>
                                <input name="time" value="1701" type="checkbox" class="filled-in" />
                                <span class="timetag">17.01 - 17.30</span>
                            </label>
                            <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1701_c">6</span> ที่</span>
                        </p>
                        <p>
                            <label>
                                <input name="time" value="1731" type="checkbox" class="filled-in" />
                                <span class="timetag">17.31 - 18.00</span>
                            </label>
                            <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1731_c">6</span> ที่</span>
                        </p>
                        <p>
                            <label>
                                <input name="time" value="1801" type="checkbox" class="filled-in" />
                                <span class="timetag">18.01 - 18.30</span>
                            </label>
                            <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1801_c">6</span> ที่</span>
                        </p>
                        <p>
                            <label>
                                <input id="lastm" name="time" value="1831" type="checkbox" class="filled-in" disabled/>
                                <span class="timetag">18.31 - 19.00</span>
                            </label>
                            <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1831_c">6</span> ที่</span>
                        </p>
                    </div>
                <?php } ?>
            </form>
        </div>
        <div class="row">
            <div class="col s12">
                <a onclick="submit()" id="submitb" class="waves-effect waves-light btn-large blue disabled" style="width: 100%"><i class="material-icons left">lock</i>ยืนยันเวลา</a>
            </div>
        </div>

    </div>
</main>
<footer style="background-color: #f5899b;width: 100%" class="page-footer">
    <div class="footer-copyright">
        <div style="text-align: center" class="container">
            © 2020 งานกิจกรรมพัฒนาผู้เรียนโรงเรียนเตรียมอุดมศึกษา
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        updatecolor();
    });
    $(".filled-in").change(function() {
        $(".filled-in").prop('checked', false);
        $(this).prop('checked', true);
    });
    retrieve();
    setInterval(retrieve,400);
</script>
</body>
</html>
<?php
}
    ?>