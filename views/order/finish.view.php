<!-- Order overview, can also print the order (user interface) -->

<div class="container mt-3">
    <div class="row">
        <div class="col-lg-12 rounded-pill mt-5 d-print-none"
             style="border: 3px solid green; background-color: lightgreen;">
            <h5 class="my-4 text-center">Bestelling succesvol</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 d-none d-print-flex justify-content-between">
            <div class="pt-4 d-none d-print-flex">
                Flevosap bv<br>
                Prof. Zuurlaan 22<br>
                8256 PE Biddinghuizen, Nederland<br>
                Tel: +31 (0)321 – 33 25 25<br>
                info@flevosap.nl
            </div>
            <img src="src/img/logo-flevosap.png" alt="logo flevosap">
        </div>

        <!-- Show customer data -->
        <div class="col-lg-4 mt-5">
            <h4 class="mb-3 font-weight-bold">Gegevens en Bezorgadres</h4>
            <div class="mb-2">
                <h6>Voornaam: <?= $data['user']->getFirstName(); ?></h6>
            </div>
            <div class="mb-2">
                <h6>Achternaam: <?= $data['user']->getLastName(); ?></h6>
            </div>
            <div class="mb-2">
                <h6>E-mailadres: <?= $data['user']->getEmail(); ?> </h6>
            </div>
            <div class="mb-2">
                <h6>Straat: <?= $data['user']->getStreet(); ?></h6>
            </div>
            <div class="mb-2">
                <h6>Huisnummer: <?= $data['user']->getHousenumber(); ?></h6>
            </div>
            <div class="mb-2">
                <h6>Plaatsnaam: <?= $data['user']->getCity(); ?></h6>
            </div>
            <div class="mb-2">
                <h6>Postcode: <?= $data['user']->getZipcode(); ?></h6>
            </div>
        </div>

        <!-- Show order data -->
        <div class="col-lg-12 mt-5 card p-2">
            <h4 class="mb-3 font-weight-bold">Orderoverzicht</h4>
            <div class="row">
                <div class="col-sm-4 mb-2">
                    <h5>Product</h5>
                </div>
                <div class="col-sm-4 mb-2">
                    <h5>Aantal</h5>
                </div>
                <div class="col-sm-4 mb-2">
                    <h5>Prijs</h5>
                </div>
            </div>
            <?php
            foreach ($data['cart'] as $row): ?>
                <div class="row">
                    <div class="col-sm-4 mt-2">
                        <h6><?= $row->getProductName(); ?></h6>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <h6><?= $_SESSION['products'][$row->getId()] ?><span
                                    class="text-muted"><span
                                        class="text-muted">x</span></h6>
                    </div>
                    <div class="col-sm-4 mt-2">
                        <h6 class="font-weight-bold">
                            €<?= number_format($_SESSION['total'][$row->getId()], 2); ?></h6>
                    </div>
                </div>
            <?php
            endforeach; ?>
        </div>
        <div class="col-lg-12 mt-5 card p-2">
            <div class="row m-0 p-0 mt-2">
                <div class="col-sm-4">
                    <h4 class="font-weight-bold">Subtotaal</h4>
                </div>
                <div class="col-sm-2">
                    <h4 class="font-weight-lighter">
                        €<?= number_format($subtotal = array_sum($_SESSION['total']), 2); ?></h4>
                </div>
            </div>
            <div class="row m-0 p-0 mt-2">
                <div class="col-sm-4">
                    <h4 class="font-weight-bold">BTW</h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="font-weight-lighter">
                        €<?= number_format(($btw = $subtotal * 0.09), 2) ?></h4>
                </div>
            </div>
            <div class="row m-0 p-0 mt-2">
                <div class="col-sm-4">
                    <h4 class="font-weight-bold">Verzendkosten</h4>
                </div>
                <div class="col-sm-5">
                    <h4 class="font-weight-lighter">
                        €<?= $shipping_cost = 4.95 ?></h4>
                </div>
            </div>
            <div class="row m-0 p-0 mt-2">
                <div class="col-sm-4">
                    <h4 class="font-weight-bold">Totaal</h4>
                </div>
                <div class="col-sm-4">
                    <h4 class="font-weight-lighter">
                        €<?= number_format(($total = $subtotal + $shipping_cost + $btw), 2) ?></h4>
                </div>
            </div>
        </div>

        <!-- JavaScript print function -->
        <button class="btn btn-outline-secondary btn-lg btn-block text-uppercase d-print-none my-5"
                onclick="printPage()">Print deze pagina
        </button>
    </div>
</div>
