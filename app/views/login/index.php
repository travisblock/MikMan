<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>public/css/style.css">
  </head>
  <body>
    <div class="container-luar">
      <div class="container-login" id="container">
        <div class="form-container sigin-container">
          <form method="post" action="<?= BASEURL; ?>welcome/loginDashboard">
            <div class="err-place">
              <?= Msg::show(); ?>
            </div>
            <h1>Login Account</h1>
            <span>Use username and password</span>
            <input type="text" name="user" placeholder="username">
            <input type="password" name="pass" placeholder="password">
            <a class="forgot"></a>
            <button class="tombol" type="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
    <script>
        window.setTimeout(function(){
          var msg = document.getElementById('msg');
          if(msg !== null)
            msg.classList.toggle('hide');
        }, 3000);

        window.setTimeout(function(){
          var msg = document.getElementById('msg');
          if(msg !== null)
            msg.remove();
        }, 4000);
    </script>
  </body>
</html>
