
</body>
<script>
    var slider = document.querySelectorAll(".list > a");
    var drop = document.querySelectorAll(".drop");
    var dropdown = document.querySelectorAll(".dropdown");
    var option = document.querySelectorAll(".action i");
    var chose = document.querySelectorAll(".action div");
    var action = document.querySelectorAll(".action");

    for(let i = 0; i < drop.length; i++){
        dropdown[i].style.height = "0px";
        drop[i].addEventListener("click",()=>{
            for(let k = 0; k < i; k++){
                dropdown[k].style.height = "0px";
            }
            for(let k = i+1; k < drop.length; k++){
                dropdown[k].style.height = "0px";
            }
            if(dropdown[i].style.height == "0px"){
                dropdown[i].style.height = "84px";
            }else{
                dropdown[i].style.height = "0px";
            }
        });
    }

    for(let i = 0; i < slider.length; i++){
        slider[i].addEventListener("click",(e)=>{
            e.preventDefault();
            sessionStorage.setItem("index",i);
            if(i == 0) window.location.href = "dashboard";
            for(let k = 0; k < i; k++){
                slider[k].classList.remove("active");
            }
            for(let k = i+1; k < slider.length; k++){
                slider[k].classList.remove("active");
            }
            slider[i].classList.add("active");
        });
    }
    slider[Number(sessionStorage.getItem("index"))].classList.add("active");
    
    for(let i = 0; i < option.length; i++){
        option[i].addEventListener("click",()=>{
            chose[i].classList.remove("hidden");
        });
        action[i].addEventListener("mouseleave",()=>{
            chose[i].classList.add("hidden");
        });
    }
</script>
</html>