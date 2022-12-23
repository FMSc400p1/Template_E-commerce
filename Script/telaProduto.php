<?php
require 'conexao.php';

$id = $_GET['id'];

$sql = "SELECT * FROM produto WHERE prod_id = ?" ;
    $user = $con->prepare($sql);
    $user->bindValue(1,$id);
    $user->execute();
    //Armazenar os dados da consulta em um array
    $dados = $user->fetch(PDO::FETCH_ASSOC);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T.e-commerce - Produto</title>

    <!-- FAVICON -->
  <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" href="css/reset.css" />

    <!-- GOOGLE FONTS ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
<!-- inicio do header -->
<header>
    <nav class="navbar navbar-expand-lg bg-danger text-light">
      <div class="container-fluid text-light">
      <a class="navbar-brand text-light" href="../index.php"><img src="../img/Logo/logo final 4k muito cara encurtado pra ficar no fit - PNG.png" alt="" width="80px" height="90px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" d-lg-flex mt-3 mt-xl-0 container-fluid justify-content-center">
          <form class="d-flex w-75 mx-auto" role="search" action="./pesquisa_produto.php">
            <input class="form-control me-2" name="txt" type="search" placeholder="Pesquisar..." aria-label="Search" />
            <button class="btn btn-outline-light" type="submit">
              Pesquisar
            </button>
          </form>
        </div>


        <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">


          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <?php
            session_start();
            if (isset($_SESSION['nome'])) {
            ?>
              <li class="nav-item dropdown list-unstyled m-1">
        <a class="nav-link dropdown-toggle btn btn-danger p-2 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo "Olá, " . $_SESSION['nome'];?>
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../form/formUpdateUsuario.php?id=<?=$_SESSION['id'];?>">Editar conta</a></li>
          <li><a class="dropdown-item" href="./scriptlogout.php"> Sair </a></li>
        </ul>
      </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="../Form/formCadUsuario.php">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="../Form/formlogin.php">Login</a>
              </li>

            <?php } ?>

            <li class="nav-item">
              <a class="nav-link text-light text-nowrap" href="../dev.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
              </a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <section class="container-fluid bg-light p-3 d-flex flex-wrap justify-content-center text-dark">

      <div class="row">
        <div class="d-flex justify-content-center ">
          <a href="../dev.php"><button type="button" class="btn btn-danger m-2 bx-sh mx-5">Mercado</button></a>
          <a href="../dev.php"><button type="button" class="btn btn-danger m-2 bx-sh mx-5">Ofertas</button></a>
          <a href="../dev.php"><button type="button" class="btn btn-danger m-2 bx-sh mx-5">Eletronicos</button></a>
        </div>
      </div>

      <li class="nav-item dropdown list-unstyled m-1 mx-5">
        <a class="nav-link dropdown-toggle btn btn-danger p-2 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categorias
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="../dev.php">Celulares</a></li>
          <li><a class="dropdown-item" href="../dev.php">Eletrodomesticos</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="../dev.php">Cama/mesa/banho</a></li>
          <li><a class="dropdown-item" href="../dev.php">Informatica</a></li>
        </ul>
      </li>


    </section>
</header>
<!-- fim do header -->

<!-- Tela produto -->
    <h1 class="text-center pt-3 position-relative"><?=$dados['prod_nome'] ?></h1>

    <h4 class="text-center pt-3">
        Verifique as informações do produto e confirme a forma de pagamento!
    </h4>

    <div class="d-flex justify-content-center align-items-center mt-3">
        <div class="card mb-5 w-100 p-5 mx-auto m-4 alturaTals" style="max-width: 70%;" id="">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../img/<?=$dados['prod_img1']?>" class="img-fluid rounded-3 h-100 border border-danger border-3 p-2" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title h4 pb-2 mb-4 text-danger border-bottom border-danger"> <?=$dados['prod_nome'] ?></h3>
                        <p class="card-text"><?=$dados['prod_desc']?></p>
                        <div class="card-text mx-auto"><strong class=" bg-danger rounded-1 p-2 mb-2 text-white">Valor: R$ <?=$dados['prod_valor'] ?> </strong></div>
                        
                        
                        <br>
                        <h5>Escolha a forma de pagamento:</h5>
                        <div class="d-flex">
                        
                            <div class="d-flex align-items-center flex-column mx-2">
                                
                                <small class="text-muted">
                                    <input type="radio" name="pag"> Débito</small>
                                <small class="text-muted text-decoration-none w-100">
                                    <input class="p-2" type="radio" name="pag"> Pix</small>
                            </div>
                            <div class="row">
                                <small class="text-muted align-items-center flex-column">
                                    <input type="radio" name="pag"> Crédito</small>
                                <small class="text-muted">
                                    <input type="radio" name="pag"> Boleto</small>
                            </div>
                        </div>
                        </p>
                        <a class="btn btn-outline-success btn-sm" href="../dev.php" data-abc="true">Comprar</a>
                        <a class="btn btn-outline-primary btn-sm" href="../dev.php" data-abc="true">Calcular Frete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim tela produto -->

<!-- INICIO DO FOOTER -->
<footer class="container-fluid mt-5 text-center bottom-0">
    <div class="row  mt-5">
      <div class="col-12 bg-light p-4 fs-3">Template E-commerce</div>
    </div>
    <div class="row bg-light">
      <div class="col-sm-3 col-10 pb-3 mx-auto">
        <h4>Desenvolvido por: <br> <h5>Alino Macedo</h5> <h5>Felipe Moraes</h5>  <h5>Marcos Vinicius</h5>  <h5>Sandro Costa</h5> </h4>
      </div>
      <div class="bg-light w-100">
        <div class="col-12 p-3">
          <h4 class="">Mugiwara tech &copy; 2022</h4>
        </div>
      </div>
    </div>

  </footer>
  <!-- FIM DO FOOTER -->

   <!-- script do bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>