<?php

session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Acessar</title>

  <!-- Imports -->
  <script src="js/jquery.min.js"></script>
  <script src="js/function_login.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="css/page_login.css">
</head>

<body>
  <!-- Login Form -->
  <section class="vh-100 gradient-custom">
    <div class="container py-4 h-100">
      <div class="row d-flex justify-content-center align-items-center h-75">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-4 text-center">

              <div class="mb-sm-4 mt-md-1 pb-3">
                <form action="index.php" method="post">
                  <h3 class="fw-bold mb-2 text-uppercase">Acessar</h3>
                  <p class="text-white-50 mb-5">Entre com seu Usuario e Senha</p>

                  <div class="form-outline form-white mb-4">
                    <input type="text" id="user_login" name="user_login" class="form-control form-control-lg" />
                    <label class="form-label" for="user_login">Usuario</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input type="password" id="user_pass" name="user_pass" class="form-control form-control-lg" />
                    <span toggle="#user_pass" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <label class="form-label" for="user_pass">Senha</label>
                    
                    <!-- This php get the response from session.php and print the error message if erro -->

                    <?php if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                            echo "<p class='zoom-in-zoom-out'>Usuario ou Senha Errado<p>";} ?>  

                  </div>
                  
                  <p class="small mb-5 pb-lg-2"><a class="text-primary-50" href="#!">Esqueceu a Senha?</a></p>

                  <button class="btn btn-outline-light btn-lg px-5" type="submit">Entrar</button>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</body>

</html>