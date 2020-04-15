<!-- User logins (user interface) -->

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <div class="text-center pb-3 font-weight-bold" style="text-decoration-line:underline "><?php
                                echo Session::getFlash('alert');
                                ?>
                            </div>
                            <h3 class="login-heading mb-4 text-center">Uw inloggevens</h3>
                            <form action="index.php?do=check" method="post">
                                <div class="form-label-group">
                                    <input class="form-control mb-2" type="email" id="email" name="email"
                                           placeholder="Emailadres" required autofocus>
                                    <label for="username">Emailadres</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="password" class="form-control" name="password"
                                           placeholder="Password" required autofocus>
                                    <label for="password">Wachtwoord</label>
                                </div>
                                <button class="btn btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                        type="submit">Inloggen
                                </button>
                            </form>
                            <h6 class="login-heading m-5 text-center">Nog niet geregistreerd? <a
                                        href="index.php?do=registerform">Registreer hier</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
