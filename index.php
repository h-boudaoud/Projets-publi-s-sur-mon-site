<!DOCTYPE html>
<html>
<head>

<html lang="fr"><head>

    <meta charset="utf-8">
    <title>Projets BOUDAOUD</title>
    <link rel="shortcut icon" sizes="200x200" href="http://cv-boudaoud.biz.ht/images/logo3.ico" type="image/x-icon" />
    <meta name="author" lang="fr" content="Housni BOUDAOUD">
    <meta name="robots" content="Housni, BOUDAOUD, hboudaoud, projets, projets-boudaoud, projets-hboudaoud" />
    <META HTTP-EQUIV="Pragma" CONTENT="cache">
    
    <!-- Auto-Reactualisation de la page -->
    <!--META HTTP-EQUIV="Refresh" CONTENT="1; URL=#"--> 
    
        
    <!-- Couleur du navigateur Chrom -->
    
    <meta name="theme-color" content="rgb(5, 45, 49)"/>
    <!-- Chrom, Firfox et opera -->
    <meta name="apple-mobile-web-app-status-bar-style" content="rgb(5, 45, 49)"/>
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="rgb(5, 45, 49)"/>
     <!-- iOS Safari -->
     <meta name="apple-mobile-web-app-capable" content="yes">
     <meta name="apple-mobile-web-app-status-bar-style" content="rgb(5, 45, 49)">
     
     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="all" href="/code-source/css/index.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="/code-source/css/barre.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="/code-source/css/font.css">
 

<!- CSS pour tout type d'écrans == plutôt adapté aux smartphones ==  -->

    <link rel="stylesheet" type="text/css" media="all" href="/code-source/css/index1.css">
    <link rel="stylesheet" type="text/css" media="all" href="/code-source/css/style.css">
    
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <style>
                html{
                    background-color: rgb(110, 140, 144);
                }
        </style>
    <![endif]-->


    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 1rem;
            padding: 1rem 3rem;
            width: 100%;
            height: 100%;
            font-weight: 100;
        }
        .corps{
            width: 100%;
            height: 100%;
            color: rgb(110, 140, 144);
        }
        


    </style>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="cv">

        
                <?php
                
                        /****************************************************/    
                        /*                                                  */
                        /*                    Projets                       */    
                        /*                                                  */
                        /****************************************************/
                       
                        include('./projets.php');
                                      
                        ?>
        
            <footer>
                <div id="afficheDate"></div> 
            </footer>
        </div>
                
        <script>
            var lang = "fr-FR";        
            date_heure("afficheDate",lang);
            //date_heure("afficheDate");
            function date_heure() {       
                //https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/DateTimeFormat/format
                var option = {
                    year: 'numeric',
                    month: 'long',
                    weekday: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };
                var date = new Date()
                
                resultat = date.toLocaleDateString(lang, option).replace(" à ", " ");
                
                document.getElementById('afficheDate').innerHTML = resultat;
                // console.log('date-heure', resultat);
                setTimeout('date_heure();', '1000');
                return true;
            }
        
        
        
        </script>
</body>
</html>
