<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tiya Golf Club - Event Detail</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">
    <link rel="stylesheet" href="./sponsor.css">
    <style>
    /* Style de la section sponsor */
    /* Section des événements */
    .events-section {
        background: linear-gradient(135deg, #f0f4f8, #ffffff);
        padding: 50px 0;
        position: relative;
        overflow: hidden;
    }

    .events-section h2 {
        text-align: center;
        font-size: 2.8rem;
        color: #1e88e5;
        font-weight: bold;
        margin-bottom: 40px;
        position: relative;
    }

    .events-section h2::after {
        content: '';
        width: 80px;
        height: 4px;
        background: #1e88e5;
        display: block;
        margin: 10px auto;
        border-radius: 2px;
    }

    #eventsContainer {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    /* Carte de l'événement */
    .event-item {
        background: #ffffff;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
    }

    .event-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }

    .custom-block-date-wrap {
        background: #1e88e5;
        color: #ffffff;
        text-align: center;
        padding: 10px;
        font-size: 1.2rem;
    }

    .custom-block-date-wrap h6 {
        font-size: 2rem;
        margin: 0;
        font-weight: bold;
    }

    .custom-block-date-wrap strong {
        font-size: 1.2rem;
    }

    .custom-block-image-wrap img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #e0e0e0;
    }

    .custom-block-info {
        padding: 20px;
    }

    .custom-block-info a.events-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #1e88e5;
        text-decoration: none;
        display: block;
        margin-bottom: 10px;
        transition: color 0.3s;
    }

    .custom-block-info a.events-title:hover {
        color: #1565c0;
    }

    .custom-block-info p {
        font-size: 1rem;
        color: #666666;
        margin-bottom: 15px;
    }

    .custom-block-span {
        font-weight: bold;
        color: #333333;
    }

    .custom-block-info .border-top {
        border-top: 1px solid #e0e0e0;
        padding-top: 15px;
    }

    /* Effets décoratifs */
    .events-section::before,
    .events-section::after {
        content: '';
        position: absolute;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(30, 136, 229, 0.2) 10%, transparent 80%);
        z-index: -1;
        animation: float 6s ease-in-out infinite;
    }

    .events-section::before {
        top: -50px;
        left: -50px;
    }

    .events-section::after {
        bottom: -50px;
        right: -50px;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(20px);
        }
    }

    .sponsor-section {
        background: linear-gradient(135deg, #1e1e2f, #4a00e0);
        color: #fff;
        padding: 50px 0;
        overflow: hidden;
        position: relative;
    }

    .sponsor-section h3 {
        font-size: 3rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #ffeb3b;
        margin-bottom: 40px;
        position: relative;
        animation: glow 1.5s infinite alternate;
    }

    /* Glow effect for the title */
    @keyframes glow {
        from {
            text-shadow: 0 0 10px #ffeb3b, 0 0 20px #ffeb3b, 0 0 30px #ffeb3b, 0 0 40px #ffeb3b;
        }

        to {
            text-shadow: 0 0 20px #ffe873, 0 0 30px #ffe873, 0 0 40px #ffe873, 0 0 50px #ffe873;
        }
    }

    .sponsor-wrapper {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
    }

    .sponsor-item {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid #ffeb3b;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        transition: transform 0.4s, box-shadow 0.4s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .sponsor-item:hover {
        transform: scale(1.1) rotate(-3deg);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.5);
    }

    .sponsor-logo img {
        max-width: 120px;
        max-height: 120px;
        border-radius: 50%;
        border: 3px solid #ffeb3b;
        box-shadow: 0 0 15px #ffeb3b;
        transition: transform 0.3s ease;
    }

    .sponsor-logo img:hover {
        transform: scale(1.2);
    }

    .sponsor-name {
        font-size: 1.5rem;
        font-weight: bold;
        margin-top: 15px;
        color: #ffeb3b;
        text-transform: uppercase;
    }

    .sponsor-description {
        font-size: 1rem;
        color: #fff;
        margin: 15px 0;
        line-height: 1.5;
    }

    .sponsor-website {
        color: #00ffdd;
        text-decoration: none;
        font-size: 1.1rem;
        font-weight: bold;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .sponsor-website:hover {
        color: #00b3b3;
        transform: scale(1.1);
    }

    /* Decorative lines */
    .sponsor-section::before,
    .sponsor-section::after {
        content: '';
        position: absolute;
        width: 200%;
        height: 300px;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 20%, transparent 60%);
        animation: spin 10s linear infinite;
        z-index: 0;
    }

    .sponsor-section::before {
        top: -150px;
        left: -50%;
    }

    .sponsor-section::after {
        bottom: -150px;
        left: -50%;
        animation-direction: reverse;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
    </style>


    <!--

TemplateMo 587 Tiya Golf Club

https://templatemo.com/tm-587-tiya-golf-club

-->
</head>

<body>
    <main>
        <?php
    require_once '../controller/eventController.php'; // Assurez-vous d'inclure le contrôleur pour récupérer l'événement

    // Si l'événement n'a pas été trouvé, il ne doit pas continuer l'affichage
    if (!isset($event)) {
        die('Erreur : Événement introuvable.');
    }
    ?>

        <section class=" hero-section hero-50 d-flex justify-content-center align-items-center" id="section_1">
            <div class="section-overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <h1 class="text-white mb-4 pb-2"><?= htmlspecialchars($event['title']); ?></h1>
                        <a href="index.php?action=list" class="btn custom-btn smoothscroll me-3">Back to Events</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="events-section events-detail-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-12 mx-auto">
                        <h2 class="mb-lg-5 mb-4"><?= htmlspecialchars($event['title']); ?></h2>

                        <div class="custom-block-image-wrap">
                            <!-- Image dynamique -->
                            <img src="<?= htmlspecialchars($event['image']); ?>" class="custom-block-image img-fluid"
                                alt="<?= htmlspecialchars($event['title']); ?>">
                        </div>

                        <div class="custom-block-info">
                            <h3 class="mb-3">Event Details</h3>
                            <p><?= nl2br(htmlspecialchars($event['description'])); ?></p>

                            <div class="events-detail-info row my-5">
                                <div class="col-lg-4 col-12">
                                    <span class="custom-block-span">Date:</span>
                                    <p class="mb-0"><?= date('d M Y', strtotime($event['date'])); ?></p>
                                </div>

                                <div class="col-lg-4 col-12 my-3 my-lg-0">
                                    <span class="custom-block-span">Location:</span>
                                    <p class="mb-0"><?= htmlspecialchars($event['location']); ?></p>
                                </div>
                                <a href="inscription.php?id=<?= $event['id'] ?>"
                                    class="btn btn-primary mt-3">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section class="sponsor-section section-padding">
        <div class="container">
            <h3 class="text-center mb-4">Sponsors</h3>
            <div class="sponsor-wrapper">
                <div class="sponsor-content">
                    <?php
                // Vérifiez si l'événement a un sponsor associé
                if (isset($event['id_sponsor']) && $event['id_sponsor']) {
                    $sponsor = getSponsorById($event['id_sponsor']);

                    if ($sponsor) {
                        echo '<div class="sponsor-item">';

                        // Affichage du logo
                        

                        // Affichage du nom du sponsor
                        if (isset($sponsor['nom_sp']) && !empty($sponsor['nom_sp'])) {
                            echo '<h4 class="sponsor-name text-center mt-2">' . htmlspecialchars($sponsor['nom_sp']) . '</h4>';
                        } else {
                            echo '<h4 class="sponsor-name text-center mt-2">Nom indisponible</h4>';
                        }

                        // Affichage de la description du sponsor
                        if (isset($sponsor['description']) && !empty($sponsor['description'])) {
                            echo '<p class="sponsor-description text-center">' . nl2br(htmlspecialchars($sponsor['description'])) . '</p>';
                        } else {
                            echo '<p class="sponsor-description text-center">Description non disponible.</p>';
                        }

                        // Affichage du site web du sponsor
                        if (isset($sponsor['website']) && !empty($sponsor['website'])) {
                            echo '<a href="' . htmlspecialchars($sponsor['website']) . '" class="sponsor-website text-center d-block mt-2" target="_blank">Visiter le site</a>';
                        } else {
                            echo '<p class="sponsor-website text-center">Site web non disponible.</p>';
                        }

                        echo '</div>';
                    }
                } else {
                    echo '<p class="text-center">Aucun sponsor associé à cet événement.</p>';
                }
                ?>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const sponsorItems = document.querySelectorAll('.sponsor-item');

        // Effet au survol du sponsor
        sponsorItems.forEach(item => {
            item.addEventListener('mouseover', function() {
                this.style.transform = 'scale(1.05)';
                this.style.boxShadow = '0 6px 15px rgba(0, 0, 0, 0.15)';
            });

            item.addEventListener('mouseout', function() {
                this.style.transform = 'scale(1)';
                this.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.1)';
            });
        });
    });
    </script>




