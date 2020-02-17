<?php

// echo "<br /> fichier os.php";
/********************/
/*     Handheld     */
/********************/

if (strpos($user_agent, "Android") && !strpos($user_agent, "Windows"))
    $os = "Android";
elseif(strpos($user_agent, 'iPhone') && !strpos($user_agent, "Windows"))
    $os = "iPhone";
elseif(strpos($user_agent, 'iPad') && !strpos($user_agent, "Windows"))
    $os = "iPad";
elseif(strpos($user_agent, 'iPod') && !strpos($user_agent, "Windows"))
    $os = "iPod";
elseif(strpos($user_agent, 'Windows Phone') !== FALSE)
    $os = "Windows Phone";

/********************/
/*   no Handheld    */
/********************/        
 elseif (strpos($user_agent, "Windows NT 10")){
    $os = "Windows 10/Server 2016";
} elseif (
    strpos($user_agent, "Windows NT 6.3") ||
    strpos($user_agent, "Windows NT 6.2")
){
    $os = "Windows 8/Server 2012";
} elseif (strpos($user_agent, "Windows NT 6.1")){
    $os = "Windows 7";
} elseif (strpos($user_agent, "Windows NT 6.0")){
    $os = "Windows vista";
} elseif (strpos($user_agent, "Windows NT 5.")){
    $os = "Windows XP";
} elseif (strpos($user_agent, "Windows")){
    $os = "Windows";
} elseif (
    (strpos($user_agent, "Mac")) ||
    strpos($user_agent, "PPC")
){
    $os = "Mac";
} elseif (strpos($user_agent, "Linux")){
    $os = "Linux";
} elseif (strpos($user_agent, "FreeBSD")){
    $os = "FreeBSD";
} elseif (strpos($user_agent, "SunOS")){
    $os = "SunOS";
} elseif (strpos($user_agent, "IRIX")){
    $os = "IRIX";
} elseif (strpos($user_agent, "BeOS")){
    $os = "BeOS";
} elseif (strpos($user_agent, "OS/2")){
    $os = "OS/2";
} elseif (strpos($user_agent, "AIX")){
    $os = "AIX";
} else {
    $os = "Autre";
}

        
/**********************************/
/*             robots             */
/**********************************/ 

if (strpos($user_agent, "bing")){
        $os = "bing ".$os;
} elseif (strpos($user_agent, "google")){
        $os = "Google ".$os;
} elseif (strpos($user_agent, "robotGoogle")){
        $os = "robotGoogle ".$os;
} elseif (strpos($user_agent, "baidu.com")){
        $os = "baidu.com ".$os;
}
 
    
// echo "<br />os : $os";

