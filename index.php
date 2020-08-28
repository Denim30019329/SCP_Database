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
    <!-- Header -->
    <?php include 'templates/header.php'; ?>

    <?php $action = isset($_GET['action']) ? $_GET['action'] : ""; ?>

    <!-- Main -->
    <div class='container'>
        <br>
        <div class='card'>
            <div class='card-header' style="font-family: 'Volkhov', serif;">
                <h3 class="pt-1">SCP Foundation Database</h3>
            </div>
            <div class='card-body'>

                <?php
                if($action == 'deleted')
                {
                echo "<div class='alert alert-danger'>Record was deleted</div>";
                }

                if($action == 'created')
                {
                echo "<div class='alert alert-success'>Record was created.</div>";
                }

                if($action == 'updated')
                {
                echo "<div class='alert alert-success'>Record was updated.</div>";
                }
                ?>

                <div class="bg-dark text-light row border rounded flex-nowrap">
                    <div class="col-lg-4 col-md-9 border">Item</div>
                    <div class="col-lg-3 d-none d-lg-block border">Class</div>
                    <div class="col-lg-3 d-none d-lg-block border">Last Updated</div>
                    <div class="col-lg-2 col-md-3 border d-flex justify-content-between">
                        <a class='invisible font-weight-bold bg-dark text-dark '>&#128270;</a>
                        <a class='invisible font-weight-bold bg-dark text-dark '>&#128221;</a>
                        <a class='invisible font-weight-bold bg-dark text-dark '>&#128465;</a>
                    </div>
                </div>


                <?php 
            
                $sql = "SELECT _itemID, _itemNumber, _type, _created, _modified FROM item ORDER BY _itemNumber";        
                $statement = $conn->query($sql);
                $statement->execute();
                               
                $rows = $statement->rowCount();

            
                if($rows > 0)
                {    
                    while($record = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        extract($record);
                        echo 
                        "                    
                   
                            <div class='row border rounded myRow flex-nowrap'>
                                <div class='col-lg-4 col-md-9 border'>{$_itemNumber}</div>
                                <div class='col-lg-3 d-none d-lg-block border'>{$_type}</div>
                                <div class='col-lg-3 d-none d-lg-block border'>{$_modified}</div>
                                <div class='col-lg-2 col-md-3 border d-flex justify-content-between'>
                                    <a data-toggle='tooltip' title='Read' data-placement='left' class='font-weight-bold px-1'
                                        href='read.php?id={$_itemID}'>&#128270;</a>
                                    <a data-toggle='tooltip' title='Edit' data-placement='left' class='font-weight-bold px-1'
                                        href='update.php?id={$_itemID}'>&#128221;</a>
                                    <a data-toggle='tooltip' title='Delete' data-placement='left' class='font-weight-bold px-1'
                                        href='#' onclick='delete_record({$_itemID});'>&#128465;</a>
                                </div>
                            </div>                 
                    
                        ";
                    }
                }
                else
                {
                echo "<div class='alert alert-danger p-2'>No records found</div>";
                }
                ?>

            </div>
        </div>
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
        var answer = confirm('Do you really want to delete record ( ' + id +
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