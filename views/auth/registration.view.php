<!-- User registrates account (user interface) -->

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4" style="border:0; height: 140vh">
                <div class="card-body">
                    <form action="index.php?do=createuser" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center py-3 font-weight-bold"
                                     style="text-decoration-line:underline "><?php
                                    echo Session::getFlash('alert');
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <h3 class="my-4 text-center">Vul uw gegevens in:</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <div class="form-label-group">
                                        <input class="form-control mb-2" type="text" id="first_name" name="first_name"
                                               placeholder="Voornaam" required autofocus>
                                        <label for="first_name">Voornaam</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input class="form-control mb-2" type="text" id="last_name" name="last_name"
                                               placeholder="Achternaam" required autofocus>
                                        <label for="last_name">Achternaam</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="city" class="form-control mb-2" name="city"
                                               placeholder="Woonplaats"
                                               required autofocus>
                                        <label for="city">Woonplaats</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="street" class="form-control mb-2" name="street"
                                               placeholder="Straat"
                                               required autofocus>
                                        <label for="street">Straat</label>
                                    </div>
                                </div>
                                <div class="col-md-5 mx-auto">
                                    <div class="form-label-group">
                                        <input type="number" id="housenumber" class="form-control mb-2"
                                               name="housenumber"
                                               placeholder="Huisnummer"
                                               required autofocus>
                                        <label for="housenumber">Huisnummer</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="zipcode" class="form-control mb-2" name="zipcode"
                                               placeholder="Postcode"
                                               required autofocus>
                                        <label for="zipcode">Postcode</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="email" id="email" class="form-control mb-2" name="email"
                                               placeholder="Emailadres"
                                               required autofocus>
                                        <label for="email">Emailadres</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password" class="form-control" name="password"
                                               placeholder="Wachtwoord" required>
                                        <label for="password">Wachtwoord</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <button class="btn btn-lg btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Registreer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
