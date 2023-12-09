<?php
ini_set('display_errors', 1); // Turn on  error displaying
ini_set('log_errors', 0); // don't Log errors instead of displaying them
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
session_start();

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Database connection using PDO
try {
  // Replace 'your_host', 'your_database', 'username', and 'password' with your actual database details
  $pdo = new PDO('mysql:host=your_host;dbname=your_database', 'username', 'password');

  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Connection is successfully established
  echo "Connected successfully";
} catch (PDOException $e) {
  // Handle connection error
  echo "Connection failed: " . $e->getMessage();
}

// CSRF Token validation for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
    // Handle the error, token mismatch
  }
  // Proceed with form processing
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Student Registration System</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/css/stylesheet.css">

</head>


<body>
  <!-- Header -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Student Course Registation</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="faq.php">FAQs</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>

  <!-- Main content -->


  <main role="main">
    <div class="container">
      <div class="jumbotron">

        <h1 class="display-4 text-white">⏰ Welcome to the University Course Registration App 📖</h1>
        <br>
        <h4>Get around campus with ease. Find your next course. Plan out your semester.</h4>
        <h4>More updates to functionality coming soon. Please check back again soon. 👷🏾‍♀️🚧👷🏻</h4>
        <br>
      </div>
      <!-- Login section -->
      <h2 class="text-center">Log in</h2>
      <div class="form-container">
        <form method="POST" action="authenticate.php">
          <!-- CSRF token -->
          <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

          <div>
            <label for="username">email:</label>
            <input type="text" id="email" name="email" required>
          </div>
          <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
          </div>
          <div>
            <button type="submit">Login</button>
            <a href="registration.php">Register here</a>
          </div>
        </form>

      </div>
      </form>
    </div>
  </main>

  <!-- Footer -->
  <footer class="bg-darker text-center text-white container">
    <div class="footer-copyright text-center py-3">
      <!-- Footer links -->
      <a href="privacy-policy.php">Privacy Policy</a> &middot; <a href="terms-of-service.php">Terms of Service</a>
      &nbsp;&copy;
      <?php echo date("Y"); ?> University Scheduling App. Super Coders All Rights Reserved.
    </div>
  </footer>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

</body>

</html>