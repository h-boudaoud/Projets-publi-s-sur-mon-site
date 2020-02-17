<?php

/****************************************************/
/*                                                  */
/*                   Compteur                       */
/*                                                  */
/****************************************************/

// Instructions
define("ipClient", $_SERVER["REMOTE_ADDR"]);
define("ip_admin", '127.0.0.1'); //l'adress ip admin
$navigatorLanguage = explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
$navigatorLanguage = strtolower(substr(chop($navigatorLanguage[0]), 0, 2));

$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
// echo "<p>hostname : $hostname</p>";
$user_agent = getenv("HTTP_USER_AGENT");
// echo "<p>user_agent : $user_agent</p>";


$os = '?';
$browser = '?';
$ip = ipClient;

$tables_BD = array(
    "" => "ip_index",
    "index" => "ip_index",
    "admin" => "housni",
    "error" => "error"
);
if (!isset($page)) {
    $page = 'projets-hb';
    if (isset($_GET['projet'])) {
        $page = $_GET['projet'];
    }
}
define("page", $page);
//if (array_key_exists($page, $tables_BD)) {
//    define("page", $page);
//
//} else {
//    define("page", "error");
//}

//        echo "<p>acces à la page : ".page."</p>";
$compte = "";
if (ipClient == ip_admin){
    $compte = "admin";

}
// $table = $tables_BD[page];

//$compte = "admin";

// echo 'compte : ' . $compte;
// les paramètres de la base de données

if ($compte !== "admin") {
    // echo "<p> if du index.php ligne 61</p>";

    include('connection-bd.php');
    include('os.php');
    include('browser.php');
    //Le nombre de connection depuis une ip de la base de données
    try {
        $req_ip = $bdd->prepare(
    'SELECT nb_connection, 
                        TIME_TO_SEC(TIMEDIFF(DATE_ADD(NOW(), INTERVAL 2 HOUR),date_connexion)) AS date, 
                        commentaire 
                FROM compteur 
                WHERE ip=:ip 
                     AND page=:page
                     AND os=:os
                     AND navivateur=:browser'
        );
        $req_ip->execute(array(
                'ip' => ipClient,
                'page' => page,
                'os' => $os,
                'browser' => $browser
            )
        );
        $req_ip_connect = $req_ip->fetch();
        $ip_connect = $req_ip_connect['nb_connection'];
        $ip_date = $req_ip_connect['date'];
        $communt = $req_ip_connect['commentaire'];

        $req_ip->closeCursor();

        /* *
        echo "<table width=100% border=2><tr><td width=20%>Nombre de connection : $ip_connect</td>
                          <td width=20%>dhostname : $hostname</td>
                          <td width=20%>depuis : $ip_date s</td>
                          <td >commentaire : $communt</td>
               </tr></table>";

        // */
    } catch (Exception $e) {
        die("");
        // die("Error index.php ligne 102" . $e);
    }
    try {

        $req_heure = $bdd->prepare(
          "SELECT DATE_FORMAT(date_connexion, 'le %e / %m / %Y à %k:%i:%s') AS date 
                    FROM compteur 
                    WHERE ip=:ip 
                        AND page=:page
                        AND os=:os
                        AND navivateur=:browser
               ");

        $req_heure->execute(array(
                'ip' => ipClient,
                'page' => page,
                'os' => $os,
                'browser' => $browser,
            )
        );
        $req_ip_heure = $req_heure->fetch();
        $date = $req_ip_heure['date'];
        $req_ip->closeCursor();
        /* */
        if ($ip_connect == 0) {
            echo "
            <div width=100% style='font-size: .8rem; text-align: center; color:rgb(15, 45, 49)'>
                Bienvenue sur cette page $hostname/$page/index.php
            </div>";
        }else{
            echo "
            <div width=100%  style='font-size: .8em; text-align: center; color:rgb(15, 45, 49)'>
                C'est la ".($ip_connect + 1) ." éme connections 
                depuis 'ip : $ip et avec le navigateur : $browser sur la page $hostname/$page/index.php 
                <br />Date de la dernière connection : $date 
           </div>";
        }
        // */
    } catch (Exception $e) {
        die("");
        // die("Error DB index.php ligne 135 : " . e);
    }
    if ($ip_connect > 0) {
        $ip_connect = $ip_connect + 1;
               // echo "<br />ip_date : $ip_date";
        try {


            if ($ip_date > 1200) {
                try {
                    $req = $bdd->prepare(
                "UPDATE compteur 
                           SET nb_connection=nb_connection+1, 
                                commentaire=CONCAT(commentaire,'\n-->',DATE_ADD(NOW(), INTERVAL 2 HOUR)),
                                date_connexion=DATE_ADD(NOW(), INTERVAL 2 HOUR), 
                                lang=:lang
                           WHERE ip=:ip 
                                AND page=:page 
                                AND os=:os 
                                AND navivateur=:browser"
                    );
                    $req->execute(array(
                            'ip' => ipClient,
                            'page' => page,
                            'os' => $os,
                            'browser' => $browser,
                            'lang' => $navigatorLanguage
                        )
                    );
                    $req->closeCursor();
                    // echo 'index.php 161 succes update';
                } catch (Exception $e) {
                    die("");
                    // die('Error update index 164 ' . $e);
                }

            } else {
                $req = $bdd->prepare(
            'UPDATE compteur SET commentaire=CONCAT(commentaire,:commentaire)
                       WHERE ip=:ip AND page=:page AND os=:os AND navivateur=:browser'
                );
                $req->execute(array(
                        'ip' => ipClient,
                        'page' => page,
                        'os' => $os,
                        'browser' => $browser,
                        'commentaire' => " $ip_date s ; "
                    )
                );
                $req->closeCursor();
                // echo 'index.php ligne 185 succes update';

            }
        } catch (Exception $e) {
            die("");
            // die("Error update index 186 $e");
        }

    } else {

        try {
            $req = $bdd->prepare(
    'INSERT INTO compteur
               (ip, hostname, nb_connection, page, os,navivateur,commentaire,date_connexion,lang)
               VALUES
               (:ip, :hostname, 1, :page, :os, :browser,:commentaire,DATE_ADD(NOW(), INTERVAL 2 HOUR),:lang)'
            );
            $req->execute(array(
                    'ip' => ipClient,
                    'hostname' => $hostname,
                    'page' => page,
                    'os' => $os,
                    'browser' => $browser,
                    'lang' => $navigatorLanguage,
                    'commentaire' => $user_agent
                )
            );
            $req->closeCursor();

            try {
                $req2 = $bdd->prepare(
          "UPDATE compteur 
                    SET commentaire=CONCAT('->',DATE_ADD(NOW(), INTERVAL 2 HOUR),':',commentaire,'\n') 
                    WHERE ip=:ip AND page=:page AND os=:os AND navivateur=:browser"
                );
                $req2->execute(array(
                        'ip' => ipClient,
                        'page' => page,
                        'os' => $os,
                        'browser' => $browser
                    )
                );
                $req2->closeCursor();
                // echo "Bienvenu";
            } catch (Exception $e) {
                die("");
                // die("Error update ligne 231 $e");
            }
            //echo "Bienvenu 2";
        } catch (Exception $e) {
            die("");
            // die("Error index.php insert ligne 236 $e");
        }
    }




} else {

    include('compteur-afficher.php');
//    if (page !== 'inde') {
//        echo "<div width=100% style='background-color:rgba(60, 13, 72, .9); color:#fff; line-height:140%; '>";
//
//        echo 'Bonjour ' . $table;
//        include('compteur-afficher.php');
//        echo "</div>";
//    }
}



                
