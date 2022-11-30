</body>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#myID", {});

        flatpickr("#myID",{
            enableTime: false,
            dateFormat: "d-m-Y",
            minDate: "today",
        });
    </script>
    <script>
        let indext = 1;
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

        sessionStorage.removeItem("index");
    </script>

</html>