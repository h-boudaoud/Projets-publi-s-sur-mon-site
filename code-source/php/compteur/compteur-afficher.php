<?php
include('connection-bd.php');
//        if($page==='login'){
//                $nom="";
//        }else{
//               $nom=$page;
//        }
?>
<table id="compteur"
       class="table table-dark table-responsive"
       style="table-layout: fixed; background-color:rgba(60, 13, 72, .5);"
>
<thead>
        <tr style='text-align:center;background-color:#000; color:#fff'>
                <th width=10%>ip</th>
                <th width=10%>date</th>
                <th width=10%>page</th>
                <th width=10%>broser</th>
                <th width=5%>lang</th>
                <th width=10%>os</th>
                <th width=5%>nb</th>
                <th >commentaire</th>
        </tr>
    </thead>
    <tbody>
<?php $requet = $bdd->query('SELECT * FROM compteur  ORDER BY date_connexion DESC');
        while ($donnees = $requet->fetch()){
        $ip=$donnees['ip'];
        $os=$donnees['os'];
        $page_bdd=$donnees['page'];
        $broser=$donnees['navivateur'];
        $lang=$donnees['lang'];
        $nb_connexion=$donnees['nb_connection'];
        $date=$donnees['date_connexion'];
        $communt=$donnees['commentaire'];
        echo "<tr style='text-align:center;'>
                <td width=10%>
                   <a href='https://ip-api.com/#$ip' class='ipInfo' style='background-color:rgb(15, 45, 49)' target='f'>
                      $ip
                   </a>
                   <br /><a href='http://ip-api.com/json/$ip' style='backgroundcolor:rgb(15, 45, 49)' target='f'>JSON IP info</a>
                </td>
                <td width=10%>$date</td>
                <td width=10%>$page_bdd</td>
                <td width=10%>$broser</td>
                <td width=5%>$lang</td>
                <td width=10%>$os</td>
                <td width=5%>$nb_connexion</td> 
                <td style='overflow: hidden; text-overflow: ellipsis; white-space: nowrap;'>$communt</td>
             </tr>";
     };

     $requet->closeCursor(); 
     ?>
     </tbody>
</table>


