<?php
include VIEW_URL . 'sistema/partials/header.php' ?>

<?php include VIEW_URL . 'sistema/partials/navbar.php'; ?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <?php include VIEW_URL . 'sistema/partials/sidebar.php' ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Charts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                        <li class="breadcrumb-item active">Charts</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area me-1"></i>
                            Area Chart Example
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Grafico de Barra
                                </div>
                                <div class="card-body">
                                    <!-- <div id="loading-barra" style="text-align: center;">
                                        <img src="<?= ASSETS . 'img/loading.gif' ?>" alt="Carregando dados..." width="100">
                                        <p>Carregando...</p>
                                    </div> -->
                                    <canvas id="myBarChart" width="100%" height="50"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Dados atualizados do sistema</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Gráfico de Pizza
                                </div>
                                <div class="card-body">
                                    <div id="loading-pizza" style="text-align: center;">
                                        <img src="<?= ASSETS . 'img/loading.gif' ?>" alt="Carregando dados..." width="100">
                                        <p>Carregando...</p>
                                    </div>
                                    <canvas id="myPieChart" width="100%" height="50" style="display: none;"></canvas>
                                </div>
                                <div class="card-footer small text-muted">Dados atualizados do sistema</div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
<?php include VIEW_URL . 'sistema/partials/footer.php' ?>
<!-- <script src="<?php # ASSETS . 'Js/Graficos/grafico-pizza.js' ?>"></script> -->