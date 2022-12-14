<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/addCustomer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <main>
        <form action="">
            <h2>Add Customer</h2>
            <div class="grid">
                <div class="name">
                    <input type="text">
                    <label for="">Họ và tên</label>
                </div>
                <div class="province">
                    <label>Tỉnh thành</label>
                    <select name="" id="province">
                        <option value="0">Chọn tỉnh</option>
                    </select>
                </div>
                <div class="phone">
                    <input type="text">
                    <label for="">Số điện thoại</label>
                </div>
                <div class="Email">
                    <input type="text" name="" id="">
                    <label for="">Email</label>
                </div>
                <div class="password">
                    <input type="password" class="pass" name="" id="">
                    <label for="">Password</label>
                    <span class="show-btn"><i class="fas fa-eye"></i></span>
                </div>

                <div class="role">
                    <input type="text" name="" id="">
                    <label for="">Chức vụ</label>
                </div>


            </div>
            <div class="gender">
                <label for="">Giới tính</label>
                <div class="gender-choose">
                    <label for="nam"><input id="nam" type="radio" name="radio"> Nam</label>
                    <label for="nu"><input id="nu" type="radio" name="radio"> Nữ</label>
                    <label for="other"><input id="other" type="radio" name="radio"> Khác</label>
                </div>
            </div>
            <div class="button">
                <button class="submit">Thêm mới</button>
            </div>
        </form>
    </main>
</body>
<script src="../js/provinces.js"></script>
<script>
    let content = '';
    for (const tinh of provinces) {
        content += `<option value="${tinh.name}">${tinh.name}</option>`;
    }
    document.querySelector('#province').innerHTML = content;
</script>
<script>
    const passField = document.querySelector(".pass");
    const showBtn = document.querySelector("span i");
    showBtn.onclick = (() => {
        if (passField.type == "password") {
            passField.type = "text";
            showBtn.classList.add("hide-btn");
        } else {
            passField.type = "password";
            showBtn.classList.remove("hide-btn");
        }
    });
</script>


</html>