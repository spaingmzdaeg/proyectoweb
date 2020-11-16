/*function validateForm() {	
  var recaptcha = document.forms["addformuser"]["g-recaptcha-response"].value;
  if (recaptcha == "") {
      alert("Please fill reCAPTCHA");
      return false;
}else{
  alert("true");
  return true;
}
}*/

function emailIsValid (email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}



function validateForm() {
  var username = document.forms["addformuser"]["username"].value;
  var email = document.forms["addformuser"]["email"].value;
  var password = document.forms["addformuser"]["password"].value;
  var confpassword = document.forms["addformuser"]["confpassword"].value;
  var exampleCheck1 = document.forms["addformuser"]["exampleCheck1"].value;
  
  if (username == "") {
    alert("username must be filled out");
    return false;
  }else if(username.length < 10){
    alert(" please min 10 characters ");
    return false;
  }else if(username.length > 20){
    alert(" please max 20 characters ");
    return false;
  }else if(email == ""){
    alert("email must be filled out");
    return false;
  }else if(!emailIsValid(email)){
    alert("invalid email!");
    return false;
  }else if(password.length < 10){
    alert(" please min 10 characters ");
    return false;
  }else if(password.length > 20){
    alert(" please max 20 characters ");
    return false;
  }else if(password == ""){
    alert("password must be filled out");
    return false;
  }else if(confpassword == ""){
    alert("confirm your password");
    return false;
  }else if(password != confpassword){
    alert(" Passwords must be the same! ");
    return false;
  }
  else if(!exampleCheck1.checked){
    alert("check de terms");
    return false;
  }else {
    return true;
  }
}



$('form').on('submit', function(e) {
  
  if(validateForm()){
    if(grecaptcha.getResponse() == "") {
      e.preventDefault();
      alert("You can't proceed! FILL CAPTCHA");
    } else {
      event.preventDefault();
        var alertmsg =
          $("#addbuttonuser").val().length > 0
            ? "User has been updated Successfully!"
            : "New User has been added Successfully!";
  
        $.ajax({
          url: "/phpcrudajaxspain/ajaxusers.php",
          type: "POST",
          dataType: "text",
          data: new FormData(this),
          processData: false,
          contentType: false,
          beforeSend: function () {
            $("#overlay").fadeIn();
          },
          success: function (response) {
            console.log(response);
            if (response) {
              
              $("#addformuser")[0].reset();
              $(".message").html(alertmsg).fadeIn().delay(3000).fadeOut();
             // getplayers();
              $("#overlay").fadeOut();
              document.location.href = 'index.php';
              
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
          },
        });
      alert("User CREATED");
    }
  }
  
  
});



//var response = grecaptcha.getResponse();





