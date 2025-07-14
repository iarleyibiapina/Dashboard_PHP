<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="/home">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="/charts">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Graficos
                </a>
                <a class="nav-link" href="/table">
                <!-- <a class="nav-link" href="/table"> -->
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tabelas
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logado como:</div>
            <?= $User ?>
        </div>
    </nav>
</div>