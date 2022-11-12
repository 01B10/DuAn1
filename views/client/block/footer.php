</body>
    <script>
        let indext = 1;
        var form = document.querySelector(".typearea");
        var sendbtn = document.querySelector(".sendbtn");
        var inputfield = document.querySelector(".inputfield");
        var chatBox = document.querySelector(".chat-box");
        run = function () {
            let imgs = ["./views/img/bn1.jpg", "./views/img/bn2.jpg", "./views/img/bn3.jpg"];
            document.getElementById('img').src = imgs[indext];
            indext++;
            if (indext == 3) {
                indext = 0;
            }
        }
        setInterval(run, 2800);

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

        
        setInterval(() => {
        	let xhr = new XMLHttpRequest();
        	xhr.open("POST", "views/client/assets/chat/getchat.php", true);
        	xhr.onload = () => {
        		if((xhr.readyState === XMLHttpRequest.DONE) && (xhr.status === 200)){
        			chatBox.innerHTML = xhr.response;
        			// if(!chatBox.classList.contains('active')){
        			// }
        		}
        	}
        	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        	xhr.send('incoming_id='+1);
        }, 500)
    </script>

</html>