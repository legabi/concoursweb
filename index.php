<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgamiWeb - Acceuil</title>
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
    <?php
        include "nav.php";
    ?>

    <header class="header">
        <h1>Laissez nous faire votre site</h1>
    </header>
    <section class="services">
		<div class="services-item">
			<i class="fas fa-desktop delivery-icon"></i>
			<p class="services-details">Du responsive</p>
		</div>
		<div class="services-item">
			<i class="fa fa-code delivery-icon"></i>
			<p class="services-details">Livré avec le code source</p>
		</div>
		<div class="services-item">
			<i class="fa fa-box delivery-icon"></i>
			<p class="services-details">Livraison rapide</p>
		</div>
	</section>

    <section class="presentation">
        <h1><i class="fa fa-male"></i> Présentation:</h1>
        <p>Nous sommes deux entrepeneurs dans le but de vous aider à créer un site</p>
        <li style="font-size: 20px; margin-left: 20px;">Malone: développeur HTML PHP JavaScript & Java, 3 ans d'expériance</li>
        <li style="font-size: 20px; margin-left: 20px;">Gabriel: développeur HTML PHP CSS & Java & Python, 3 ans d'expériance</li>
    </section>

    <section class="presentation">
        <h1><i class="fa fa-male"></i> Chiffres:</h1>
        <li>Clients: 2007</li>
        <li>Chiffre d'affaire: 200 000€</li>
        <li>Clients satisfaits dès le début: 1904</li>
    </section>
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