<br/>
<div class="container">
  <form action="" method="post">
    <div class="row">
      <h2 style="text-align:center">Login to Mongoose Dashboard</h2>
      <div class="col text-center">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
      </div>
    </div>
  </form>
  <br/>
    <div class="row">
      <h3 style="text-align:center">Login with Google</h2>
      <div class="col text-center">
        <?php echo '<a href="'.$client->createAuthUrl().'" class="google btn"><i class="fa fa-google fa-fw">'; ?>
          Login with Google
        </a>
      </div>
    </div>
  </div>
</div>