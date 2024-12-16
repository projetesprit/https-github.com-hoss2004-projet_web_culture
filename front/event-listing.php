<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tiya Golf Club - Event Listing</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-tiya-golf-club.css" rel="stylesheet">

    <!--

TemplateMo 587 Tiya Golf Club

https://templatemo.com/tm-587-tiya-golf-club

-->
</head>

<body>
    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="index.php">
                    <img src="images/logo.png" class="navbar-brand-image img-fluid" alt="Tiya Golf Club">
                    <span class="navbar-brand-text">
                        Tiya
                        <small>Golf Club</small>
                    </span>
                </a>
            </div>
        </nav>

        <section class="events-section section-padding" id="section_2">
            <?php
require_once '../controller/eventController.php';

$events = listEvents();
?>
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-lg-5 mb-4">Latest Events</h2>
                    </div>

                    <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                    <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                        <div class="custom-block-image-wrap">
                            <a href="index.php?action=view&id=<?= htmlspecialchars($event['id']); ?>">
                                <!-- Image dynamique récupérée depuis la base de données -->
                                <img src="<?= htmlspecialchars($event['image']); ?>"
                                    class="custom-block-image img-fluid"
                                    alt="<?= htmlspecialchars($event['title']); ?>">

                                <i class="custom-block-icon bi-link"></i>
                            </a>

                            <div class="custom-block-date-wrap">
                                <strong class="text-white"><?= date('d M Y', strtotime($event['date'])); ?></strong>
                            </div>
                        </div>

                        <div class="custom-block-info">
                            <a href="index.php?action=view&id=<?= htmlspecialchars($event['id']); ?>"
                                class="events-title mb-2"><?= htmlspecialchars($event['title']); ?></a>

                            <p class="mb-0"><?= htmlspecialchars($event['description']); ?></p>

                            <div class="border-top mt-4 pt-3">
                                <div class="d-flex flex-wrap align-items-center mb-1">
                                    <span class="custom-block-span">Location:</span>
                                    <p class="mb-0"><?= htmlspecialchars($event['location']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <div class="col-12">
                        <p class="text-center">No upcoming events found.</p>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </section>

    </main>

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