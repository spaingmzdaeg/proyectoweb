$(document).ready(function () {
    // add/edit user
    $(document).on("submit", "#addformuser", function (event) {
      event.preventDefault();
      var alertmsg =
        $("#addbuttonuser").val().length > 0
          ? "Player has been updated Successfully!"
          : "New Player has been added Successfully!";
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
          }
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
                  console.log(textStatus);
                  console.log(errorThrown);
        },
      });
    });
});