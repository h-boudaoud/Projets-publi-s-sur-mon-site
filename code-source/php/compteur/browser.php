<?php
$user_agent = getenv("HTTP_USER_AGENT");
$robot = array('robotGoogle', 'bingbot');
//https://developers.whatismybrowser.com/useragents/explore/layout_engine_name/trident/  
if (
    (
        strpos($user_agent, "Nav") ||
        strpos($user_agent, "Gold") ||
        strpos($user_agent, "X11") ||
        strpos($user_agent, "Mozilla") ||
        strpos($user_agent, "Netscape")
    )
    AND !strpos($user_agent, "MSIE")
    AND !strpos($user_agent, "Konqueror")
    AND !strpos($user_agent, "Firefox")
    AND !strpos($user_agent, "Safari")
    AND !strpos($user_agent, "Trident")
) {
    $browser = "Netscape";
}


/**********************************/
/*         Navigateurs IE         */
/**********************************/

elseif (strpos($user_agent, "Edge")) {
    $browser = "Edge";
} elseif (strpos($user_agent, "MSIE") AND !strpos($user_agent, "Trident")) {
    $browser = "IE < 8";
} elseif (strpos($user_agent, "Trident/7.0")) {
    $browser = "IE 11";
} elseif (strpos($user_agent, "Trident/6.0")) {
    $browser = "IE 10";
} elseif (strpos($user_agent, "Trident/5.0")) {
    $browser = "IE 9";
} elseif (strpos($user_agent, "Trident/4.0")) {
    $browser = "IE 8";
} elseif (strpos($user_agent, "MSIE")) {
    $browser = "MS IE";
}


/**********************************/
/*      Navigateurs Andoid        */
/**********************************/

elseif (strpos($user_agent, "SamsungBrowser"))
    $browser = "Samsung Browser";

/**********************************/
/*      Navigateurs Autres        */
/**********************************/

elseif (strpos($user_agent, "Puffin"))
    $browser = "Puffin";
elseif (strpos($user_agent, "Opera") || strpos($user_agent, "OPR"))
    $browser = "Opera";
elseif (strpos($user_agent, "UR"))
    $browser = "UR";
elseif (strpos($user_agent, "Chrome"))
    $browser = "Chrome";
elseif (strpos($user_agent, "Lynx"))
    $browser = "Lynx";
elseif (strpos($user_agent, "WebTV"))
    $browser = "WebTV";
elseif (strpos($user_agent, "Konqueror"))
    $browser = "Konqueror";
elseif (strpos($user_agent, "Safari"))
    $browser = "Safari";
elseif (strpos($user_agent, "Firefox"))
    $browser = "Firefox";
elseif (stripos($user_agent, "bot") || strpos($user_agent, "Google") ||
    strpos($user_agent, "Slurp") || strpos($user_agent, "Scooter") ||
    stripos($user_agent, "Spider") || stripos($user_agent, "Infoseek"))
    $browser = "Bot";

else
    $browser = "Autre";

// echo "<br />Browser ---> $browser <br/> Comment ---> $user_agent";
    
