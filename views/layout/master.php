<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Flevosap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Custom Stylesheets -->
    <link href="src/css/font.css" rel="stylesheet"/>
    <link href="src/css/style.css" rel="stylesheet"/>

    <!-- Custom Stylesheet defined in Controllers -->
    <link href="<?php echo $this->style;?>" rel="stylesheet" />

    <!-- MediaQuery for Carousel -->
    <link href="src/css/mediaQuerry.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php if (Session::has('alert')): ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <p class="notice">
            <?= Session::get('alert'); ?>
        </p>
    </div>
<?php endif; ?>
<?php require './views/shared/nav.php'; ?>
<br><br>

<!-- Body defined in Controllers -->
<?php require $this->file; ?>

<!-- Footer -->
<?php require './views/shared/footer.php'?>

<!-- JavaScript files -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://use.fontawesome.com/c560c025cf.js"></script>
<script src="src/js/print.js"></script>
</body>
</html>
