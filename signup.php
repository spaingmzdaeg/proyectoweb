<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="bibliotecas/bootstrap-3.3.7/dist/css/bootstrap.min.css">
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="bibliotecas/fonts/font-awesome.min.css">
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="css/styleform.css">
     <!--============================CSS==============================-->
     <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">

                <form class="form-container" id="addformuser">
                    <h1>Sign up</h1>    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter userna
me" maxlength="20" minlength="10" required="required">
                      <small id="emailHelp" class="form-text text-muted">
do not share with anyone.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" minlength="10" required="required">
                        <small id="emailHelp" class="form-text text-muted">Please Do no share with anyone.</small>
                      </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="20" minlength="10" required="required">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="confpassword" name="confpassword" placeholder="Password" maxlength="20" minlength="10" required="required">
                      </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" required="required">
                      <label class="form-check-label" for="exampleCheck1">I Agree Terms and Conditions</label>
                    </div>
                    <div class="g-recaptcha" id="g-recaptcha" data-sitekey="6Leaa-IZAAAAAM4w2ns0yYaqE8Wu-9Zem1GqOjDL"></div>
                    <button type="submit" class="btn btn-success btn-block" id="addbuttonuser">SIGN UP</button>
                    <input type="hidden" name="action" value="adduser">
          <input type="hidden" name="userid" id="userid" value="">
                  </form>

            </div>
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
    </div>

    <!--============================SCRIPTS==============================-->
    <script src="bibliotecas/js/jquery-3.5.1.min.js"></script>
    <!--============================SCRIPTS==============================-->
    <script src="bibliotecas/js/bootstrap.min.js"></script>
    <!--============================SCRIPTS==============================-->
    <script src="js/scriptsignup.js"></script>


</body>
</html>