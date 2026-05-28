<?php

$lang = "en";

if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
}

$texts = [

    "en" => [

        "contact" => "Contact",
        "signup" => "Sign up",
        "login" => "Log in and book",
        "location" => "Location",

        "reservation" =>
        "To make reservations, you must log in.",

        "restaurant_title" => "Restaurant",
        "restaurant_text" =>
        "Enjoy refined dining in a sophisticated atmosphere with carefully crafted cuisine and premium service.",

        "pool_title" => "Pool Area",
        "pool_text" =>
        "Relax by our modern outdoor pool surrounded by nature and tranquility.",

        "lobby_title" => "Hotel Lobby",
        "lobby_text" =>
        "Step into a grand lobby featuring stylish architecture and warm lighting, designed to offer comfort from the very first moment."
    ],

    "fr" => [

        "contact" => "Contact",
        "signup" => "S'inscrire",
        "login" => "Connexion et réservation",
        "location" => "Localisation",

        "reservation" =>
        "Pour faire une réservation vous devez vous connecter.",

        "restaurant_title" => "Restaurant",
        "restaurant_text" =>
        "Profitez d'une expérience culinaire raffinée dans une atmosphère sophistiquée.",

        "pool_title" => "Piscine",
        "pool_text" =>
        "Détendez-vous dans notre piscine moderne entourée de nature.",

        "lobby_title" => "Hall de l'hôtel",
        "lobby_text" =>
        "Découvrez un lobby élégant avec une architecture moderne et une ambiance chaleureuse."
    ],

    "ro" => [

        "contact" => "Contacte",
        "signup" => "Înregistrare",
        "login" => "Autentificare și rezervare",
        "location" => "Locație",

        "reservation" =>
        "Pentru a face rezervări trebuie să vă autentificați.",

        "restaurant_title" => "Restaurant",
        "restaurant_text" =>
        "Bucurați-vă de o experiență culinară elegantă într-o atmosferă sofisticată.",

        "pool_title" => "Piscină",
        "pool_text" =>
        "Relaxați-vă la piscina modernă înconjurată de natură și liniște.",

        "lobby_title" => "Holul hotelului",
        "lobby_text" =>
        "Descoperiți un lobby elegant cu arhitectură modernă și lumină caldă."
    ]

];

$t = $texts[$lang];

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Aurora Resort</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<section class="hero">

    <div class="overlay"></div>

    <div class="top-bar">

        <a href="contact.php">
            <button class="top-button">
                <?php echo $t['contact']; ?>
            </button>
        </a>

        <h1 class="logo">
            Aurora Resort
        </h1>

        <select id="languageSelect" class="language-select">

            <option value="en"
                <?php if($lang == "en") echo "selected"; ?>>
                EN
            </option>

            <option value="fr"
                <?php if($lang == "fr") echo "selected"; ?>>
                FR
            </option>

            <option value="ro"
                <?php if($lang == "ro") echo "selected"; ?>>
                RO
            </option>

        </select>

    </div>

    <div class="hero-center">

        <a href="sign_up.php">
            <button class="hero-button">
                <?php echo $t['signup']; ?>
            </button>
        </a>

        <a href="login.php">
            <button class="hero-button">
                <?php echo $t['login']; ?>
            </button>
        </a>

    </div>

</section>

<section class="content-section">

    <div class="info-card">

        <div class="image-box">

            <img src="images/Hotel_restaurant.webp" alt="">

        </div>

        <div class="text-box">

            <h2>
                <?php echo $t['restaurant_title']; ?>
            </h2>

            <p>
                <?php echo $t['restaurant_text']; ?>
            </p>

        </div>

    </div>

    <div class="info-card reverse">

        <div class="image-box">

            <img src="images/Pool_hotel.webp" alt="">

        </div>

        <div class="text-box">

            <h2>
                <?php echo $t['pool_title']; ?>
            </h2>

            <p>
                <?php echo $t['pool_text']; ?>
            </p>

        </div>

    </div>

    <div class="info-card">

        <div class="image-box">

            <img src="images/Hotel_Lobby.jpg" alt="">

        </div>

        <div class="text-box">

            <h2>
                <?php echo $t['lobby_title']; ?>
            </h2>

            <p>
                <?php echo $t['lobby_text']; ?>
            </p>

        </div>

    </div>

</section>

<section class="location-section">

    <h2 class="location-title">
        <?php echo $t['location']; ?>
    </h2>

    <div class="map-box">

        <!-- ADAUGĂ IMAGINEA HĂRȚII -->
        <!-- images/map.jpg -->

        <img src="images/map.jpg" alt="">

    </div>

</section>

<div class="reservation-text">
    <?php echo $t['reservation']; ?>
</div>

<footer>

    <div class="footer-container">

        <div>

            <h3>Contact</h3>

            <p>
                auroraresort@email.com <br>
                +373 00 000 000
            </p>

        </div>

        <div>

            <h3>Location</h3>

            <p>
                Aurora Resort, Belgium
            </p>

        </div>

        <div>

            <h3>Check-in / Check-out</h3>

            <p>
                Check-in: 15:00 <br>
                Check-out: 11:00
            </p>

        </div>

    </div>

</footer>

<script src="script.js"></script>

</body>
</html>