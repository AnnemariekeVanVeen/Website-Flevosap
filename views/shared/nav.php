<!-- Navigation -->

<nav class="navbar navbar-expand-lg navbar-dark bg-light fixed-top font-weight-bold d-print-none">
    <div class="container">
        <a class="nav-item" href="#"><img src="src/img/sterrenteam-website.png" alt="logo flevosap"
                                          style="height: 10vh; padding-left: 1.5%"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php?do=default" target="_self">Sappen</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?do=horeca" target="_self">Horeca</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?do=cart">Winkelwagen</a></li>
                <?php
                if (isset($_SESSION['email']) && !empty($_SESSION['email'])): ?>
                    <a class="nav-link" href="index.php?do=account">Account</a>
                    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) : ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?do=adminpage">Beheerder</a></li>
                    <?php endif; ?>
                    <a class="nav-link" href="index.php?do=logout">Uitloggen</a>
                <?php else: ?>

                    <a class="nav-link" href="index.php?do=login">Inloggen</a>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
