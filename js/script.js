/*function allLetter(inputtxt)
      { 
      var letters = /^[A-Za-z]+$/;
      if(inputtxt.value.match(letters))
      {
      alert('Your name have accepted : you can try another');
      return true;
      }
      else
      {
      alert('Please input alphabet characters only');
      return false;
      }
      }*/

      /*function allnumeric(inputtxt)
      {
         var numbers = /^[0-9]+$/;
         if(inputtxt.value.match(numbers))
         {
        // alert('Your Registration number has accepted....');
        // document.form1.text1.focus();
         return true;
         }
         else
         {
        //alert('Please input numeric characters only');
         //document.form1.text1.focus();
         return false;
         }
      }   */   


function validateFormPlayer() {
  var firstname = document.forms["addform"]["first_name"].value;
  var lastname = document.forms["addform"]["last_name"].value;
  var team = document.forms["addform"]["id_team"].value;
  var kit = document.forms["addform"]["kit"].value;
  var position = document.forms["addform"]["position"].value;
  var country = document.forms["addform"]["country"].value;
  var letters = /^[A-Za-z]+$/;
  var numbers = /^[0-9]+$/;

if(firstname == ""){
  alert("fill the firstname!");
  return false;
}else if(!firstname.match(letters)){
  alert("First name ONLY LETTERS PLEASE!");
  return false;
}else if(firstname.length > 20){
  alert("MAX 20 CHARACTERS");
  return false;
}else if(firstname.length < 4){
  alert("MIN 4 CHARACTERS");
  return false;
}else if(!lastname.match(letters)){
  alert("last name ONLY LETTERS PLEASE!");
  return false;
}else if(lastname.length > 20){
  alert("MAX 20 CHARACTERS");
  return false;
}else if(lastname.length < 4){
  alert("MIN 4 CHARACTERS");
  return false;
}else if(team == 0){
  alert("Select a team please....");
  return false;
}else if(!kit.match(numbers)){
  alert("only numbers!");
  return false;
}else if(kit == ""){
  alert("fill field!");
  return false;
}else if(kit.length > 2){
  alert("only 1 to 99");
  return false;
}else if(position == 0 ){
  alert("select a position");
  return false;
}else if(position == 0 ){
  alert("select a position");
  return false;
}else{
  return true;
}

}


     // validateFormPlayer();



