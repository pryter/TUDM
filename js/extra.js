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