// JavaScript Document
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?q=1",true);
        xmlhttp.send();
    }
}

function showDevices(str) {
    if (str == "") {
		 document.getElementById("devices").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("devices").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?quest=devices&req="+str,true);
        xmlhttp.send();
    }
}

function showDevice_details(type,devID,caract) {
    if (type == null || devID== null) {
		 document.getElementById("device_details").innerHTML = "Erroe while Loading!";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("device_details").innerHTML = xmlhttp.responseText;
                document.getElementById("device_details").innerHTML = xmlhttp.responseText;
            }
        };
		if(caract=="N")
        	xmlhttp.open("GET","chiamateDB.php?quest=devices_details&type="+type+"&devID="+devID,true);
        else
			xmlhttp.open("GET","chiamateDB.php?quest=devices_caracteristich&type="+type+"&devID="+devID,true);
		xmlhttp.send();
    }
}

function showAssistance(str){
	 if (str == "") {
		 document.getElementById("assistenza").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("assistenza").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?quest=assistenza&req="+str,true);
        xmlhttp.send();
    }
	
}

function showAssistance_details(assID) {
    if (assID=="") {
		 document.getElementById("assistance_details").innerHTML = "Erroe while Loading!";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("device_details").innerHTML = xmlhttp.responseText;
                document.getElementById("assistance_details").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?quest=assistance_details&assID="+assID,true);
        xmlhttp.send();
    }
}

function showSLServices(str) {
    if (str == "") {
		 document.getElementById("service").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("service").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?quest=service&req="+str,true);
        xmlhttp.send();
	}
}


//not used
function showDevice_caracteristich(type,devID) {
    if (type == "" || devID=="") {
		 document.getElementById("device_caracteristich").innerHTML = "Erroe while Loading!";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//                document.getElementById("device_details").innerHTML = xmlhttp.responseText;
                document.getElementById("device_caracteristich").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","chiamateDB.php?quest=device_caracteristich&type="+type+"&devID="+devID,true);
        xmlhttp.send();
    }
}