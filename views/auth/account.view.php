<!-- Account settings (user interface)-->

<div class="container mt-5 pt-4 mb-3">
    <div class="row">
        <div class="col-lg-12 my-3">
            <h1 class="text-center">Welkom bij je account, <?= $_SESSION["first_name"] ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4" style="border:0;">
                <div class="card-body">

                    <!-- CRUD Customer Data -->
                    <form action="index.php?do=account" method="post">
                        <div class="container">
                            <div class="row <?= !isset($this->status) ? "d-none" : ""; ?>">
                                <div class="col-md-5 mx-auto rounded-pill mb-3"
                                     style="border: 3px solid green; background-color: lightgreen;">
                                    <h5 class="my-4 text-center"><?= isset($this->status) ? $this->status : ""; ?></h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <h3 class="my-4 text-center">Mijn account gegevens:</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <div class="form-label-group">
                                        <input type="email" id="email" class="form-control mb-2" name="email"
                                               value="<?= $_SESSION["email"]; ?>"
                                               placeholder="Emailadres" value="<?= $_SESSION["email"] ?>"
                                               required autofocus readonly>
                                        <label for="email">Emailadres</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input class="form-control mb-2" type="text" id="first_name" name="first_name"
                                               value="<?= $_SESSION["first_name"]; ?>"
                                               placeholder="Voornaam" required autofocus>
                                        <label for="first_name">Voornaam</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input class="form-control mb-2" type="text" id="last_name" name="last_name"
                                               value="<?= $_SESSION["last_name"]; ?>"
                                               placeholder="Achternaam" required autofocus>
                                        <label for="last_name">Achternaam</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="city" class="form-control mb-2" name="city"
                                               value="<?= $_SESSION["city"]; ?>"
                                               placeholder="Woonplaats"
                                               required autofocus>
                                        <label for="city">Woonplaats</label>
                                    </div>
                                </div>
                                <div class="col-md-5 mx-auto">
                                    <div class="form-label-group">
                                        <input type="text" id="street" class="form-control mb-2" name="street"
                                               value="<?= $_SESSION["street"]; ?>"
                                               placeholder="Straat"
                                               required autofocus>
                                        <label for="street">Straat</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="number" id="house_number" class="form-control mb-2"
                                               name="house_number" value="<?= $_SESSION["house_number"]; ?>"
                                               placeholder="Huisnummer"
                                               required autofocus>
                                        <label for="house_number">Huisnummer</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="text" id="zip_code" class="form-control mb-2" name="zip_code"
                                               value="<?= $_SESSION["zip_code"]; ?>"
                                               placeholder="Postcode"
                                               required autofocus>
                                        <label for="zip_code">Postcode</label>
                                    </div>
                                    <div class="form-label-group">
                                        <input type="password" id="password" class="form-control" name="password"
                                               placeholder="Wachtwoord">
                                        <label for="password">Wachtwoord Wijzigen</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 mx-auto">
                                    <button class="btn btn-lg btn-secondary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                            type="submit">Wijzigingen opslaan
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
