<!-- User see added products in cart and can delete them (user interface) -->

<div class="container mt-5 pt-4 mb-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light">
                    <h4 class="pull-left text-black-50 mt-1 font-weight-bold">Winkelwagen</h4>
                    <a href="index.php?do=default" class="btn btn-secondary btn-sm pull-right mt-1">Terug naar
                        winkel</a>
                    <div class="clearfix"></div>
                </div>
                <div class="card-body">
                    <?php
                    /*
                     * Show products in cart if not empty
                     */
                    if (isset($data['cart']) && !empty($data['cart'])):
                        foreach ($data['cart'] as $row): ?>
                            <div class="row m-0 p-0">
                                <div class="col-6 col-sm-12 col-md-2 text-center">
                                    <img class="img-responsive" src="src/img/juices/<?= $row->getProductImage(); ?>"
                                         alt="prewiew" width="80" height="80" style="object-fit: contain">
                                </div>
                                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-5">
                                    <h4 class="product-name font-weight-bold"><?= $row->getProductName(); ?></h4>
                                    <h6 class="font-weight-lighter">
                                        €<?= number_format($row->getProductPrice(), 2); ?></h6>
                                </div>
                                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                                    <div class="col-3 col-sm-3 col-md-6 text-md-right pt-2">
                                        <h6 class="font-weight-bold"><?= $_SESSION['products'][$row->getId()] ?><span
                                                    class="text-muted"><span
                                                        class="text-muted">x</span></h6>
                                    </div>
                                    <div class="col-4 col-sm-4 col-md-6">
                                        <div class="mt-2">
                                            <h6 class="font-weight-bold">
                                                €<?= number_format($_SESSION['total'][$row->getId()], 2); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <div style="height: 50vh">
                            <h4 class="font-italic">Winkelwagen leeg</h4>
                        </div>
                    <?php endif; ?>

                </div>
                <?php if (empty($data['cart'])): ?>
                    <div class="pull-right m-2" style="display: none">
                        <form action="index.php?do=deleteall" method="post">
                            <input type="submit" value="Winkelwagen leegmaken"
                                   class="btn btn-outline-secondary pull-right">
                        </form>
                    </div>
                <?php else: ?>
                <div class="pull-right m-2">
                    <form action="index.php?do=deleteall" method="post">
                        <input type="submit" value="Winkelwagen leegmaken"
                               class="btn btn-outline-secondary pull-right">
                    </form>
                </div>
            </div>

            <!-- Calculate prices and taxes -->
            <div class="card-body">
                <div class="row m-0 p-0" style="border-bottom: solid 1px #ccc">
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold">Subtotaal</h6>
                    </div>
                    <div class="col-12 col-sm-12 text-right col-md-6">
                        <h6 class="font-weight-lighter text-right">€<?=
                            number_format($subtotal = array_sum($_SESSION['total']), 2); ?></h6>
                    </div>
                </div>

                <div class="row m-0 p-0 mt-2" style="border-bottom: solid 1px #ccc">
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold">BTW</h6>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <h6 class="font-weight-lighter text-right">
                            €<?= number_format(($btw = $subtotal * 0.09), 2) ?></h6>
                    </div>
                </div>

                <div class="row m-0 p-0 mt-2" style="border-bottom: solid 1px #ccc">
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold">Verzendkosten</h6>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <h6 class="font-weight-lighter text-right">€<?= $shipping_cost = 4.95 ?></h6>
                    </div>
                </div>

                <div class="row m-0 p-0 mt-2">
                    <div class="col-lg-6">
                        <h4 class="font-weight-bold">Totaal</h4>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <h4 class="font-weight-lighter text-right">
                            €<?= number_format(($total = $subtotal + $shipping_cost + $btw), 2) ?></h4>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (empty($_SESSION['email'])):
                    Session::flash('alert', 'Log eerst in om te bestellen'); ?>
                    <a href="index.php?do=login" class="btn float-right btn-outline-secondary">Inloggen om verder te
                        gaan</a>
                <?php else: ?>
                    <form method="post" action="index.php?do=order">
                        <div class="row m-0 p-0 mt-4">
                            <div class="col-lg-6 mt-2">
                                <label>
                                    <input type="checkbox" required autofocus>
                                </label>
                                <label for="checkbox">Ik ga akkoord met de <a href="#">Algemene Voorwaarden</a></label>
                            </div>
                            <div class="col-12 cl-sm-12 col-md-6">
                                <input class="btn btn-outline-secondary float-right" value="Controleer gegevens"
                                       type="submit">
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
