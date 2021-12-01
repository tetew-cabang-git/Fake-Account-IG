<!DOCTYPE html>
<html>

<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<head>
  <title>Your search not found</title>
  <style>
    body {
      margin: 0;
      background-color: #202020;
      font-family: 'Roboto Slab', serif;
    }

    .container {
      padding-top: 50px;
      width: 50vh;
      height: 50vh;
      margin-left: auto;
      margin-right: auto;
      color: white;
      text-align: center;
      justify-content: center;
    }

    .isi img {
      border-radius: 50px;
    }

    .button {
      color: #811F1F;
      background-color: #DCC0C0;
      border-radius: 5px;
    }

    a,
    a:hover,
    a:focus,
    a:active {
      text-decoration: none;
      color: inherit;
    }

    .pattern {
      position: relative;
      background-color: black;
      z-index: -1;
    }

    .pattern:before {
      content: "";
      position: absolute;
      bottom: -44vh;
      left: 0;
      width: 100%;
      height: 150px;
      background: url('Vector1.png');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>

<body>
  <div class="container">
    <img src="Group1.png" alt="Whoopsie">
    <h2>There's not result for:</h2>
    <h3 style="color: #D06666;">@<?php session_start(); echo $_SESSION['username']; ?></h3>
    <p>
      Suggestions:
      <br>
      Username you search did not exist.
<?php session_destroy(); ?>
    </p>
    <a href="../frontend/home.php">
      <div class="button">
        Check another account.
      </div>
    </a>
  </div>
  <div class="pattern"></div>
</body>

</html>