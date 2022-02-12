<?php include 'nav.php'; ?>
<?php include 'database.php';
// require "/home/gabi/myplugins/api/assets/mail.php";
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
      //send_mail($mail, "Confirmation", "Vous avez envoyer un message au site https://agamiweb.ml/");
      header("Location: /");
    }
  } else {
    $errors["field"] = "Veuillez remplir tous les champs";
  }
}
?>
<html>

<head>
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/index.css">
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
        <p>Vous n'avez pas remplis le fomulaire correctement</p>
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

        //Object
        var object = document.getElementById("object");
        var length_object = document.getElementById("length_object");

        length_mail.classList.remove("valid");
        length_mail.classList.add("invalid");
        length_object.classList.remove("valid");
        length_object.classList.add("invalid");

        mail.onkeyup = function() {
          if (mail.value.length > 0) {
            length_mail.classList.remove("invalid");
            length_mail.classList.add("valid");
          } else {
            length_mail.classList.remove("valid");
            length_mail.classList.add("invalid");
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