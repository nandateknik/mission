<!DOCTYPE html>
<html lang="en">
<?php if ($this->session->login) 
{
    redirect(base_url("aplikasi"));
}
?>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('assets/sigin/') ?>style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?= base_url('home/login') ?>" method="post" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <?= $this->session->flashdata('register'); ?>
          <?php echo validation_errors('<small style="color:red;">', '</small>'); ?>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="username" required autocomplete="off" placeholder="username" name="username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" required autocomplete="off" name="password" placeholder="Password" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="<?= base_url('home/register') ?>" method="post" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" required value="<?php echo set_value('nama'); ?>" name="nama" placeholder="Nama lengkap" />
          </div>
          <?php echo form_error('nama', '<small style="color:red;">', '</small>'); ?>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="username" required value="<?php echo set_value('username'); ?>" name="username" placeholder="username" />
          </div>
          <?php echo form_error('username', '<small style="color:red;">', '</small>'); ?>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input autocomplete="off" required type="password" value="<?php echo set_value('password'); ?>" name="password" placeholder="Password" />
          </div>
          <?php echo form_error('password', '<small style="color:red;">', '</small>'); ?>
          <input type="submit" class="btn" value="Sign up" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>New here ?</h3>
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
            ex ratione. Aliquid!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="<?= base_url('assets/sigin/') ?>img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="<?= base_url('assets/sigin/') ?>img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="<?= base_url('assets/sigin/') ?>app.js"></script>
</body>

</html>