</body>



<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 me-auto mb-5 mb-lg-0">
                <a class="navbar-brand d-flex align-items-center" href="index.html">
                    <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="">
                    <span class="navbar-brand-text">
                        Tiya
                        <small>Golf Club</small>
                    </span>
                </a>
            </div>

            <div class="col-lg-3 col-12">
                <h5 class="site-footer-title mb-4">Join Us</h5>

                <p class="d-flex border-bottom pb-3 mb-3 me-lg-3">
                    <span>Mon-Fri</span>
                    6:00 AM - 6:00 PM
                </p>

                <p class="d-flex me-lg-3">
                    <span>Sat-Sun</span>
                    6:30 AM - 8:30 PM
                </p>
                <br>
                <p class="copyright-text">Copyright © 2048 Tiya Golf Club</p>
            </div>

            <div class="col-lg-2 col-12 ms-auto">
                <ul class="social-icon mt-lg-5 mt-3 mb-4">
                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-instagram"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-twitter"></a>
                    </li>

                    <li class="social-icon-item">
                        <a href="#" class="social-icon-link bi-whatsapp"></a>
                    </li>
                </ul>

                <p class="copyright-text">Design: <a rel="nofollow" href="https://templatemo.com"
                        target="_blank">TemplateMo</a></p>
            </div>

        </div>
    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#81B29A" fill-opacity="1"
            d="M0,224L34.3,192C68.6,160,137,96,206,90.7C274.3,85,343,139,411,144C480,149,549,107,617,122.7C685.7,139,754,213,823,240C891.4,267,960,245,1029,224C1097.1,203,1166,181,1234,160C1302.9,139,1371,117,1406,106.7L1440,96L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z">
        </path>
    </svg>
</footer>


<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/custom.js"></script>

</body>

</html>