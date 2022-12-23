<?php
require 'conexao.php';
//empty verificar se a variavel esta vazia/nuss
//isset verificar  existencia da variavel
if (isset($_GET['txt']) and !empty($_GET['txt'])) {
    $txt = $_GET['txt'];
    $sql = "SELECT * FROM produto WHERE prod_nome LIKE ?";
    $user = $con->prepare($sql);
    $user->bindValue(1, "%$txt%");
    $user->execute();

    // echo $user->rowCount();

    $dados = $user->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T.e-commerce - Pesquisar Produto</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" href="../img/FavIcon/favicon.ico" type="image/x-icon">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title></title>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <!-- CSS -->
        <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/imgs.css" />
        <link rel="stylesheet" href="css/icon.css" />
        <link rel="stylesheet" href="css/carrossel.css" />
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/header.css">

        <!-- GOOGLE FONTS ICONS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- SWIPER -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

        <!-- BOOTSTRAP -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    </head>

    <body>
        <!-- INICIO DA HEADER-->
        <header>
            <nav class="navbar navbar-expand-lg bg-danger text-light">
                <div class="container-fluid text-light">
                    <a class="navbar-brand text-light" href="../index.php"><img src="../img/Logo/logo final 4k muito cara encurtado pra ficar no fit - PNG.png" alt="" width="80px" height="90px"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class=" d-lg-flex mt-3 mt-xl-0 container-fluid justify-content-center">
                        <form class="d-flex w-75 mx-auto" role="search" action="#">
                            <input class="form-control me-2" type="search" name="txt" placeholder="Pesquisar..." aria-label="Search" />
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
                                echo "Olá, " . $_SESSION['nome'];
                            ?>
                                <br>
                                <div class=" d-lg-flex mt-1 mb-2 container-fluid justify-content-center">
                                    <a href="scriptlogout.php" class="btn btn-outline-light"> Sair</a>
                                </div>
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
        <!-- FIM DO HEADER-->


        <!-- INICIO DA MAIN -->
        <main>


            <section>

                <h2 class="text-start m-5">Estes são os seus resultados de busca
                    <span class="material-symbols-outlined text-danger fs-2">
                        search_check
                    </span>
                </h2>

                <div class="text-danger text-center ">
                    <h2>
                        <?php
                        if (empty($_GET['txt'])) {
                        ?><p style="height: 43vh;"><?php echo "Não foram achados resultados para essa pesquisa."; ?>
                            <p><span class="material-symbols-outlined fs-1">
                                    sentiment_dissatisfied
                                </span></p>
                        <?php } ?></p><?php
                                        ?>
                    </h2>

                </div>


                <?php
                if (isset($dados)) { ?>

                    <?php foreach ($dados as $i) { ?>

                        <div class="card mb-3 mx-auto  border-danger " style="max-width: 70%;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/<?= $i['prod_img1'] ?>" class="img-fluid rounded-start h-100" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body h-auto">
                                        <h5 class="card-title h4 pb-2 mb-4 text-danger border-bottom border-danger"><?= $i['prod_nome'] . "<br>"; ?></h5>
                                        <p class="card-text"><?= $i['prod_desc'] . "<br>"; ?></p>


                                        <!-- area de preco -->
                                        <div class="text-end mx-auto">
                                            <p class="card-text mx-auto"><small class="border border-danger p-2 rounded text-danger pl-20">Valor: R$
                                                    <?= $i['prod_valor'] . "<br>"; ?> </small></p>
                                            <a class="btn btn-outline-success btn-sm" href="telaProduto.php?id=<?= $i['prod_id'] ?>" data-abc="true">Detalhes</a>
                                            <a class="btn btn-outline-primary btn-sm" href="../dev.php" data-abc="true">Calcular Frete</a>
                                            <a class="btn btn-outline-primary" href="../dev.php" data-abc="true">Adicionar ao
                                                <span class="material-symbols-outlined fs-6"> shopping_cart </span>
                                            </a>
                                        </div>
                                        <!--Fim area de preco  -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                <?php } ?>

            </section>
        </main>
        <!-- FIM DA MAIN -->

        <!-- INICIO DO FOOTER -->
        <footer class="container-fluid mt-5 text-center bottom-0">
            <div class="row  mt-5">
                <div class="col-12 bg-light p-4 fs-3">Template E-commerce</div>
            </div>
            <div class="row bg-light">
                <div class="col-sm-3 col-10 pb-3 mx-auto">
                    <h4>Desenvolvido por: <br>
                        <h5>Alino Macedo</h5>
                        <h5>Felipe Moraes</h5>
                        <h5>Marcos Vinicius</h5>
                        <h5>Sandro Costa</h5>
                    </h4>
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

</body>

</html>