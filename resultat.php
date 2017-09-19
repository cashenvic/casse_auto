<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Resultat de la recherche</title>

        <?php include 'link.php';?>
        <link rel="icon" href="img/img.png"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="templatemo-container">
        <!-- header -->
        <?php 
            include 'header.php';
        ?>
        
        <div class=""></div>

        <section class="templatemo-container light-gray-bg section-shadow-bottom">
            <div class="container">
                <?php
                    include 'search.php'; 
                ?>
            </div>
        </section>
        <footer id="footer">
            <?php 
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
