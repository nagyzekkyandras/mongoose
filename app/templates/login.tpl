{* Smarty *}
<!DOCTYPE html>
<html>
    <head>
        <title>Mongoose</title>
        <meta charset="utf-8">
        <!-- Bootstrap stuff -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="./public/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- My Stuff -->
        <link href="./public/mystyle.css" rel="stylesheet">
    </head>
    <body>
        <br/>
        <div class="container">
          <form action="" method="post">
            <div class="row">
              <h2 style="text-align:center">Login to Mongoose Dashboard</h2>
              <div class="col text-center">
                <input id="email" type="email" name="email" placeholder="Email" required>
                <input id="password" type="password" name="password" placeholder="Password" required>
                <input id="loginButton" type="submit" value="Login">
              </div>
            </div>
          </form>
          <br/>
            <div class="row">
              <h3 style="text-align:center">Login with Google</h2>
              <div class="col text-center">
                <a href="{$action}" class="google btn"><i class="fa fa-google fa-fw">
                  Login with Google
                </a>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>