function name(){
    var na=document.getElementById("na");
    na.innerHTML="Name should contain alphabets only";
    na.style.color="red";
}
function name1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}
function user(){
    var na=document.getElementById("na");
    na.innerHTML="Username should contain aplha-numeric character only";
    na.style.color="red";
}
function user1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}
function email(){
    var na=document.getElementById("na");
    na.innerHTML="Enter your Gmail id";
    na.style.color="red";
}
function email1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}
function pass(){
    var na=document.getElementById("na");
    na.innerHTML="Password should have atleast 1 upper 1 lower 1 digit 1 special symbol and atleast 8 length";
    na.style.color="red";
}
function pass1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}
function cpass(){
    var na=document.getElementById("na");
    na.innerHTML="It should be same as password";
    na.style.color="red";
}
function cpass1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}
function address(){
    var na=document.getElementById("na");
    na.innerHTML="It should be of atleast 8 length";
    na.style.color="red";
}
function address1(){
    var na=document.getElementById("na");
    na.innerHTML="";
}

function validate(){
    var pattern1=/^[a-zA-Z ]{3,}$/;
    var pattern2=/^[a-zA-Z0-9]{5,}$/;
    var pattern3= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var pattern4=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/;
    var name=document.getElementsByName("name");
    var user=document.getElementsByName("username");
    var email=document.getElementsByName("email");
    var pass=document.getElementsByName("psw");
    var cpass=document.getElementsByName("psw-repeat");
    var na=name[0].value;
    var us=user[0].value;
    var em=email[0].value;
    var pa=pass[0].value;
    var cp=cpass[0].value;
    if(na.match(pattern1))
    {
        if(us.match(pattern2))
        {
            if(em.match(pattern3))
            {
                if(pa.match(pattern4))
                {
                    if(pa==cp)
                    {
                        alert("everything is good now an otp is sent on your registered email id");
                        return true;
                    }
                    else{
                        alert("confirm password doesn't matches with password");
                        return false;
                    }
                }
                else{
                    alert("password is weak");
                    return false;
                }
            }
            else{
                alert("email is invalid");
                return false;
            }
        }
        else{
            alert("username is invalid");
            return false;
        }
    }
    else{
        alert("name is invalid");
        return false;
    }
}
