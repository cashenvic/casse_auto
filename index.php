<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Casse Auto</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/font-awesome.min.css" rel="stylesheet"/>
        <link href="css/templatemo-style.css" rel="stylesheet"/>
        <link href="css/templatemo-style1.css" rel="stylesheet"/>
		<link rel="icon" href="img/img.png"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="templatemo-container">

		<?php include 'header.php' ?>

        <div class="header-img-2 sm-hidden">
            <div class="col-lg-4 col-md-4 col-sm-6 center-block">
                <!-- Nav tabs -->
                <div class="tm-home-box-1">
                    <ul class="nav nav-tabs entete" id="hotelCarTabs">
                        <li role="presentation" class="active">
                            <a href="#car" aria-controls="car" role="tab" data-toggle="tab" aria-expanded="true">Chercher une voiture</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade bg-form active in" id="car">
                            <div class="tm-search-box effect2">
                                <form method="post" class="hotel-search-form" action="resultat.php">
                                    <div class="tm-form-inner">
                                        <div class="form-group">
                                             <input class="form-control" type="text" name="marque_voiture" placeholder="Marque à chercher" required="" /> 
                                        </div>
                                        <div class="form-group">
                                             <select class="form-control" name="type_moteur" required="">
                                                <option value="">-- Type de moteur -- </option>
                                                <option value="diesel">Diesel</option>
                                                <option value="essence">Essence</option>
                                                <option value="electrique">Electrique</option>
                                                <option value="hybride">Hybride</option>
                                            </select> 
                                        </div>                                    
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" name="prix_max" placeholder="Prix maximun" type="number"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input class="form-control" name="prix_min" placeholder="Prix minimum" type="number"/>
                                            </div>
                                        </div>
                                    </div>                          
                                    <div class="form-group entete text-center">
                                        <button type="submit" name="submit" class="tm-yellow-btn">Rechercher</button>
                                    </div>  
                                </form>
                            </div>
                        </div>                  
                    </div>
                </div>                              
            </div>
        </div>

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

