<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
         <a href="../index.php"><button> Retour </button></a>
        <h1 style="text-align: center;"> Login </h1>
        <div class="formulaire">
            <form action="../php/verification.php" method="post">
                <p>Username: <input type="text" name="username" /></p>
                <p>Password: <input type="password" name="password" /></p>
                <p><input type="submit" /></p>
              </form>
        </div>
        <a href="signup_page.php"><p style="text-align: center;">inscription</a>
        <?php
              $url = "http://";      
              $url.= $_SERVER['HTTP_HOST'];    
              $url.= $_SERVER['REQUEST_URI'];
              $url_components = parse_url($url);
                
              if(!empty($url_components['query'])){
                parse_str($url_components['query'], $params);
                if ($params['error'] === '1'){ ?>

                <div class="popup_error">
                  <h2> Wrong password </h2>
                </div>

              <?php } 
              }
              else {

              }

              
           ?>   



    </main>
	<script src="index.js"></script>
  </body>
</html>