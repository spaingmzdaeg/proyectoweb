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





$('form').on('submit', function(e) {
  $(document).ready(function() {
    $("#addformuser").validate({
      rules: {
        username : {
          required: true,
          minlength: 10,
          maxlength:20
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 10,
          maxlength:20
        },
        confpassword:{
          required: true,
          minlength: 10,
          maxlength:20
        },
        exampleCheck1:{
          required: true
        }
      }
    });
  });
  
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
});



//var response = grecaptcha.getResponse();





