<!-- Webshop page (user interface) -->

<div class="container mt-5 pt-4 mb-3">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-group-item">
                    <header class="card-header">
                        <h6 class="title text-white pt-2">Soort</h6>
                    </header>
                    <div class="filter-content">
                        <div class="card-body">

                            <!-- Filter -->
                            <form method="get" action="">
                                <input type="hidden" name="do" value="default">
                                <label class="form-check">
                                    <input class="form-check-input" <?= isset($_GET['fruit_juice']) ? 'checked' : '' ?>
                                           type="checkbox" value="y" id="fruit_juice"
                                           name="fruit_juice">
                                    <span class="form-check-label">Vruchtensap</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" <?= isset($_GET['veggie_juice']) ? 'checked' : '' ?>
                                           type="checkbox" value="y" id="veggie_juice"
                                           name="veggie_juice">
                                    <span class="form-check-label">Groentesap</span>
                                </label>
                                <input type="submit" value="Filter" class="btn btn-secondary btn-block btn-login mt-3">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel -->
        <div class="col-lg-9">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img" src="src/img/peer4.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img" src="src/img/peer2.png" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img" src="src/img/peer3.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Webshop Items -->
            <div class="row">
                <?php
                /*
                 * Start foreach loop for webshop items
                 */
                foreach ($data['juices'] as $row):
                    ?>
                    <div class='col-lg-6 col-md-6 my-4'>
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
                                <h5 class='text-center m-2'>€<?= number_format($row->getProductPrice(), 2); ?></h5>
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
                                <div class="m-2">
                                    <?php if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) { ?>
                                        <form method="post" class="text-center"><input type="hidden" name="id"
                                                                                       value="<?= $row->getId(); ?>"><input
                                                    type="submit" name="delete"
                                                    class='font-weight-bold text-decoration-none btn btn-secondary'
                                                    value="Verwijder product"></form>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

               <!-- SHow CRUD Admin -->
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) : ?>
                    <form method="post" class="text-center" enctype="multipart/form-data">

                        <div class='col-lg-6 col-md-6 my-4'>
                            <div class='card h-100'>
                                <h3>Product toevoegen</h3>
                                <h4>Product image:</h4>
                                <input type="file" name="image_upload" accept="image/jpeg"/>
                                <div class='card-body'>
                                    <h4 class='card-title'>
                                        <input class="form-control mb-2" type="text" id="name" name="name"
                                               placeholder="Product naam" required autofocus/>
                                    </h4>

                                    <p class='card-text'><input class="form-control mb-2" type="text" id="description"
                                                                name="description" placeholder="Product description"
                                                                required autofocus/></p>
                                </div>
                                <div class='card-footer'>
                                    <h5 class='text-center m-2'><input type="text" id="price" name="price"
                                                                       placeholder="Product prijs" required autofocus/>
                                    </h5>
                                    <label class="align-content-center" for='number'>
                                        <input class='btn btn-primary' type='number' id='quantity' name="quantity"
                                               value='1' min='1' placeholder="Product quantity"/>
                                    </label>
                                    <input type="text" id="nutrition_header" name="nutrition_header"
                                           placeholder="Nutrition Titel" required autofocus/>
                                    <input type="text" id="nutrition_body" name="nutrition_body"
                                           placeholder="Nutrition Body" required autofocus/> <br/>
                                    <input type="radio" name="category" value="horeca" checked="checked"> Horeca<br>
                                    <input type="radio" name="category" value="groentesappen"> Groentesappen<br>
                                    <input type="radio" name="category" value="fruitsappen"> Fruitsappen
                                    <div class='m-2'>
                                        <input type="submit" name="create"
                                               class='font-weight-bold text-decoration-none btn btn-secondary'
                                               value="Product toevoegen">
                                    </div>
                                    <div class="text-center pb-3" style="text-decoration-line:underline "><?php
                                        echo Session::getFlash('alert');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
