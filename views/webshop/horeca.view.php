<!-- Horeca page (user interface) -->

<div class="container mt-5 pt-4 mb-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="carousel-inner" role="listbox" id="carouselExampleIndicators">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="src/img/rest-1.jpg" alt="First slide">
                </div>
            </div>

            <!-- Horeca Items -->
            <div class="row">
                <?php
                // Start foreach loop for horeca items
                foreach ($data['horeca'] as $row):
                    ?>
                    <div class='col-lg-4 col-md-4 my-4'>
                        <div class='card h-100'>
                            <a href='#'><img class='card-img-top'
                                             src='src/img/juices/<?= $row->getProductImage(); ?>'
                                             alt=''></a>
                            <div class='card-body'>
                                <h4 class='card-title'>
                                    <a href='#'><?= $row->getProductName(); ?></a>
                                </h4>

                                <p class='card-text'><?= $row->getProductDescription(); ?></p>
                            </div>
                            <div class='card-footer'>
                                <h5 class='text-center m-2'>€<?= $row->getProductPrice(); ?></h5>
                                <form method="post" action="index.php?do=insertcart" class="text-center">
                                    <input type="hidden" name="product_id" value="<?= $row->getId(); ?>">
                                    <label class="align-content-center" for='number'>
                                        <input class='btn btn-primary' type='number' id='quantity' name="quantity"
                                               value='1' min='1'>
                                    </label>
                                    <div class='m-2'>
                                        <input type="submit"
                                               class='font-weight-bold text-decoration-none btn btn-secondary'
                                               value="In winkelwagen">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
