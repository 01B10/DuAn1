</body>
    <script>
        let indext = 1;
        run = function () {
            let imgs = ["./views/img/bn1.jpg", "./views/img/bn2.jpg", "./views/img/bn3.jpg"];
            document.getElementById('img').src = imgs[indext];
            indext++;
            if (indext == 3) {
                indext = 0;
            }
        }
        setInterval(run, 2800);
    </script>

</html>