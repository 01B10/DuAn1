</body>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#myID", {});

        flatpickr("#myID",{
            enableTime: true,
            dateFormat: "d-m-Y"
        });
    </script>
    <script>
        let indext = 1;
        var form = document.querySelector(".typearea");
        var sendbtn = document.querySelector(".sendbtn");
        var inputfield = document.querySelector(".inputfield");
        var chatBox = document.querySelector(".chat-box");
        run = function () {
            let imgs = ["<?php echo _WEB_ROOT_."/views/client/img/banners/bn1.jpg"?>", 
            "<?php echo _WEB_ROOT_."/views/client/img/banners/bn2.jpg"?>", 
            "<?php echo _WEB_ROOT_."/views/client/img/banners/bn3.jpg"?>"];
            document.getElementById('img').src = imgs[indext];
            indext++;
            if (indext == 3) {
                indext = 0;
            }
        }
        setInterval(run, 2800);

        if(sendbtn != null){
            sendbtn.addEventListener("click",()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST","views/client/assets/chat/insertchat.php",true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
                    inputfield.value = "";
                }
            }
            let formData = new FormData(form);
            xhr.send(formData);
            });
        }

        
        setInterval(() => {
        	let xhr = new XMLHttpRequest();
        	xhr.open("POST", "views/client/assets/chat/getchat.php", true);
        	xhr.onload = () => {
        		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
                        if(chatBox != null){
                            chatBox.innerHTML = xhr.response;
                        }
        		}
        	}
        	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        	xhr.send('id='+1);
        }, 500)

        sessionStorage.removeItem("index");
    </script>

</html>