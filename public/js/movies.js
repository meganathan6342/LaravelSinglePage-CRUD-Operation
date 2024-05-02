let inp1 = document.getElementById("inp1");

inp1.addEventListener("input",()=>{
    let inp = document.getElementById("inp1").value;
    for(i = 0; i < inp.length; i++)
    {
        if(!((inp[i]<='z' && inp[i]>='a') || (inp[i])<='A' && inp[i]>='Z'))
        {
            let li = document.querySelector("p");
            li.textContent="alphabets only allowed in movie name";
        }
        else{
            let li = document.querySelector("p");
            li.textContent="";
        }
    }
});

function shuffle(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir = "asc",
        switchcount = 0;
    table = document.getElementById("mytable");
    switching = true;
    while (switching) {
        switching = false;
        rows = document.querySelectorAll("#mytable tr");
        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].querySelectorAll("#mytable td")[n];
            console.log(rows[2]);
            y = rows[i + 1].querySelectorAll("#mytable td")[n];
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

window.onload = function(){
    var warnings = document.getElementsByClassName("warning");
    if(warnings)
    {
        setTimeout(()=>{
            for(i = 0; i < warnings.length; i++)
            {
                warnings[i].textContent = "";
            }
        }, 3000);
    }
}