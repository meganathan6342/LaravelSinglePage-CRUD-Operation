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