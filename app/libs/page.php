<?php

function pageHeader()
{
    echo '<!DOCTYPE html>
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
        <body>';
}

function pageNavbarAdmin()
{
  echo '<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>';
}

function pageNavbarUser()
{
  echo '<nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Main</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>';
}

function htmlTable($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    echo '<table class="table"><thead><tr>
    <th scope="col">ID</th>
    <th scope="col">NAME</th>
    <th scope="col">EMAIL</th>
    <th scope="col">AUTH TYPE</th>
    <th scope="col">PERMISSION</th>
    <th scope="col">CREATE DATE</th>
    <th scope="col">LAST LOGIN</th>
    </tr></thead>' . implode('', $rows) . "</table>";
}

function profileTable($data = array())
{
    $rows = array();
    foreach ($data as $row) {
        $cells = array();
        foreach ($row as $cell) {
            $cells[] = "<td>{$cell}</td>";
        }
        $rows[] = "<tr>" . implode('', $cells) . "</tr>";
    }
    echo '<table class="table"><thead><tr>
    <th scope="col">NAME</th>
    <th scope="col">EMAIL</th></tr></thead>' . implode('', $rows) . "</table>";
}

function pageFooter()
{
    echo '</body></html>';
}
