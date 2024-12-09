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
                        if (isset($sponsor['logo']) && !empty($sponsor['logo']) && file_exists('../view/images/' . $sponsor['logo'])) {
                            echo '<div class="sponsor-logo">';
                            echo '<img src="../view/images/' . htmlspecialchars($sponsor['logo']) . '" alt="' . htmlspecialchars($sponsor['nom_sp']) . '" class="img-fluid">';
                            echo '</div>';
                        } else {
                            echo '<div class="sponsor-logo">';
                            echo '<img src="path/to/default-placeholder.jpg" alt="Placeholder" class="img-fluid">';
                            echo '</div>';
                        }

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