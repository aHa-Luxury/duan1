<main>
    <div class="main-login">

        <!-- form đăng nhập -->
    
        <div class="login">
          <h2>ĐĂNG NHẬP</h2>
          <form action="" method="post">
            Email<br>
            <input type="email" name="email" placeholder="Email" required>
            <hr>
            Mật khẩu<br>
            <input type="text" name="password" placeholder="Mật khẩu" required>
            <span style="color:red"><?= $_COOKIE['message'] ?? "" ?></span>
            <hr>
            <button type="submit" name="dangnhap">Đăng nhập</button>
          </form>
          <p style="text-align:center">hoặc đăng nhập bằng</p>
          <div class="icons" >
            <div class="facebook" >
              <i class="fa-brands fa-facebook" style="width: 3%;"></i>
              <a href="">
                <h4>Facebook</h4>
              </a>
            </div>
            <div class="google" >
              <i class="fa-brands fa-google" style="width: 3%;"></i>
              <a href="">
                <h4>Google</h4>
              </a>
            </div>
          </div>
          <div class="datlai_matkhau">
            Quên mật khẩu? <a href="">Đặt lại mật khẩu</a>
          </div>
    
        </div>
        <div class="register">
          <h2>ĐĂNG KÝ</h2>
          <h4>Thiết lập tài khoản để xem và cập nhật chi tiết thông tin tài khoản, theo dõi trạng thái và lịch sử đơn đặt
            hàng của bạn.</h4>
          <a href="?act=register"><button>Đăng ký tài khoản</button></a>
        </div>
    
      </div>
  </main>