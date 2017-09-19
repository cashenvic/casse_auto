<?php
    if($req->rowCount()!=0){

        echo '<table id="car_table" class="resultTable table table-striped">
                    <thead>
                        <th class="text-left">Marque</th>
                        <th class="text-left">Type de moteur</th>
                        <th></th>
                    </thead>
                    <tbody>';

        while ($donnees = $req->fetch())
            {   
                echo "<tr>";
                    echo '<td class="text-uppercase">'.$donnees['marque'].     '</td>';
                    echo '<td class="text-uppercase">'.$donnees['type_moteur'].'</td>';
                    echo '<td class="text-center text-uppercase"><a class="btn btn-info" href="details.php?update='.$donnees['id_voiture'].'&add_retour='.$_SERVER['PHP_SELF'].'">Plus d\'infos</a></td>';
                echo '</tr>';
            }

        echo    '</tbody>
             </table>';
    }

    else
        echo "<h1>Aucun résultat</h1>";

    