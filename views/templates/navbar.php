<nav class="navbar navbar-expand-lg bg-dark p-3" id="headerNav" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand d-block d-lg-none" href="#">
            <img src="/public/assets/img/logo.png" height="80" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link mx-2 <?= $addPage ? 'active' : "" ?>" aria-current="page" href="/controllers/form/add-ctrl.php">Add</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link mx-2" href="/controllers/form/add-ctrl.php">
                        <img src="/public/assets/img/logo.png" height="80" />
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2 <?= $listPage ? 'active' : "" ?>" href="/controllers/form/list-ctrl.php">List</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">