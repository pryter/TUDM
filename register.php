<?php
session_start();
require ("system/database.php");

if(isset($_POST["user"]) && isset($_POST["code"])){
    $dbs = new database("database/users.dbs");
    if($dbs->isin($_POST["user"],$_POST["code"]))
    {
        $_SESSION["code"] = $_POST["code"];
        $_SESSION["user"] = $_POST["user"];
    }else{
        header("Location: index.php?action=error");
    }
}else{
    if(!isset($_SESSION["code"]))
    {
        header("Location: index.php");
    }
}

if(isset($_SESSION["code"])){
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="UTF-8">
    <title>ระบบลงทะเบียนเวลาการคัดคทากร</title>
    <style>
        .cpink{
            background-color: #f5899b;
        }
        .brand-logo{
            font-size: 1.5rem!important;
        }
        .codebox{
            margin: auto;
            max-width: 550px;
            margin-top: 60px;
        }
        body {
            background-color: #f5899b;
            font-family: 'Kanit', serif;
        }
        .text-section{
            margin: 0.5rem 0 1rem 0;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            background-color: #fff;
            line-height: 1.5rem;
            padding: 15px 25px 15px 15px;
            width: 100%
        }
        .atag{
            font-size: 1rem;
            color: #9e9e9e;
        }
        .timetag{
            width: 130px;
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
                arr.forEach(function (value) {
                    var item = value.split("|");
                    if(isNaN(stuff[item[1]])){
                        stuff[item[1]] = 1;
                    }else{
                        stuff[item[1]] += 1;
                    }
                });
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
        var checkall = $('.filled-in').is(':checked');
        if(checkall){
            document.getElementById("submitb").classList.remove("disabled");
        }else{
            document.getElementById("submitb").classList.add("disabled");
        }

    }
    function submit(){
        $.ajax({
            type: "POST",
            url: "pushdata.php",
            data: $("#timeselect").serialize(),
            success: function(result)
            {
                window.location = "register.php";
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
            <h4 class="center">ลงทะเบียนเวลาคัดคทากร</h4>
        </div>
        <div class="text-section grey lighten-4 red-text">
            เลือกเวลาคัดอย่างระมัดระวัง ไม่สามารถแก้ไขได้ในภายหลัง มีปัญหาติดต่อได้ที่คณะกรรมการกิจกรรมพัฒนาผู้เรียน IG: tucmc_official
        </div>
        <div class="row">
            <h5>เลือกช่วงเวลาในการคัด</h5>
            <form id="timeselect">
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
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1751_c">6</span> ที่</span>
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
                        <input name="time" value="1816" type="checkbox" class="filled-in" />
                        <span class="timetag">18.16 - 18.45</span>
                    </label>
                    <span class="atag">เหลือที่ว่าง <span class="cnumber" id="1816_c">6</span> ที่</span>
                </p>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col s12">
                <a onclick="submit()" id="submitb" class="waves-effect waves-light btn-large blue disabled" style="width: 100%"><i class="material-icons left">lock</i>ยืนยันเวลา</a>
            </div>
        </div>

    </div>
</main>
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
    setInterval(retrieve,100);
</script>
</body>
</html>
<?php
}
    ?>