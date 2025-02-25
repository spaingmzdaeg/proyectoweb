<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP CRUD Application Using jQuery Ajax</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylemenu.css">
</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#navbar-collapse-main">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/w3newbie2.png">
            </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="active" href="#">HOME</a></li>
                    <li><a href="index.php">LOGIN</a></li>
                    <li><a href="index.php">STADIUMS</a></li>
                    <li><a href="index.php">TEAMS</a></li>
                    <li><a href="index.php">PLAYERS</a></li>
                    <li><a href="index.php">JERSEYS</a></li>
                </ul>
            </div>

        </div>
    
    </nav>


  <div class="container">
    <div class="alert alert alert-primary" role="alert">
      <h4 class="text-primary text-center">Premier League Player Database</h4>
    </div>
    <div class="alert alert-success text-center message" role="alert">

    </div>
<?php
include_once 'form.php';
include_once 'profile.php';
?>
    <div class="row mb-3">
      <div class="col-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userModal" id="addnewbtn">Add New <i
            class="fa fa-user-circle-o"></i></button>
      </div>
      <div class="col-9">
        <div class="input-group input-group-lg">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
          <input type="text" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg" placeholder="Search first name" id="searchinput">
            <input type="text" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg" placeholder="Search last name" id="searchinput2">
            <input type="text" class="form-control" aria-label="Sizing example input"
            aria-describedby="inputGroup-sizing-lg" placeholder="Search country" id="searchinput3">
            <select name="id_team_search" id="id_team_search">
                 <option value="1">AC Milan</option> 
                 <option value="3" selected>Borussia Dortmund</option>
                 <option value="4">Lyon</option>
                 <option value="5">BATE Borisov</option>
                 <option value="6">Schalke 04</option>
                 <option value="7">Wisla Cracow</option>
                 <option value="8">Paris Saint-Germain</option>
                 <option value="9">Juventus</option>
                 <option value="10">Ajax Amsterdam</option>
                 <option value="11">Legia Warsaw</option>
                 <option value="12">Spartak Moscow</option>
              </select>

        </div>
      </div>
      <div class="col-3">
      <a href="includes/logout.php" class="btn btn-primary">LOGOUT</a>
      </div>
      <h1>Bienvenido <?php echo $user->getName();  ?></h1>
    </div>
<?php
include_once 'playerstable.php';
?>
    <nav id="pagination">
    </nav>
    <input type="hidden" name="currentpage" id="currentpage" value="1">
  </div>
  <div>

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/select.js"></script>
    <script src="js/script.js"></script>
    
    
    

    <script>  
 $(document).ready(function(){  
       function check_session()
       {
          $.ajax({
            url:"./includes/CheckSession.php",
            method:"POST",
            success:function(data)
            {
              if(data == '1')
              {
                alert('Your session has been expired!');  
                window.location.href="index.php";
              }
            }
          })
       }
        setInterval(function(){
          check_session();
        }, 300000);  //10000 means 10 seconds
 });  
 </script>
    
  </div>
  <div id="overlay" style="display:none;">
    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;"></div>
    <br />
    Loading...
  </div>
</body>
</html>
