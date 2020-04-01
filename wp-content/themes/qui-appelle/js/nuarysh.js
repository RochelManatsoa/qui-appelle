// Get the button that opens the modal
var btn3 = document.getElementById("send");
var btn = document.getElementById("sendName");

//--------------------------------------------------------------


    label = document.getElementById('labelName');
    sendNum = document.getElementById('send');
    sendName = document.getElementById('sendName');
    sendNamePro = document.getElementById('sendNamePro');
    key = "UdT15bkN9JmEqqNJ9MKbMdJb";
    var header = '{ "alg": "HS256", "typ": "JWT"}';
  
sendNum.addEventListener('click', function()
  {
        var result = document.getElementById('resultAnnuaireRenverse');
        var numero = label.value;
        var filter = /^(10)|0[1,2,3,4,5,9]\d{8}$/;
        var filter2 = /^(10)|0[8]\d{8}$/;
        var filter3 = /^(10)|0[6-7]\d{8}$/;
        var filter4 = /^[0-9]$/;
        var start = "<div class='annuaire-numero-inverse'>";
        var container = "<div class='solutions text-center'>";
        var solution = "<p>Nous avons trouvé <span>1 réponse</span> correspondant au numéro<br />"+
        "<span class='numero'>"+ numero + "</span><br />";
        var fixe = "vous allez pouvoir identifier le propriétaire de ce numéro de ligne fixe.";
        var appelle = "<img class='img-responsive' src='/wp-content/themes/qui-appelle/images/appelle.png' alt=''>";
        var cartouch =  "<img class='img-responsive' src='/wp-content/themes/qui-appelle/images/cartouche-num-08.png' alt=''>";
        var end = "</p></div></div>";
        var msg = "Mauvais format de numéro";
      if (filter.test(numero)) {
          var cartouch =  "<a href='tel:0897010808'><img class='img-responsive mt-0' src='/wp-content/themes/qui-appelle/images/cartouche-num-08.png' alt=''></a>";
          result.innerHTML = start + container + solution + fixe + appelle + cartouch + end;
      }else{
          var fixe = "vous allez pouvoir identifier le propriétaire de ce numéro spécial.";
          var cartouch =  "<a href='tel:0897010808'><img class='img-responsive mt-0' src='/wp-content/themes/qui-appelle/images/cartouche-num-08.png' alt=''></a>";
          result.innerHTML = start + container + solution + fixe + appelle + cartouch + end;
      }
      if (filter2.test(numero)) {
          var fixe = "vous allez pouvoir identifier le propriétaire de ce numéro spécial.";
          var cartouch =  "<a href='tel:0897010808'><img class='img-responsive mt-0' src='/wp-content/themes/qui-appelle/images/cartouche-num-08.png' alt=''></a>";
          result.innerHTML = start + container + solution + fixe + appelle + cartouch + end;
      }
      if (filter3.test(numero)) {
          var fixe = "vous allez pouvoir identifier le propriétaire de ce numéro mobile.";
          var cartouch =  "<a href='tel:0897010809'><img class='img-responsive mt-0' src='/wp-content/themes/qui-appelle/images/cartouche-num-09.png' alt=''></a>";
          result.innerHTML = start + container + solution + fixe + appelle + cartouch + end;
      }
      if (filter4.test(numero)) {
          if(numero.length < 10){
              var fixe = "vous allez pouvoir identifier le propriétaire de ce numéro spécial.";
              var cartouch =  "<a href='tel:0897010808'><img class='img-responsive mt-0' src='/wp-content/themes/qui-appelle/images/cartouche-num-08.png' alt=''></a>";
              result.innerHTML = start + container + solution + fixe + appelle + cartouch + end;
          }else{
              result.innerHTML = "<p class='text-center'>aucun resultat trouvé</p>"
          }
      }


      //result.innerHTML = start + container + solution + end;

  });

