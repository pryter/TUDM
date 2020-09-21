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
        url: "readdb.php",
        type: "POST",
        data: {task: "request"},
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
    window.mcount = 0;
    window.gcount = 0;
    $(".cnumber").each(function(){
        var key = this.id.replace("_c","");
        this.innerText = 6 - toint(obj[key]);
        if(toint(key) === 1630 || toint(key) === 1701 || toint(key) === 1731 || toint(key) === 1801 || toint(key) === 1831)
        {
            window.mcount += toint(obj[key]);
        }else{
            window.gcount += toint(obj[key]);
        }
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
    if(window.mcount >= 24)
    {
        document.getElementById("lastm").disabled = false;
    }
    if(window.gcount >= 66)
    {
        document.getElementById("lastg").disabled = false;
    }

}
function submit(){
    $.ajax({
        type: "POST",
        url: "senddata.php",
        data: $("#timeselect").serialize(),
        success: function(result)
        {
            window.location = "select.php";
        }
    });

}