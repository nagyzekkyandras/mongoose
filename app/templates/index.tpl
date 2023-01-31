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
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <div class="container-fluid">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Main</a>
            </li>
            {if $isAdmin}
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin</a>
            </li>
            {/if}
            <li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
    </nav>
    {if $isProfilePage}
        {include file='profile.tpl'}
    {/if}
    {if $isAdminPage}
        {include file='admin.tpl'}
    {/if}
    <footer>
    </footer>
    </body>
</html>