<?php
$dir = getcwd();
$files_no_access = array('code-source', 'old-projects');
$files1 = scandir(getcwd());
$files2 = scandir(getcwd(), 1);

// echo 'getcwd () :'.$dir;
// echo '<br /><br/>  $files1 :';
// print_r($files1);
// echo '<br/><br/>  $files2 :';
// echo '<br/>';
// print_r($files2);

if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
        case 'info':
            phpinfo();
            exit;
            break;
    }
}

$count = 0;

?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
            

        #projets {
            margin: 0;
            padding: 1rem 3rem;
            width: 100%;
            font-weight: 100;
            height: 80%;
            display: table;
        }

        table {
            width: 90%;
        }

        td {
            text-align: left;
            font-size: .98rem;
            font-family: arial;
            vertical-align: middle;
        }

        .container {
            display: table-cell;
            vertical-align: middle;
            background-color: rgb(15, 45, 49);
            border-right: 3px solid rgb(15, 45, 49);
            color: #FFFFFF;
            width: 80%;
            height: 100%;
            min-height: 15em;
            line-height: 150%;
        / / height: 100 %;
        }

        .content {
            text-align: center;
            vertical-align: middle;
            display: inline-block;
            width: 100%;
        }

        .title {
            font-size: 96px;
        }

        .opt {
            margin-top: 30px;
        }

        .opt a {
            text-decoration: none;
            font-size: 150%;
        }

        a:hover {
            color: red;
        }

        a:link, a:visited {
            text-decoration: none;
            color: #FFFFFF;
        }

        .aside {
            margin: 0;
            padding: 1rem 3rem;
            width: 100%;
        }

        .Compteur,.Compteur a{color: #FFFFFF;}
        .fa{display: inline !important;  }
    </style>
</head>
<header>
    <h1>Projets réaliser par Housni BOUDAOUD</h1>
</header>

<section class="corps" style="min-height:70%;">
    <p>Autre que ce site, j'ai réalisé ces projets :</p>
    <section id='projets'>
        <div class="container">
            <div class="content">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th style="width:2.2em"></th>
                        <th>Nom</th>
                        <th style="width:2.1em"></th>
                        <th>Code source github</th>
                        <th></th>
                        <th>Déscription</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($files1 as $dir): ?>
                        <?php if (!in_array($dir, $files_no_access) && !strstr($dir, '.')): ?>
                            <tr>
                                <?php
                                $count++;

                                $arrayNameGit = explode('_', $dir);
                                array_shift($arrayNameGit);
                                $projectName = join('_', $arrayNameGit);
                                $gitUrl = 'https://github.com/h-boudaoud/' . $projectName . '.git';
                                ?>
                                <td>
                                    <a href="/<?php echo $dir ?>/"
                                       target="_blank"
                                        style ="font-size:1.5em;border: .1em solid #FFF; border-radius: 3px;padding:.1em;"
                                    ><span class="fa fa-eye"></span>
                                    </a>

                                </td>
                                <td>
                                    <?php
                                    echo str_replace('_', ' - ', str_replace('-', ' ', $projectName)) ?>
                                </td>
                                <td><a href="<?php echo $gitUrl ?>" target="_blank" 
                                        style ="font-size:1.5em;border: .1em solid #FFF; border-radius: 3px;padding:.2em;"
                                    ><span class="fa fa-github"></span></a>
                                </td>
                                <td>
                                    <?php echo $gitUrl ?>
                                </td>
                                <td>
                                </td>
                                <td class="description"><?php include($dir . '/description.txt'); ?></td>
                            </tr>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
    <div class="aside">
        <?php echo $count ?> projet<?php if ($count > 1) echo 's'; ?> pour le moment
    </div>
</section>
<div class="Compteur">
    <?php
    $page = "allProjet";
    /****************************************************/
    /*                                                  */
    /*                    Compteur                      */
    /*                                                  */
    /****************************************************/

    include('./code-source/php/compteur/index.php');

    ?>

</div>
