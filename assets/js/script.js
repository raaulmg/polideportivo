var windowAdminUser = false;
function panelAdminUser(){
    if(!windowAdminUser){
        document.getElementById("panelAdmin").style.display = "none";
        document.getElementById("panelAdminUser").style.display = "block";
        windowAdminUser = true;
    }
    else{
        document.getElementById("panelAdmin").style.display = "block";
        document.getElementById("panelAdminUser").style.display = "none";
        windowAdminUser = false;
    }
}

var windowAdminInsta = false;
function panelAdminInsta(){
    if(!windowAdminUser){
        document.getElementById("panelAdmin").style.display = "none";
        document.getElementById("panelAdminInsta").style.display = "block";
        windowAdminUser = true;
    }
    else{
        document.getElementById("panelAdmin").style.display = "block";
        document.getElementById("panelAdminInsta").style.display = "none";
        windowAdminUser = false;
    }
}

var windowAdminReser = false;
function panelAdminReser(){
    if(!windowAdminUser){
        document.getElementById("panelAdmin").style.display = "none";
        document.getElementById("panelAdminReser").style.display = "block";
        windowAdminUser = true;
    }
    else{
        document.getElementById("panelAdmin").style.display = "block";
        document.getElementById("panelAdminReser").style.display = "none";
        windowAdminUser = false;
    }
}