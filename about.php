<!DOCTYPE html>
<html>
	<head>
		<title>A propos</title>
		<meta charset="utf-8">

		<?php include 'link.php'; ?>
		<link rel="icon" href="img/img.png"/>
	</head>

	<body>
		<?php
            include 'header.php';
            include 'connect.php';
        ?>
        <section class="templatemo-container light-gray-bg section-shadow-bottom">
			<h2 class="present">Projet de site web avancé<br/><span class="info">conformement au cahier des charges</span></h2>
			<h3>
				<div>
					<table>
						<tr>
							<td>Réalisation: </td>
							<td>Kadidiatou Coulibaly</td>
						</tr>
						<tr>
							<td></td>
							<td>Moussa Coulibaly</td>
						</tr>
						<tr>
							<td></td>
							<td>Djoko Kamissoko</td>
						</tr>
						<tr>
							<td></td>
							<td>Drissa Cissé</td>
						</tr>
					</table>
				</div>
			</h3>
		</section>
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