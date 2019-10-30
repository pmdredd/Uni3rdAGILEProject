var count=0 //Counter for failed Attempts for Login function
function Login(){ //Will prefrom login function WIP
var userlogin = document.getElementById("username").value;
var userpassword = document.getElementById("password").value;

 
if (count<10){ 
if(userlogin !== "Laird" || userpassword!== "Ab123456"){ //Static Placeholder untill backend functionality for 
    //different user acccounts can be made
        ++count;
    attempts=11-count; //Anti Counter for lockout attempts
    alert("Username or Password is incorrect.\nAttempts Remaining :" + attempts); //Displays login failure and number of attepmts remaining
}   
else{count=0;
 alert("Login Sucessful");   
 window.location = "SystemHome.php";
    }
} else{
alert("Too many faild attempts made!"); //Locks out user for too many failed attempts   
    
}   
}
function RaiseRequest(){
    var subject =document.getElementById("selsubjects").options[document.getElementById('selsubjects').selectedIndex].text;
    var details =document.getElementById("requestinfo").value;
    
    if(details===""){
     //Checks for empty fields   
 alert ("Please fill in the Information box");  
 return; //Stops function so user can edit boxes to fix error    
        
    } else{

   alert("Request Raised Details are \nSubject: " +subject + 
           "\nDetails : " + details);
        window.location = "SystemHome.php";
    }
        
    
}

function checkemail(email){
    var emailchecker = /\S+@\S+\.\S+/; //Email validate checks for text in valid email format X@X.X
    var validemail = emailchecker.test(email);
    return validemail;
        if (email=== checkmail){
            return true;
            
        }else return false;
}

function Register(){ //New Account function WIP
 var firstname=document.getElementById("firstname").value;
   var lastname=document.getElementById("lastname").value;
   var depname=document.getElementById("depname").value;
   var location=document.getElementById("location");
   var email=document.getElementById("email").value;
   var password1=document.getElementById("password1").value;  
   var password2=document.getElementById("password2").value;
    
if (firstname==="" || lastname==="" || depname==="" || location==="" || email==="" || password1==="" || password2===""){    
 //Checks for empty fields   
 alert ("Please fill in empty boxes");  
 return; //Stops function so user can edit boxes to fix error
}   else if(!checkemail(email)){
    alert ("Please enter valid Email Address");
    return; //stops porccessing if error
    
}
else if (password1!==password2){
    alert("Passwords do not match"); 
return; //Stops function so user can edit boxes to fix error
} else
    alert("Account Creation Sucessfull"); //Placeholder for account creation
    window.location = "index.php"; //returns user to login page
    
    
    
}

function EditAccount(){ //Barebones untill proper account storage is determinded
    var editfirstname=document.getElementById("editfirstname").value;
   var editlastname=document.getElementById("editlastname").value;
   var editdepname=document.getElementById("editdepname").value;
   var editlocation=document.getElementById("editlocation");
   var editemail=document.getElementById("editemail").value;
   var editpassword1=document.getElementById("editpassword1").value;  
   var editpassword2=document.getElementById("editpassword2").value;
   
   if (editemail===""){
       if (editpassword1!==editpassword2){
    alert("Passwords do not match"); 
return; //Stops function so user can edit boxes to fix error
       }else if(confirm("Are you sure you want to commit the change")){
        window.location = "SystemHome.php";
   } else
       return;//stops porccessing if error
   }else
   if(!chekemail(editemail)){
     alert ("Please enter valid Email Address");
    return; //stops porccessing if error
   }
       }


function ResetPassword(){ //Reset Password Function WIP
  var resetpassword1 = document.getElementById("resetpassword1").value;
  var resetpassword2 = document.getElementById("resetpassword2").value;
  var searchusername = document.getElementById("searchusername").value;
  
  if (resetpassword1==="" || resetpassword2==="" || searchusername===""){  
       alert ("Please fill in empty boxes");
       return; //Stops function so user can edit boxes to fix error
   } else if(resetpassword1!==resetpassword2){
        alert("Passwords do not match"); 
      return; //Stops function so user can edit boxes to fix error
} else
    alert("Password Sucessfully Reset"); //Placeholder for password reset
    window.location = "index.php"; //returns user to login page
    
  }
    
function RequestSearch(){
    
 var requestno = document.getElementById("searchrequestno").value;
 
 if (requestno===""){
     
     alert("Please fill in search box");
     return;
 } else
         alert("Here is your request");
       window.location = "SystemHome.php";
 }
    
    