sendName.addEventListener('click', function()
 {
     var result = document.getElementById('resultAnnuairePart');
    var payload = '{ "nom": "'+encodeURI(document.getElementById('labelNom').value)+'", "ville": "'+encodeURI(document.getElementById('labelVille').value)+'" }';
    unsignedToken = base64_encode(header) + '.' + base64_encode(payload);
    signature = CryptoJS.HmacSHA256(unsignedToken, key);
    token = base64_encode(header) + '.' + base64_encode(payload) + '.' + CryptoJS.enc.Base64.stringify(signature);
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        //result.innerHTML='<%= image_tag("ajax-loader.gif") %>';
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            JSONObject = JSON.parse(xmlhttp.responseText);
            result.innerHTML=xmlhttp.responseText;
            //result.innerHTML= "Aucun élement trouvé dans ces villes";

            addrSender = new Array();
            console.log(JSONObject.code);
            //var str = [];
            var str = '';

            for (var i = 0; i < JSONObject.code.length; i++)
            {
                var j=i;


                //----------------------------------------------------

                var name = JSONObject.code[i].nom;
                var surname = JSONObject.code[i].prenom;
                var number = JSONObject.code[i].numero;
                var adress = JSONObject.code[i].adresse;
                var cp = JSONObject.code[i].codepostal;
                var city = JSONObject.code[i].ville;
                //----------------------------------------
                var row = "<div class='row'>";
                var col_8 = "<div class='col-12'>";
                var start = "<div class='list-annuaire__item'>";
                var telLink = "<a href='tel:118001'>";
                var wrapperStart = "<div class='col-12 list-annuaire__item-wrap'><div class='row'>";
                var containerStart = "<div class='col-10'><div class='list-annuaire__item-infos'>";
                var title = "<div class='list-annuaire__item-titre'><h2>"+name+"</h2></div>";
                var desc = "<div class='list-annuaire__item-description'>"+adress+"<br>"+cp+" "+city+"</div>";
                var containerEnd = "</div></div>";
                var callButton = "<div class='boutonappeler-img col-2'><img class='img-responsive' src='/wp-content/themes/qui-appelle/images/telephone.png' alt=''></div>";
                var wrapperEnd = "</div></div>";
                var cartouch = "<div class='cartouch-img col-12'><img class='img-responsive' src='/wp-content/themes/qui-appelle/images/cartouche.png' alt=''></div>";
                var end = "</a></div>";
                var endcol_8 = "</div>";
                var col_4 = "<div class='col-4'>";
                var annuaire_map = "<div id='map'></div>";
                var endcol_4 = "</div>";
                var endrow = "</div>";


                addrSender.push([JSONObject.code[i]._id.$id, JSONObject.code[i].adresse+', '+JSONObject.code[i].ville+' '+JSONObject.code[i].codepostal]);
                if(JSONObject.code[i].nom != null && JSONObject.code[i].ville !=null){


                    //str += row + col_8 + start + telLink + wrapperStart + containerStart + title + desc + containerEnd + callButton + wrapperEnd + cartouch + end + endcol_8 + col_4 + annuaire_map + endcol_4 + endrow;
                    str += row + col_8 + start + telLink + wrapperStart + containerStart + title + desc + containerEnd + callButton + wrapperEnd + cartouch + end + endcol_8 + endrow;

                    //var address = addrSender[i][1];
                    //tabadd.push(address);
                    //console.log(address);
                    //console.log(tabadd[i]);

                }
                else{
                    str += 'Ville ou nom recherché(e) inconnue';
                }
            }
            result.innerHTML = str;
        }

    }
     var a = document.forms["form-annuaire-part"]["labelNom"].value;
     var b = document.forms["form-annuaire-part"]["labelVille"].value;
     if (a == null || a == "", b == null || b == ""){
         return false;
     }else{
         document.getElementById('loading-part').classList.add("active");
         xmlhttp.open("GET","http://jn650.jn-hebergement.com/WS_118001/index.php?cmd=findname&data="+urlencode(token),false);
         xmlhttp.send();
     }

});


