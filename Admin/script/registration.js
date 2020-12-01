/*eslint-env browser*/
function validateAdminForm() {

    var Pswrd = document.forms["regForm"]["Pswrd"].value;
    var PswrdConf = document.forms["regForm"]["PswrdConf"].value;
    var matchFlag = true;

    
   
     if (Pswrd != PswrdConf) {
        alert("Password need to match password confirmation");
        matchFlag = false;
     }
   
    
    if(!matchFlag)
        return false;
}