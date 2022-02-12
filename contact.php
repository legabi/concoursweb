<?php include 'nav.php'; ?>
<?php include 'database.php';
require "/home/gabi/myplugins/api/assets/mail.php";
?>
<?php
if (!empty($_POST)) {
  $mail = $_POST['mail'];
  $message = $_POST['message'];
  $object = $_POST['object'];
  if (!empty($mail) && !empty($message) && !empty($object)) {
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = "Votre email n'est pas valide";
    }
    if (empty($errors)) {
      $req = $db->prepare("INSERT INTO contact SET mail = ?, message = ?, object = ?, date = NOW()");
      $req->execute([$mail, $message, $object]);
      send_mail($mail, "Confirmation", "Vous avez envoyé un message au site https://agamiweb.ml/");
      header("Location: /");
    }
  } else {
    $errors["field"] = "Veuillez remplir tous les champs";
  }
}
?>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgamiWeb - Accueil</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/logo.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <meta name="description" content="AgamiWeb vous présente son site !">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/index.css">
    <meta property="og:title" content="AgamiWeb - Acceuil"/>
    <meta property="og:url" content="https://agamiweb.ml/">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:image" content="/img/logo.png"/>
    <meta property="og:site_name" content="AgamiWeb"/>
    <meta property="og:description" content="AgamiWeb vous présente son site !"/>
    <meta name="theme-color" content="#0046FF"/>
</head>

<body>

  <style>
    .valid {
      color: green;
    }

    .valid:before {
      position: relative;
      content: "✅";
    }

    .invalid {
      color: red;
    }

    .invalid:before {
      position: relative;
      content: "❌";
    }
  </style>

  <section class="header">
    <h1>Nous contacter</h1>
  </section>

  <main role="main" class="container">
    <div class="starter-template">

      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
          <p>Vous n'avez pas remplis le fomulaire correctement</p>
          <ul>
            <?php foreach ($errors as $error) : ?>
              <li><?= $error; ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <div id="message">
        <p id="length_object">Votre objet ne peut pas être vide</p>
        <p id="length_mail">Votre mail ne peut pas être vide</p>
        <p id="valid_mail">Votre mail n'est pas valide</p>
      </div>

      <form method="POST" action="">
        <div class="form-group">
          <label for="mail">E-mail</label>
          <input class="form-control" placeholder="example@example.com" name="mail" type="email" id="mail" required />
        </div>

        <div class="form-group">
          <label for="object">Objet</label>
          <input type="text" class="form-control" id="object" name="object" required />
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea type="text" class="form-control" rows="3" id="message" name="message" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer un message</button>
      </form>

      <script>
        //Mail
        var mail = document.getElementById("mail");
        var length_mail = document.getElementById("length_mail");
        var valid_mail = document.getElementById("valid_mail");

        //Object
        var object = document.getElementById("object");
        var length_object = document.getElementById("length_object");

        length_mail.classList.remove("valid");
        length_mail.classList.add("invalid");
        length_object.classList.remove("valid");
        length_object.classList.add("invalid");
        valid_mail.classList.remove("valid");
        valid_mail.classList.add("invalid");

        mail.onkeyup = function() {
          if (mail.value.length > 0) {
            if (mail.value.match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)) {
              valid_mail.classList.remove("invalid");
              valid_mail.classList.add("valid");
            } else {
              valid_mail.classList.remove("valid");
              valid_mail.classList.add("invalid");
            }
            length_mail.classList.remove("invalid");
            length_mail.classList.add("valid");
          } else {
            length_mail.classList.remove("valid");
            length_mail.classList.add("invalid");
            valid_mail.classList.remove("valid");
            valid_mail.classList.add("invalid");
          }
        }

        object.onkeyup = function() {
          if (object.value.length > 0) {
            length_object.classList.remove("invalid");
            length_object.classList.add("valid");
          } else {
            length_object.classList.remove("valid");
            length_object.classList.add("invalid");
          }
        }
      </script>
    </div>
  </main>
  <footer>
    <div>
      Site créé avec ❤️ par le_gabi & Caranouga
    </div>
    <div>
      <a href="/">Acceuil</a><br>
      <a href="/contact.php">Nous contacter</a>
    </div>
  </footer>
</body>

</html>