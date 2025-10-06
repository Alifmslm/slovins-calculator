<!-- This is Entry Point -->
<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Slovins Calculator</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 d-flex flex-column gap-5 p-3">
                <?php
                include_once("view/header.php");
                include_once("view/form_ui.php");
                require_once("./controller/input-controller.php");
                if ($show_result) {
                    # code...
                    include_once("./view/result.php");
                }
                include_once("view/history.php");
                ?>
            </div>
        </div>
    </div>
    <script src="view/animation/input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>