sendNamePro.addEventListener('click', function()
{
    var result = document.getElementById('resultAnnuairePro');
    var payload = '{ "nom": "'+encodeURI(document.getElementById('labelMetier').value)+'|'+'", "ville": "'+encodeURI(document.getElementById('labelVillePro').value)+'" }';
    unsignedToken = base64_encode(header) + '.' + base64_encode(payload);
    signature = CryptoJS.HmacSHA256(unsignedToken, key);
    token = base64_encode(header) + '.' + base64_encode(payload) + '.' + CryptoJS.enc.Base64.stringify(signature);
    //console.log(base64_encode(payload));
    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();

    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function(){

        //result.innerHTML='<%= image_tag("ajax-loader.gif") %>';

        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {

            JSONObject = JSON.parse(xmlhttp.responseText);

            //console.log(JSONObject);
            result.innerHTML = xmlhttp.responseText;
            console.log(JSONObject.code);

            var str ='';

            for (var i = 0; i < JSONObject.code.length; i++){

                /*création des variables correspondant aux champs à afficher*/
                var name = JSONObject.code[i].nom;
                var number = JSONObject.code[i].numero;
                var adress = JSONObject.code[i].adresse;
                var cp = JSONObject.code[i].codepostal;
                var website = JSONObject.code[i].website;
                var city = JSONObject.code[i].ville;
                var id = JSONObject.code[i]._id.$id;
                //----------------------------------------
                var row = "<div class='row'>";
                var col_8 = "<div class='col-12'>";
                var start = "<div class='list-annuaire__item'>";
                var telLink = "<a href='tel:118001'>";
                var wrapperStart = "<div class='col-12 list-annuaire__item-wrap'><div class='row'>";
                var containerStart = "<div class='col-10'><div class='list-annuaire__item-infos'>";
                var title = "<div class='list-annuaire__item-titre'><h2>"+name+"</h2></div>";
                var desc = "<div class='list-annuaire__item-description'>"+adress+"<br>"+cp+" "+city+"</div>";
                var containerEnd = "</div></div>";
                var callButton = "<div class='boutonappeler-img col-2'><img class='img-responsive' src='/wp-content/themes/qui-appelle/images/telephone.png' alt=''></div>";
                var wrapperEnd = "</div></div>";
                var cartouch = "<div class='cartouch-img col-12'><img class='img-responsive' src='/wp-content/themes/qui-appelle/images/cartouche.png' alt=''></div>";
                var end = "</a></div>";
                var endcol_8 = "</div>";
                var col_4 = "<div class='col-4'>";
                var annuaire_map = "<div id='map'></div>";
                var endcol_4 = "</div>";
                var endrow = "</div>";

                /*affichage des variables*/
                if(JSONObject.code[i].nom != null && JSONObject.code[i].ville !=null){
                     //str += '<hr>' + name +number+adress+cp+website+city+hors;
                    //str += row + col_8 + start + telLink + wrapperStart + containerStart + title + desc + containerEnd + callButton + wrapperEnd + cartouch + end + endcol_8 + col_4 + annuaire_map + endcol_4 + endrow;
                    str += row + col_8 + start + telLink + wrapperStart + containerStart + title + desc + containerEnd + callButton + wrapperEnd + cartouch + end + endcol_8 + endrow;
                    //console.log(JSONObject);
                }
                else{
                    str += 'La recherche n\'a pu aboutir.';
                }
            }
            result.innerHTML =  str;
        }

    }
    var a = document.forms["form-annuaire-pro"]["labelMetier"].value;
    var b = document.forms["form-annuaire-pro"]["labelVillePro"].value;
    if (a == null || a == "", b == null || b == ""){
        return false;
    }else{
        document.getElementById('loading-pro').classList.add("active");
        xmlhttp.open("GET","http://jn650.jn-hebergement.com/WS_118001/index.php?cmd=findmetier&data="+urlencode(token),false);
        //xmlhttp.open("GET","http://jn650.jn-hebergement.com/WS_DEV118001/index.php?cmd=findmetier&data="+urlencode(token),false);
        xmlhttp.send();
    }
});
