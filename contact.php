<?php include 'nav.php'; ?>
<?php include 'database.php'; ?>
<?php
if (!empty($_POST)) {
  $mail = $_POST['mail'];
  $message = $_POST['message'];
  $object = $_POST['object'];
  if (!empty($mail) && !empty($message) && !empty($object)) {
    $req = $db->prepare("INSERT INTO contact SET mail = ?, message = ?, object = ?, date = NOW()");
    $req->execute([$mail, $message, $object]);
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
        <p id="length_msg">Votre message ne peut pas être vide</p>
        <p id="length_object">Votre objet ne peut pas être vide</p>
        <p id="length_mail">Votre mail ne peut pas être vide</p>
        <p id="length_mail">Votre mail n'est pas valide</p>
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
          <textarea class="form-control" rows="3" id="message" name="message" required /></textarea>
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

        //Msg
        var msg = document.getElementById("message");
        var length_msg = document.getElementById("length_msg");

        length_pswd.classList.remove("valid");
        length_pswd.classList.add("invalid");
        length_pseudo.classList.remove("valid");
        length_pseudo.classList.add("invalid");

        pswd.onkeyup = function() {
          // Validate length
          if (pswd.value.length >= 8) {
            length_pswd.classList.remove("invalid");
            length_pswd.classList.add("valid");
          } else {
            length_pswd.classList.remove("valid");
            length_pswd.classList.add("invalid");
          }
        }

        pseudo.onkeyup = function() {
          // Validate length
          if (pseudo.value.length >= 3) {
            length_pseudo.classList.remove("invalid");
            length_pseudo.classList.add("valid");
          } else {
            length_pseudo.classList.remove("valid");
            length_pseudo.classList.add("invalid");
          }
        }

        /^[a-zA-Z0-9_]+$/.test(pseudo)
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