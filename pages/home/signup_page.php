<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
    <link rel="stylesheet" href="../../css/inscription.css">
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
  </head>
  <body>
    <main>
         <a href="./login_page.php"><button> Retour </button></a>
        <h1 style="text-align: center;"> Signup </h1>
        <div class="formulaire">
            <form action="../../config/inscription.php" method="post">
                <p>First name: <input type="text" name="firstname" /></p>
                <p>Name: <input type="text" name="name" /></p>
                <p>Username: <input type="text" name="username" /></p>
                <p>Email: <input type="mail" name="email" /></p>
                <p>Password: <input type="password" name="password" /></p>
                <p><input type="submit" /></p>
                </form>
        </div>

    </main>
	<script src="index.js"></script>
  </body>
</html>