// get pagination
function pagination(totalpages, currentpage) {
    var pagelist = "";
    if (totalpages > 1) {
      currentpage = parseInt(currentpage);
      pagelist += `<ul class="pagination justify-content-center">`;
      const prevClass = currentpage == 1 ? " disabled" : "";
      pagelist += `<li class="page-item${prevClass}"><a class="page-link" href="#" data-page="${
        currentpage - 1
      }">Previous</a></li>`;
      for (let p = 1; p <= totalpages; p++) {
        const activeClass = currentpage == p ? " active" : "";
        pagelist += `<li class="page-item${activeClass}"><a class="page-link" href="#" data-page="${p}">${p}</a></li>`;
      }
      const nextClass = currentpage == totalpages ? " disabled" : "";
      pagelist += `<li class="page-item${nextClass}"><a class="page-link" href="#" data-page="${
        currentpage + 1
      }">Next</a></li>`;
      pagelist += `</ul>`;
    }
  
    $("#pagination").html(pagelist);
  }
  
  // get player row
  function getplayerrow(player) {
    var playerRow = "";
    if (player) {
      const userphoto = player.photo ? player.photo : "default.png";
      playerRow = `<tr>
            <td class="align-middle"><img src="uploads/${userphoto}" class="img-thumbnail rounded float-left"></td>
            <td class="align-middle">${player.id_team}</td>
            <td class="align-middle">${player.first_name}</td>
            <td class="align-middle">${player.last_name}</td>
            <td class="align-middle">${player.kit}</td>
            <td class="align-middle">${player.position}</td>
            <td class="align-middle">${player.country}</td>
            <td class="align-middle">
              <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal"
                title="Prfile" data-id="${player.id_player}"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
              <a href="#" class="btn btn-warning mr-3 edituser" data-toggle="modal" data-target="#userModal"
                title="Edit" data-id="${player.id_player}"><i class="fa fa-pencil-square-o fa-lg"></i></a>
              <a href="#" class="btn btn-danger deleteuser" data-userid="14" title="Delete" data-id="${player.id_player}"><i
                  class="fa fa-trash-o fa-lg"></i></a>
            </td>
          </tr>`;
    }
    return playerRow;
  }
  // get players list
  function getplayers() {
    var pageno = $("#currentpage").val();
    $.ajax({
      url: "/phpcrudajaxspain/ajax.php",
      type: "GET",
      dataType: "json",
      data: { page: pageno, action: "getusers" },
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (rows) {
        console.log(rows);
        if (rows.players) {
          var playerslist = "";
          $.each(rows.players, function (index, player) {
            playerslist += getplayerrow(player);
          });
          $("#userstable tbody").html(playerslist);
          let totalPlayers = rows.count;
          let totalpages = Math.ceil(parseInt(totalPlayers) / 4);
          const currentpage = $("#currentpage").val();
          pagination(totalpages, currentpage);
          $("#overlay").fadeOut();
        }
      },
      error: function () {
        console.log("something went wrong");
      },
    });
  }
  
  $(document).ready(function () {
    // add/edit user   
    $(document).on("submit", "#addform", function (event) {

      var first_name = $("#first_name").val();
      var last_name = $("#last_name").val();
      var id_team = $("#id_team").val();
      var kit = $("#kit").val();
      var position = $("#position").val();
      
      console.log(first_name);
      console.log(last_name);
      console.log(id_team);
      console.log(kit);
      console.log(position);
 
  //var exampleCheck1 = $("#exampleCheck1").val();


  //console.log(exampleCheck1);
  $.ajax({
      type: "POST",
      url: "playerProcess.php",
      dataType: "json",
      data: {first_name:first_name, last_name:last_name, id_team:id_team, kit:kit,position:position},
      success : function(data){
          if (data.code == "200"){
              alert("Success PHP: " +data.msg);
          } else {
              $(".display-error").html("<ul>"+data.msg+"</ul>");
              $(".display-error").css("display","block");
          }
      },error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
      }
  });

      //////////////js
      if(!validateFormPlayer()){
        event.preventDefault();
        alert("Fail with Register");
      }else{
        event.preventDefault();
        var alertmsg =
          $("#userid").val().length > 0
            ? "Player has been updated Successfully!"
            : "New Player has been added Successfully!";
        $.ajax({
          url: "/phpcrudajaxspain/ajax.php",
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
              $("#userModal").modal("hide");
              $("#addform")[0].reset();
              $(".message").html(alertmsg).fadeIn().delay(3000).fadeOut();
              getplayers();
              $("#overlay").fadeOut();
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
          },
        });
      }
      
    });
     $(document).on("click", "a.edituser", function () {
    var pid = $(this).data("id");

    $.ajax({
      url: "/phpcrudajaxspain/ajax.php",
      type: "GET",
      dataType: "json",
      data: { id_player: pid, action: "getuser" },
      beforeSend: function () {
        $("#overlay").fadeIn();
      },
      success: function (player) {
        if (player) {
          $("#id_team").val(player.id_team);
          $("#first_name").val(player.first_name);
          $("#last_name").val(player.last_name);
          $("#kit").val(player.kit);
          $("#position").val(player.position);
          $("#country").val(player.country);
          $("#userid").val(player.id_player);
        }
        $("#overlay").fadeOut();
      },
      error: function () {
        console.log("something went wrong");
      },
    });
  });

  // delete user
  $(document).on("click", "a.deleteuser", function (e) {
    e.preventDefault();
    var pid = $(this).data("id");
    console.log(pid);
    if (confirm("Are you sure want to delete this?")) {
      $.ajax({
        url: "/phpcrudajaxspain/ajax.php",
        type: "GET",
        dataType: "json",
        data: { id_player: pid, action: "deleteuser" },
        beforeSend: function () {
          $("#overlay").fadeIn();
        },
        success: function (res) {
          if (res.deleted == 1) {
            $(".message")
              .html("Player has been deleted successfully!")
              .fadeIn()
              .delay(3000)
              .fadeOut();
            getplayers();
            $("#overlay").fadeOut();
          }
        },
        error: function () {
          console.log("something went wrong");
        },
      });
    }
  });
  // get profile

  $(document).on("click", "a.profile", function () {
    var pid = $(this).data("id");
    $.ajax({
      url: "/phpcrudajaxspain/ajax.php",
      type: "GET",
      dataType: "json",
      data: { id_player: pid, action: "getuser" },
      success: function (player) {
        if (player) {
          const userphoto = player.photo ? player.photo : "default.png";
          const profile = `<div class="row">
                <div class="col-sm-6 col-md-4">
                  <img src="uploads/${userphoto}" class="rounded responsive" />
                </div>
                <div class="col-sm-6 col-md-8">
                  <h4 class="text-primary">${player.first_name}</h4>
                  <p class="text-secondary">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i> ${player.last_name}
                    <br />
                    <i class="fa fa-phone" aria-hidden="true"></i> ${player.kit}
                  </p>
                </div>
              </div>`;
          $("#profile").html(profile);
        }
      },
      error: function () {
        console.log("something went wrong");
      },
    });
  });
    // pagination
    $(document).on("click", "ul.pagination li a", function (e) {
      e.preventDefault();
      var $this = $(this);
      const pagenum = $this.data("page");
      $("#currentpage").val(pagenum);
      getplayers();
      $this.parent().siblings().removeClass("active");
      $this.parent().addClass("active");
    });
    // form reset on new button
    $("#addnewbtn").on("click", function () {
      $("#addform")[0].reset();
      $("#userid").val("");
    });
  
  
    // searching
    $("#searchinput").on("keyup", function () {
      const searchText = $(this).val();
      if (searchText.length > 1) {
        $.ajax({
          url: "/phpcrudajaxspain/ajax.php",
          type: "GET",
          dataType: "json",
          data: { searchQuery: searchText, action: "search" },
          success: function (players) {
            if (players) {
              var playerslist = "";
              $.each(players, function (index, player) {
                playerslist += getplayerrow(player);
              });
              $("#userstable tbody").html(playerslist);
              $("#pagination").hide();
            }
          },
          error: function () {
            console.log("something went wrong");
          },
        });
      } else {
        getplayers();
        $("#pagination").show();
      }
    });

    // searching
    $("#searchinput2").on("keyup", function () {
      const searchText2 = $(this).val();
      if (searchText2.length > 1) {
        $.ajax({
          url: "/phpcrudajaxspain/ajax.php",
          type: "GET",
          dataType: "json",
          data: { searchQuery: searchText2, action: "search2" },
          success: function (players) {
            if (players) {
              var playerslist = "";
              $.each(players, function (index, player) {
                playerslist += getplayerrow(player);
              });
              $("#userstable tbody").html(playerslist);
              $("#pagination").hide();
            }
          },
          error: function () {
            console.log("something went wrong");
          },
        });
      } else {
        getplayers();
        $("#pagination").show();
      }
    });


     // searching
     $("#searchinput3").on("keyup", function () {
      const searchText3 = $(this).val();
      if (searchText3.length > 1) {
        $.ajax({
          url: "/phpcrudajaxspain/ajax.php",
          type: "GET",
          dataType: "json",
          data: { searchQuery: searchText3, action: "search3" },
          success: function (players) {
            if (players) {
              var playerslist = "";
              $.each(players, function (index, player) {
                playerslist += getplayerrow(player);
              });
              $("#userstable tbody").html(playerslist);
              $("#pagination").hide();
            }
          },
          error: function () {
            console.log("something went wrong");
          },
        });
      } else {
        getplayers();
        $("#pagination").show();
      }
    });

    // load players
    getplayers();
  });

  
  //validation



      //validateFormPlayer();