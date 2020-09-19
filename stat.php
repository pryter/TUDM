<?php
if(isset($_COOKIE["QUE"]))
{
    $ref = ["1230" => "12.30 - 13.00","1301" => "13.01 - 13.30","1331" => "13.31 - 14.00","1401" => "14.01 - 14.30","1431" => "14.31 - 15.00","1501" => "15.01 - 15.30","1531" => "15.31 - 16.00","1601" => "16.01 - 16.30","1631" => "16.31 - 17.00","1715" => "17.15 - 17.45","1746" => "17.46 - 18.15","1816" => "18.16 - 18.45","1630" => "16.30 - 17.00","1701" => "17.01 - 17.30","1731" => "17.31 - 18.00","1801" => "18.01 - 18.30","19.00" => "18.31 - 19.00"];
}else{
    header("Location: index.php");
}
if(substr($_COOKIE["USER"],0,3) == "DM1")
{
    $date = 24;
}
if(substr($_COOKIE["USER"],0,3) == "DM2")
{
    $date = 25;
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
    <title>ระบบลงทะเบียนเวลาการคัดคทากร</title>
</head>
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
        </ul>
        <a href="#" data-target="slider" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
</nav>
<ul id="slider" class="sidenav">
    <li class="active"><a>หน้าแรก</a></li>
    <li><a href="contact.html">ติดต่อเรา</a></li>
</ul>
<main class="container">
    <div class="z-depth-1 card-panel codebox">
        <div class="row">
            <h4 class="center">ลงทะเบียนเสร็จสิ้น</h4>
        </div>
        <div class="text-section grey lighten-4 blue-text" style="font-size: 18px;text-align: center">
            ช่วงเวลาคัดของคุณ: <?php echo $ref[$_COOKIE["QUE"]]; ?> วันที่ <?php echo $date;?> กันยายน พ.ศ.2563
        </div>
        <div class="text-section grey lighten-4 red-text">
            <p>*หมายเหตุ* ผู้สมัครควรมาก่อนเวลาคัด 10-15 นาที เนื่องจากระยะเวลาการคัดอาจมีความไม่แน่นอนและสามารถเปลี่ยนแปลงได้ตามดุลยพินิจของคณะกรรมการ</p>
            <p>ทั้งนี้หากผู้สมัครไม่มาตามเวลาที่เลือกไว้จะถือว่าเป็นการสละสิทธิ์</p>
            <p>มีข้อสงสัยเพิ่มเติมสามารถติดต่อได้ที่ คณะกรรมการงานกิจกรรมพัฒนาผู้เรียน IG: tucmc_official</p>
        </div>

    </div>
</main>
<footer style="padding-top:0px!important;margin-top: 40px;background-color: #f5899b" class="page-footer">
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
    });
</script>
<script>
    $("#s_check").on("click",function () {
        $("#check").submit();
    });
</script>
</body>
</html>