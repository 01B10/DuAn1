<main>
        <form action="">
            <h2>Update Customer</h2>
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
                    <!-- <input type="text" name="" id=""> -->
                    <select name="" id="role">
                        <option value="0">Chức vụ</option>
                    </select>
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
                <button class="submit">Thay đổi</button>
            </div>
        </form>
    </main>
</div>
<script>
    const passField = document.querySelector(".pass");
    const showBtn = document.querySelector(".show-btn i");
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
