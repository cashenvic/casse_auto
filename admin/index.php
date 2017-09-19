<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include 'link.php';?>

        <title>Casse auto</title>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="templatemo-container">
        
        <?php 
            include 'menu.php';
            if(isset($_SESSION['status']) && isset ($_SESSION['username'])){
        ?>
        
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container-fluid present">
                <div class="col-lg-12">
                    <div class="col-lg-2">
                        
                    </div>
                    <div class="col-lg-8">
                        <div class="col-lg-4">
                            <a href="liste_voiture.php" title="voir les voitures"><img src="img/voitures.png" class="img-circle" alt="Liste des voitures"><caption>Voitures</caption></a>
                        </div>
                        <div class="col-lg-4">
                            <a href="liste_client.php" title="Voir les Clients"><img src="img/clients.png" class="" alt="Liste des clients"><caption>Clients</caption></a>
                        </div>
                        <div class="col-lg-4">
                            <a href="liste_achat.php" title="Voir les achats"><img src="img/achat_voiture.png" class="" alt="Liste des achats"><caption>Achats</caption></a>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        
                    </div>
                </div>
            </div>
        </section>

        <footer class="text-center">
            <?php 
                }
                else
                    header('location: login.php');
                include 'footer.php';
            ?>
        </footer>

        <!-- JS -->
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
        <script type="text/javascript" src="js/responsiveCarousel.min.js"></script>      <!-- Carousel -->
        <script type="text/javascript" src="js/templatemo-script.js"></script>      <!-- Templatemo Script -->
        <script>

            $(function() {
                $('.crsl-items').carousel({
                    visible: 1,
                    itemMinWidth: 320,
                    itemEqualHeight: 320,
                    itemMargin: 9,
                });
                $(".crsl-nav a[href=#]").on('click', function(e) {
                    e.preventDefault();
                });
            });

        </script>
    </body>
</html>
