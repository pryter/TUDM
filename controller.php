<?php
session_start();
if(isset($_POST["ndate"]))
{
    $unix = strtotime($_POST["ndate"]." ".$_POST["ntime"]);
    $f = fopen("database/cd.dbs","w");
    fwrite($f,$unix - 18000);
    fclose($f);
}
$f = fopen("database/cd.dbs","r");
$stuff = fread($f,filesize("database/cd.dbs"));
fclose($f);
$timer = intval($stuff) + 25200;
$date = gmdate("M d, Y", $timer);
$time = gmdate("h:i A", $timer);
if(!isset($_SESSION["user"]) || $_SESSION["user"] != "admin") {
header("Location: index.php");
}else{
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
    <title>ระบบลงทะเบียนเวลาการคัดคทากร</title>
    <style>
        .dropdown-content{
            width: 120px!important;
        }
    </style>
</head>
<script>
    function updatecolor() {
        $(".cnumber").each(function(){
            if(parseInt(this.innerText) >= 5)
            {
                this.parentElement.style.color = "#4caf50";
            }
            if(parseInt(this.innerText) >= 3 && parseInt(this.innerText) < 5)
            {
                this.parentElement.style.color = "#f57f17";
            }
            if(parseInt(this.innerText) >= 0 && parseInt(this.innerText) < 3)
            {
                this.parentElement.style.color = "#f44336";
            }
        });
    }
    function retrieve(){
        $.ajax({
            url: "read.php",
            success: function(data)
            {
                var stuff = [];
                var arr = [];
                arr = data.split("!");
                if(!data.includes("<br")) {
                    arr.forEach(function (value) {
                        var item = value.split("|");
                        if (isNaN(stuff[item[1]])) {
                            stuff[item[1]] = 1;
                            if(typeof item[1] !== "undefined") {
                                document.getElementById(item[1].toString() + "1").innerText = item[0];
                            }
                        } else {
                            stuff[item[1]] += 1;
                            if(typeof item[1] !== "undefined") {
                                document.getElementById(item[1].toString() + stuff[item[1]].toString()).innerText = item[0];
                            }
                        }
                    });
                }
                fetchdata(stuff);
            }
        });
    }
    function toint(input) {
        if(typeof input === "undefined")
        {
            return 0;
        }else{
            return parseInt(input);
        }

    }
    function fetchdata(obj){
        $(".cnumber").each(function(){
            var key = this.id.replace("_c","");
            this.innerText = 6 - toint(obj[key]);
            if(parseInt(this.innerText) >= 5)
            {
                this.parentElement.style.color = "#4caf50";
            }
            if(parseInt(this.innerText) >= 3 && parseInt(this.innerText) < 5)
            {
                this.parentElement.style.color = "#f57f17";
            }
            if(parseInt(this.innerText) >= 0 && parseInt(this.innerText) < 3)
            {
                this.parentElement.style.color = "#f44336";
            }
            if(parseInt(this.innerText) === 0)
            {
                this.parentElement.previousElementSibling.firstElementChild.checked = false;
                this.parentElement.previousElementSibling.firstElementChild.disabled = true;
            }
        });

    }
</script>
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
            <li><a href="contact.html">ติดต่อเรา</a></li>
            <li><a href="reset.php">ออกจากระบบ</a></li>
        </ul>
        <a href="#" data-target="slider" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<ul id="slider" class="sidenav">
    <li class="active"><a>หน้าแรก</a></li>
    <li><a href="contact.html">ติดต่อเรา</a></li>
    <li><a href="reset.php">ออกจากระบบ</a></li>
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
                <div class="col s12" style="margin-left: 50px">
                    <h6>คทากรหญิง</h6>
                    <p>
                        <label>
                            <input name="time" value="1230" type="checkbox" class="filled-in" />
                            <span class="timetag">12.30 - 13.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target='dropdown1230'>เหลือที่ว่าง <span class="cnumber" id="1230_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1230' class='dropdown-content'>
                        <li><a id="12301">-</a></li>
                        <li><a id="12302">-</a></li>
                        <li><a id="12303">-</a></li>
                        <li><a id="12304">-</a></li>
                        <li><a id="12305">-</a></li>
                        <li><a id="12306">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1301" type="checkbox" class="filled-in" />
                            <span class="timetag">13.01 - 13.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1301">เหลือที่ว่าง <span class="cnumber" id="1301_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1301' class='dropdown-content'>
                        <li><a id="13011">-</a></li>
                        <li><a id="13012">-</a></li>
                        <li><a id="13013">-</a></li>
                        <li><a id="13014">-</a></li>
                        <li><a id="13015">-</a></li>
                        <li><a id="13016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1331" type="checkbox" class="filled-in" />
                            <span class="timetag">13.31 - 14.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1331">เหลือที่ว่าง <span class="cnumber" id="1331_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1331' class='dropdown-content'>
                        <li><a id="13311">-</a></li>
                        <li><a id="13312">-</a></li>
                        <li><a id="13313">-</a></li>
                        <li><a id="13314">-</a></li>
                        <li><a id="13315">-</a></li>
                        <li><a id="13316">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1401" type="checkbox" class="filled-in" />
                            <span class="timetag">14.01 - 14.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1401">เหลือที่ว่าง <span class="cnumber" id="1401_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1401' class='dropdown-content'>
                        <li><a id="14011">-</a></li>
                        <li><a id="14012">-</a></li>
                        <li><a id="14013">-</a></li>
                        <li><a id="14014">-</a></li>
                        <li><a id="14015">-</a></li>
                        <li><a id="14016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1431" type="checkbox" class="filled-in" />
                            <span class="timetag">14.31 - 15.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1431">เหลือที่ว่าง <span class="cnumber" id="1431_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1431' class='dropdown-content'>
                        <li><a id="14311">-</a></li>
                        <li><a id="14312">-</a></li>
                        <li><a id="14313">-</a></li>
                        <li><a id="14314">-</a></li>
                        <li><a id="14315">-</a></li>
                        <li><a id="14316">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1501" type="checkbox" class="filled-in" />
                            <span class="timetag">15.01 - 15.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1501">เหลือที่ว่าง <span class="cnumber" id="1501_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1501' class='dropdown-content'>
                        <li><a id="15011">-</a></li>
                        <li><a id="15012">-</a></li>
                        <li><a id="15013">-</a></li>
                        <li><a id="15014">-</a></li>
                        <li><a id="15015">-</a></li>
                        <li><a id="15016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1531" type="checkbox" class="filled-in" />
                            <span class="timetag">15.31 - 16.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1531">เหลือที่ว่าง <span class="cnumber" id="1531_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1531' class='dropdown-content'>
                        <li><a id="15311">-</a></li>
                        <li><a id="15312">-</a></li>
                        <li><a id="15313">-</a></li>
                        <li><a id="15314">-</a></li>
                        <li><a id="15315">-</a></li>
                        <li><a id="15316">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1601" type="checkbox" class="filled-in" />
                            <span class="timetag">16.01 - 16.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1601">เหลือที่ว่าง <span class="cnumber" id="1601_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1601' class='dropdown-content'>
                        <li><a id="16011">-</a></li>
                        <li><a id="16012">-</a></li>
                        <li><a id="16013">-</a></li>
                        <li><a id="16014">-</a></li>
                        <li><a id="16015">-</a></li>
                        <li><a id="16016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1631" type="checkbox" class="filled-in" />
                            <span class="timetag">16.31 - 17.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1631">เหลือที่ว่าง <span class="cnumber" id="1631_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1631' class='dropdown-content'>
                        <li><a id="16311">-</a></li>
                        <li><a id="16312">-</a></li>
                        <li><a id="16313">-</a></li>
                        <li><a id="16314">-</a></li>
                        <li><a id="16315">-</a></li>
                        <li><a id="16316">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1715" type="checkbox" class="filled-in" />
                            <span class="timetag">17.15 - 17.45</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1715">เหลือที่ว่าง <span class="cnumber" id="1715_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1715' class='dropdown-content'>
                        <li><a id="17151">-</a></li>
                        <li><a id="17152">-</a></li>
                        <li><a id="17153">-</a></li>
                        <li><a id="17154">-</a></li>
                        <li><a id="17155">-</a></li>
                        <li><a id="17156">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1746" type="checkbox" class="filled-in" />
                            <span class="timetag">17.46 - 18.15</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1746">เหลือที่ว่าง <span class="cnumber" id="1746_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1746' class='dropdown-content'>
                        <li><a id="17461">-</a></li>
                        <li><a id="17462">-</a></li>
                        <li><a id="17463">-</a></li>
                        <li><a id="17464">-</a></li>
                        <li><a id="17465">-</a></li>
                        <li><a id="17466">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1816" type="checkbox" class="filled-in" />
                            <span class="timetag">18.16 - 18.45</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1816">เหลือที่ว่าง <span class="cnumber" id="1816_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1816' class='dropdown-content'>
                        <li><a id="18161">-</a></li>
                        <li><a id="18162">-</a></li>
                        <li><a id="18163">-</a></li>
                        <li><a id="18164">-</a></li>
                        <li><a id="18165">-</a></li>
                        <li><a id="18166">-</a></li>
                    </ul>
                </div>
                <div class="col s12" style="margin-left: 50px">
                    <h6>คทากรชาย</h6>
                    <p>
                        <label>
                            <input name="time" value="1630" type="checkbox" class="filled-in" />
                            <span class="timetag">16.30 - 17.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1630">เหลือที่ว่าง <span class="cnumber" id="1630_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1630' class='dropdown-content'>
                        <li><a id="16301">-</a></li>
                        <li><a id="16302">-</a></li>
                        <li><a id="16303">-</a></li>
                        <li><a id="16304">-</a></li>
                        <li><a id="16305">-</a></li>
                        <li><a id="16306">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1701" type="checkbox" class="filled-in" />
                            <span class="timetag">17.01 - 17.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1701">เหลือที่ว่าง <span class="cnumber" id="1701_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1701' class='dropdown-content'>
                        <li><a id="17011">-</a></li>
                        <li><a id="17012">-</a></li>
                        <li><a id="17013">-</a></li>
                        <li><a id="17014">-</a></li>
                        <li><a id="17015">-</a></li>
                        <li><a id="17016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1731" type="checkbox" class="filled-in" />
                            <span class="timetag">17.31 - 18.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1731">เหลือที่ว่าง <span class="cnumber" id="1731_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1731' class='dropdown-content'>
                        <li><a id="17311">-</a></li>
                        <li><a id="17312">-</a></li>
                        <li><a id="17313">-</a></li>
                        <li><a id="17314">-</a></li>
                        <li><a id="17315">-</a></li>
                        <li><a id="17316">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1801" type="checkbox" class="filled-in" />
                            <span class="timetag">18.01 - 18.30</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1801">เหลือที่ว่าง <span class="cnumber" id="1801_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1801' class='dropdown-content'>
                        <li><a id="18011">-</a></li>
                        <li><a id="18012">-</a></li>
                        <li><a id="18013">-</a></li>
                        <li><a id="18014">-</a></li>
                        <li><a id="18015">-</a></li>
                        <li><a id="18016">-</a></li>
                    </ul>
                    <p>
                        <label>
                            <input name="time" value="1831" type="checkbox" class="filled-in" />
                            <span class="timetag">18.31 - 19.00</span>
                        </label>
                        <span class="atag dropdown-trigger" data-target="dropdown1831">เหลือที่ว่าง <span class="cnumber" id="1831_c">6</span> ที่</span>
                    </p>
                    <ul id='dropdown1831' class='dropdown-content'>
                        <li><a id="18311">-</a></li>
                        <li><a id="18312">-</a></li>
                        <li><a id="18313">-</a></li>
                        <li><a id="18314">-</a></li>
                        <li><a id="18315">-</a></li>
                        <li><a id="18316">-</a></li>
                    </ul>
                </div>
                <div class="col s12" style="margin-left: 50px;">
                    <h6>นับเวลาถอยหลัง</h6>
                    <form id="fews" action="controller.php" method="POST">
                    <?php echo '<input style="width: 150px" type="text" name="ndate" class="datepicker" value="'.$date.'">';?>
                    <?php echo '<input style="margin-left:50px; width: 150px" name="ntime" type="text" class="timepicker" value="'.$time.'">';?>
                    <a style="width: 355px;margin-top: 10px" onclick="$('#fews').submit()" class="waves-effect waves-light btn-large blue" style="width: 100%" href="#"><i class="material-icons left">lock_open</i>ตั้งเวลา</a>
                    </form>
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
        $('.dropdown-trigger').dropdown();
        $('.datepicker').datepicker();
        $('.timepicker').timepicker();
        updatecolor();
    });
    $(".filled-in").change(function() {
        $(".filled-in").prop('checked', false);
        $(this).prop('checked', true);
    });
    setInterval(retrieve,100);
</script>
</body>
</html>
<?php } ?>