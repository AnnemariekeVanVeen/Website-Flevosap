<!-- Order overview (user interface) -->

<div class="container mt-3">
    <div class="row">

        <!-- Show customer data -->
        <div class="col-lg-6 mt-5">
            <h4 class="ml-3 mb-3 font-weight-bold">Gegevens en Bezorgadres</h4>
            <div class="ml-3 mb-2">
                <h6>Voornaam: <?= $data['user']->getFirstName(); ?></h6>
            </div>
            <div class="ml-3 mb-2">
                <h6>Achternaam: <?= $data['user']->getLastName(); ?></h6>
            </div>
            <div class="ml-3 mb-2">
                <h6>E-mailadres: <?= $data['user']->getEmail(); ?> </h6>
            </div>
            <div class="ml-3 mb-2">
                <h6>Straat: <?= $data['user']->getStreet(); ?></h6>
            </div>
            <div class="ml-3 mb-2">
                <h6>Huisnummer: <?= $data['user']->getHousenumber(); ?></h6>
            </div>

            <div class="ml-3 mb-2">
                <h6>Plaatsnaam: <?= $data['user']->getCity(); ?></h6>
            </div>
            <div class="ml-3 mb-2">
                <h6>Postcode: <?= $data['user']->getZipcode(); ?></h6>
            </div>
        </div>

        <!-- Show order data -->
        <div class="col-lg-6 mt-5">
            <h4 class="ml-3 mb-3 font-weight-bold">Orderoverzicht</h4>
            <div class="row">
                <div class="col-sm-3 ml-3 mb-2">
                    <h5>Product</h5>
                </div>
                <div class="col-sm-3 ml-3 mb-2">
                    <h5>Aantal</h5>
                </div>
                <div class="col-sm-3 ml-3 mb-2">
                    <h5>Prijs</h5>
                </div>
            </div>
            <?php if (isset($data['cart']) && !empty($data['cart'])):
                foreach ($data['cart'] as $row): ?>
                    <div class="row" style="border-bottom: solid 1px #ccc">
                        <div class="col-sm-3 ml-3 mt-2">
                            <h6><?= $row->getProductName(); ?></h6>
                        </div>
                        <div class="col-sm-3 ml-3 mt-2">
                            <h6><?= $_SESSION['products'][$row->getId()] ?><span
                                        class="text-muted"><span
                                            class="text-muted">x</span></h6>
                        </div>

                        <div class="col-sm-3 ml-3 mt-2">
                            <h6 class="font-weight-bold">
                                €<?= number_format($_SESSION['total'][$row->getId()], 2); ?></h6>
                        </div>
                    </div>
                <?php
                endforeach;
            else:
                ?>
                <h4 class="font-italic ml-3">Winkelwagen leeg</h4>
            <?php endif; ?>


            <?php
            // Calculate prices
            $subtotal = array_sum($_SESSION['total']);
            round(($btw = $subtotal * 0.09), 2);
            $shipping_cost = 4.95;
            ?>
            <div class="row m-0 p-0 mt-2">
                <div class="col-sm-3">
                    <h4 class="font-weight-bold">Totaal</h4>
                </div>
                <div class="col-12 col-sm-12 col-md-6 ml-3">
                    <h4 class="font-weight-lighter text-right">
                        €<?= number_format(($total = $subtotal + $shipping_cost + $btw), 2) ?></h4>
                </div>
            </div>
        </div>

        <!-- Payment Options -->
        <div class="col-lg-12 mt-3 ml-3">
            <h4 class="mb-3 font-weight-bold">Betaalmethode</h4>
            <form action="index.php?do=finish" method="post">
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="bank" name="paymentMethod" type="radio" class="custom-control-input" checked
                               required>
                        <label class="custom-control-label" for="bank">Bankoverschrijving</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="ideal" name="paymentMethod" type="radio" class="custom-control-input" required
                               autofocus disabled>
                        <label class="custom-control-label" for="ideal">IDeal</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required
                               autofocus disabled>
                        <label class="custom-control-label" for="paypal">Paypal</label>
                    </div>
                </div>
                <hr class="mb-4">
                <input type="submit" class="btn btn-secondary btn-lg btn-block mb-4 rounded-pill" value="Bevestigen">
            </form>
        </div>
    </div>
</div>
