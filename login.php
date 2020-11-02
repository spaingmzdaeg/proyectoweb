<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="bibliotecas/bootstrap-3.3.7/dist/css/bootstrap.min.css">
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="bibliotecas/fonts/font-awesome.min.css">
     <!--============================CSS==============================-->
     <link rel="stylesheet" href="css/styleform.css">
     <!--============================CSS==============================-->
</head>
<body>
    <div class="container-fluid bg">
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12"></div>
            <div class="col-md-4 col-sm-4 col-xs-12">

                <form class="form-container">
                    <h1>Login</h1>    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">No compartas tus datos con nadie.</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Aceptar terminos y condiciones</label>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Enviar</button>
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

</body>
</html>