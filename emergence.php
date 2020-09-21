<?php
session_start();
if(isset($_SESSION["user"]) && $_SESSION["user"] == "admin") {
    $f = fopen("database/users.dbs","w");
    fwrite($f,"DM16301|REJjq!DM16302|4sYyw!DM16303|RQjAQ!DM16304|BnB6R!DM16305|vNc2A!DM16306|zxJVH!DM16307|Ssd9r!DM16308|83rWr!DM16309|XbHeH!DM16310|p2eMq!DM16311|atu9G!DM16312|5HyMC!DM16313|xqYBQ!DM16314|fawTj!DM16315|FAc7d!DM16316|dd3JX!DM16317|dfdwv!DM16318|GPGpH!DM16319|9QNpA!DM16320|b4ytG!DM16321|NsQBf!DM16322|evwbh!DM16323|pPxbs!DM16324|nTKkx!DM16325|huqkg!DM16326|A8Pqu!DM16327|xyLLE!DM16328|fQqFA!DM16329|6UjE4!DM26301|9hJ4V!DM26302|YntC8!DM26303|S9hKe!DM26304|b7mrM!DM26305|DqKHV!DM26306|uVdEL!DM26307|fxJCD!DM26308|yCY6u!DM26309|xY8ET!DM26310|LnUKM!DM26311|E7HgG!DM26312|NSh4M!DM26313|zUXXN!DM26314|dQExx!DM26315|pkqpt!DM26316|xpx2A!DM26317|EDmCz!DM26318|3MeUU!DM26319|NHFNF!DM26320|PrJYh!DM26321|USAev!DM26322|JJvAr!DM26323|FQHJk!DM26324|hrYSV!DM26325|hVGv3!DM26326|NL4eJ!DM26327|zY3v2!DM26328|xjTDb!DM26329|7stSj!DM26330|xWWxq!DM26331|Mmabx!DM26332|jxNeQ!DM26333|dwqp3!DM26334|w5mSs!DM26335|mrNtj!DM26336|fErcH!DM26337|NHTHV!DM26338|Wz4bX!DM26339|h98jd!DM26340|T9LSV!DM26341|3VbUf!DM26342|qeWM4!DM26343|uRrEg!DM26344|5ujVy!DM26345|QBA8v!DM26346|G2p9K!DM26347|sEVGA!DM26348|WzKm8!DM26349|xt5nU!DM26350|gUc9j!DM26351|rFDaS!DM26352|wrmY4!DM26353|eWKjK!DM26354|bycHk!DM26355|6sqH2!DM26356|t8nWY!DM26357|TceAp!DM26358|a6kEg!DM26359|trsBz!DM26360|naDv8!DM26361|TvkhL!DM26362|zgYDa!DM26363|NapTB!DM26364|aXsUJ!DM26365|H8kLp!DM26366|5PE8D!DM26367|667gt!admin|tucmc2563!");
    fclose($f);
    $f2 = fopen("database/time.dbs","w");
    fwrite($f2, "");
    fclose($f2);
    echo "Rollback Completed";
}else{?>
    <html>
    <body>
    <form action="userpage.php" method="POST">
        <input name="user" value="admin" type="text" style="display: none">
        <br>
        <input name="code" placeholder="password" type="password">
        <input type="submit">
    </form>
    </body>
    </html>
<?php
}
?>