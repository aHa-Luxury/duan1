<main>
    <div class="main-register">

        <!-- form đăng nhập -->
    
        <div class="login">
          <h2>ĐĂNG KÝ</h2>
          <form action="" method="post">
            Họ<br>
            <input type="text" placeholder="Họ" name="ho">
            <hr>
            Tên<br>
            <input type="text" placeholder="Tên" name="ten" >
            <hr>
            Email<br>
            <input type="email" placeholder="Email" name="email" >
            <hr>
           
            Mật khẩu<br>
            <input type="text" placeholder="Mật khẩu" name="password" >
            <hr>  
           
              <?= $_COOKIE['message'] ?? "" ?>
        
            <button type="submit" name="submit">Đăng ký</button>
          </form>
          <div class="dacotk" style="margin-top: 20px;">
            Bạn đã có tài khoản? <a href="?act=login">Đăng nhập</a>
          </div>
        </div>
      </div>
 </main>
