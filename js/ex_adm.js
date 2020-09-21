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
        url: "readddbb.php",
        type: "POST",
        data: {task: "request"},
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