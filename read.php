<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- CSS link -->
    <link rel="stylesheet" href="styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Volkhov&display=swap" rel="stylesheet">
    <!-- TinyMCE JavaScript -->
    <script src="https://cdn.tiny.cloud/1/j18tfsausn3piogk5m17wtr8x3e09gy28wt42qxrlvhaz2lo/tinymce/5/tinymce.min.js"
        referrerpolicy="origin" />
    </script>
    <!-- Awesome font links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS links -->
    <script src="scripts/functions.js"></script>
    <title>SCP DATABASE</title>
</head>

<body class="bg-secondary h-100">

    <!-- Database config -->
    <?php include 'config/database.php'; ?>

    <!-- PHP - Get all items from database with id = ?, then assign values. -->
    <?php include 'scripts/read_Single.php'; ?>

    <!-- Header -->
    <?php include 'templates/header.php'; ?>

    <!-- Main -->
    <br>
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-light" style="font-family: 'Volkhov', serif;">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="float-left">| <?php echo "{$_itemNumber}"; ?> |</h1>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="card-header bg-dark conatainer-fluid"></div>
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="img-thumbnail shadow image-fluid" src="<?php echo "{$_imagePathName}"; ?>">
                    </div>
                    <br>
                    <div class="card-header bg-dark conatainer-fluid"></div>
                    <br>
                    <div class="d-flex justify-content-center align-items-center">
                        <a data-toggle='tooltip' title='Edit File' data-placement='top'
                            class='font-weight-bold pr-1 pl-1' href='<?php echo "update.php?id={$id}"; ?>'>&#128221;</a>
                        <a data-toggle='tooltip' title='Delete File' data-placement='top'
                            class='font-weight-bold pr-1 pl-1' href='#'
                            onclick='<?php echo "delete_record({$id});" ?>'>&#128465;</a>
                    </div>
                    <br>
                    <h3 class="">Object Class: <?php echo "{$_type}"; ?></h3>
                    <br>
                    <div>
                        <h4>Special Containment Procedures:</h4><?php echo "{$_scp}"; ?>
                    </div>
                    <div>
                        <h4>Description:</h4><?php echo "{$_description}"; ?>
                    </div>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Date created:</h6><?php echo "{$_created}"; ?>
                        </div>
                        <div>
                            <h6>Date last modified:</h6><?php echo "{$_modified}"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>

    <!-- Footer -->
    <?php include 'templates/footer.php'; ?>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <!-- Optional JavaScript -->
    <!-- Delete prompt / redirect Function -->
    <script type="text/javascript">
    function delete_record(id) {
        var answer = confirm(' Do you really want to delete record ( ' + id +
            ' )?');
        if (answer) {
            window.location = 'delete.php?id=' + id;
        }
    };
    </script>
    <!-- Tooltip pop up function -->
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>

</body>

</html>