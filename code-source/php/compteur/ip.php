<html>
<head>
<script>
        
        
        function monAdresseIP(){
                 var ip = false;
                 if (window.XMLHttpRequest) xmlhttp = new XMLHttpRequest();
                 else xmlhttp = new ActiveXObject(Microsoft.XMLHTTP);
                 xmlhttp.open(GET,http://cv-boudaoud.biz.ht/autres/ip-js.html,false);
                 xmlhttp.send();
                 var reponse = JSON.Parse(xmlhttp.responseText);
                 //On suppose que l'adresse IP est stockée avec la clé ip. Regardez les exemples fournis par les services pour savoir quelle clé correspond à l'adresse IP
                 if (reponse[ip])
                 ip = reponse[ip]
                 return ip;
        }
        function verifIPFields() {
                  var reg=/^([0-1]\d{0,2})|(2[0-5][0-5])$/;
                  for (var i = 1; i < 5; ++i)
                    if (!reg.test(document.getElementById('n' + i).value)) {
                        alert('adresse ip invalide !');
                        return false;
                  }
                  return true;
        }
        
</script>
</head>
<body>
var d = new Date();
        var n = d.getTimezoneOffset();
        document.write("d: ");
        document.write(d);
        document.write("<br/>");
        document.write("n : ",n,"<br/>");
        
        document.write("ip : ",monAdresseIP(),"<br/>");
</body>
</html>