<?php //not hack?>
<!-- Navbar -->
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success ">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <!-- Navbar brand -->
            <span class="navbar-brand" href="#">
            <img src="../icons/miniLogo.png" alt="" width="35" height="33" class="d-inline-block align-top">
            Домашняя библиотека</span>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="about" href="#">О проекте</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="review" href="#">Отзывы</a>
                    </li>
                </ul>
            </div>

            <form class="d-flex input-group w-100" style=" margin-right: 40px;">
                <input type="search" class="form-control" placeholder="Поиск по каталогу" aria-label="Search"/>
                <button type="button" class="btn btn-outline-light">Найти</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <a class="nav-link" href="../php/exit.php">Выйти</a>
            </ul>
        </div>
        <!-- Container wrapper -->
    </nav>
</div>
