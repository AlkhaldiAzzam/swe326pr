/*eslint-env browser*/
function validateForm() {
    var ID = document.forms["regForm"]["ID"].value;
    var FName = document.forms["regForm"]["FName"].value;
    var LName = document.forms["regForm"]["LName"].value;
    var Email = document.forms["regForm"]["Email"].value;
    var Pswrd = document.forms["regForm"]["Pswrd"].value;
    var PswrdConf = document.forms["regForm"]["PswrdConf"].value;
    var regReason = document.forms["regForm"]["regReason"].value;
    var IDFlag, FNameFlag, LNameFlag, EmailFlag, PswrdFlag, PswrdConfFlag, regReasonFlag;
    IDFlag = true;
    FNameFlag = true;
    LNameFlag = true;
    EmailFlag = true;
    PswrdFlag = true;
    PswrdConfFlag = true;
    regReasonFlag = true;
    
    if(IDFlag)
    {
        var regularExp = /^\d+$/;
        var IDTest = regularExp.test(ID);
        var IDLen = ID.length
        if(IDLen != 9)
        {
            document.getElementById("IDValid").innerHTML = "<i class='fa fa-close'>ID must be exactly 9 digits</i>";
            IDFlag = false;
        }
        else if(!IDTest)
        {
             document.getElementById("IDValid").innerHTML = "<i class='fa fa-close'>Only numbers are accepted for ID</i>";
            IDFlag = false;
        }
        else
        {
            document.getElementById("IDValid").innerHTML = "";
            IDFlag = true;
        }
    }
    if(FNameFlag)
    {
        regularExp = /^[a-zA-Z]+$/;
        var FNameTest = regularExp.test(FName);
        if(!FNameTest)
        {
            document.getElementById("FNameValid").innerHTML = "<i class='fa fa-close'>Only english letters are accepted for name</i>";
            FNameFlag = false;
        }
        else
        {
            document.getElementById("FNameValid").innerHTML = "";
            FNameFlag = true;
        }
    }
    if(LNameFlag)
    {
        regularExp = /^[a-zA-Z]+$/;
        var LNameTest = regularExp.test(LName);
        if(!LNameTest)
        {
            document.getElementById("LNameValid").innerHTML = "<i class='fa fa-close'>Only english letters are accepted for name</i>";
            LNameFlag = false;
        }
        else
        {
            document.getElementById("LNameValid").innerHTML = "";
            LNameFlag = true;
        }
    }
    if(EmailFlag)
    {
        var atpos = Email.indexOf("@");
        var dotpos = Email.lastIndexOf(".");

        if (atpos < 1 || ( dotpos - atpos < 2 )) 
        {
            document.getElementById("EmailValid").innerHTML = "<i class='fa fa-close'>Please enter a valid email address</i>";
            EmailFlag = false;
        }
        else
        {
            document.getElementById("EmailValid").innerHTML = "";
            EmailFlag = true;
        }
    }
    if(PswrdFlag)
    {
        regularExp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
        var PswrdTest = regularExp.test(Pswrd);
        if(!PswrdTest)
        {
            document.getElementById("PswrdValid").innerHTML = "<i class='fa fa-close'>Password should contain at least 8 characters: at least 1 digit, 1 lower case, 1 uppercase</i>";
            PswrdFlag = false;
        }
        else
        {
            document.getElementById("PswrdValid").innerHTML = "";
            PswrdFlag = true;
            if (Pswrd != PswrdConf) {
                document.getElementById("PswrdMatch").innerHTML = "<i class='fa fa-close'>Password confirmation needs to match the actual password</i>";
                PswrdConfFlag = false;
            }
            else
            {
                document.getElementById("PswrdMatch").innerHTML = "";
                PswrdConfFlag = true;
            }
        }
    }
    if(regReasonFlag)
    {
        regularExp = /^[a-zA-Z]{30,}$/;
        var regReasonTest = regularExp.test(regReason);
        if(!regReasonTest)
        {
            document.getElementById("regReasonValid").innerHTML = "<i class='fa fa-close'>Description should contain more than 30 characters</i>";
            regReasonFlag = false;
        }
        else
        {
            document.getElementById("regReasonValid").innerHTML = "";
            regReasonFlag = true;
        }
    }
    
    if(!IDFlag || !FNameFlag || !LNameFlag || !EmailFlag || !PswrdFlag || !PswrdConfFlag || !regReasonFlag)
        return false;
}