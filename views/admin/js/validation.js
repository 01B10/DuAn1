function validate() {
    let name = document.querySelector(".name").value.trim();
    let err_name = checkname(name);
    document.querySelector(".name_err").innerText = err_name;

    let email = document.querySelector(".email").value.trim();
    let err_email = checkemail(email);
    document.querySelector(".email_err").innerText = err_email;

    let phone = document.querySelector(".phone").value.trim();
    let err_phone = checkphone(phone);
    document.querySelector(".phone_err").innerText = err_phone;

    let pass = document.querySelector(".pass").value.trim();
    let err_pass = checkPass(pass);
    document.querySelector(".pass_err").innerText = err_pass;
    
    let confirmPass = document.querySelector(".confirm-pass").value.trim();
    let err_confirm = checkConfirm(confirmPass);
    document.querySelector(".ConfirmPass_err").innerText=err_confirm;

}

function checkname(nameValue) {
    if (nameValue.length == 0) {
        return "Tên không được để trống";
    }

    let arr = nameValue.split(" ");
    let arr2 = arr.filter(function (item) {
        return item != "";
    })
    if (arr2.length <= 1) {
        return "Họ tên cần ít nhất 2 từ";
    }
    return "";
}

function checkemail(emailValue) {
    if (emailValue.length == 0) {
        return "email không được để trống"
    }
    if (emailValue.includes('@') == false) {
        return "Không đúng định dạng email"
    }
    if (emailValue.includes('.') == false) {
        return "Không đúng định dạng email"
    }
    if (emailValue.startsWith('@') == true) {
        return "Không đúng định dạng email"
    }
    if (emailValue.endsWith('@') == true) {
        return "Không đúng định dạng email"
    }
    if (emailValue.startsWith('.') == true) {
        return "Không đúng định dạng email"
    }
    if (emailValue.endsWith('.') == true) {
        return "Không đúng định dạng email"
    }
    if (chechNum(emailValue, '@', 1) == false) {
        return "Không đúng định dạng email"
    }
    return "";
}

function chechNum(str, char, expected) {
    let count = 0;
    for (const character of str) {
        if (character == char) {
            count++;
        }
    }
    return count == expected;
}

function checkphone(phoneValue) {
    if (phoneValue.length == 0) {
        return "số đt không được để trống"
    }
    if (!isNaN(phoneValue) == false) {
        return " Số đt không chứa chữ"
    }

    if (phoneValue.startsWith('0') == false) {
        return "không đúng định dạng"
    }
    if (phoneValue.length <= 10) {
        return " số đt phải có ít nhất 10 số"
    }
    return "";
}
function checkPass(passValue){
    if(passValue.length ==0){
        return "Password không được để trống"
    }
    if(passValue.length < 6 ){
        return "password có ít nhất 6 kí tự"
    }
    if(passValue.includes('@','.','#','^')==false){
        return "phải có kí tự đặc biệt"
    }

    
    if(passValue.isNaN == true){
        return "password phải có số"
    }
    return "";
}

function checkConfirm(confirmValue){
    if(confirmValue.length == 0){
        return "Không được để trống"
    }
    return "";
}


// hide eye 

const passField = document.querySelector(".pass");
    const passConfirm=document.querySelector(".confirm-pass");
    const showBtn = document.querySelector("span i");
    showBtn.onclick = (() => {
        if (passField.type == "password") {
            passField.type = "text";
            passConfirm.type = "text";
            showBtn.classList.add("hide-btn");
        } else {
            passField.type = "password";
            passConfirm.type ="password";
            showBtn.classList.remove("hide-btn");
        }
    });

    (function(){
        const form=["cursive","sans-serif","serif","mốnpace"];
        let capchaValue="";
        function generateCapcha(){
            let value=btoa(Math.random()*1000000000);
            value=value.substr(0,5+Math.random()*5);
            capchaValue=value;
        }
        function setCapcha(){
            capchaValue.split(""),Map((char)=>
            {
                const rotate=-20 + Math.trunc(Math.random()*30);
                const font =Math.trunc(Math.random()*font.length);
                return `<span style="transform:rotate(${rotate}deg);
                font-family:${fonts[font]}">
                ${char}</span>`;
            }).join("");
            document.querySelector(".preview").innerHTML=html;
        }
        function initCapcha(){
            document.querySelector(".capcha-refresh").addEventListener("click",function(){
                generateCapcha();
                setCapcha();
            });
            generateCapcha();
            setCapcha();
        }
        initCapcha();
    })();