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

    <!-- Insert script -->
    <?php include 'scripts/insert.php'; ?>

    <!-- Header -->
    <?php include 'templates/header.php'; ?>

    <!-- Main -->
    <br>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-center align-items-center" style="font-family: 'Volkhov', serif;">
                    <h1 class="">Create New File</h1>
                </div>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="card-header bg-dark conatainer-fluid"></div>
                    <div class="">
                        <br>
                        <label for="_type" class="form-group">
                            <h5>Item #: </h5>
                        </label>
                        <input maxlength="8" data-toggle='tooltip' title='Enter item # eg. SCP-000'
                            data-placement='left' type="text" class="form-control " name="_itemNumber" value="SCP-">
                        </input>
                        <br>
                        <label for="_type" class="form-group">
                            <h5>Class: </h5>
                        </label>
                        <div class="input-group">
                            <select class="custom-select" id="inputGroupSelect04" name="_type">
                                <option value="<?php echo htmlspecialchars($_type, ENT_QUOTES); ?>" selected>Choose...
                                </option>
                                <option value="Safe">Safe</option>
                                <option value="Euclid">Euclid</option>
                                <option value="Keter">Keter</option>
                                <option value="Thaumiel">Thaumiel</option>
                                <option value="Apollyon">Apollyon</option>
                            </select>
                        </div>
                        <br>
                    </div>
                    <div class="card-header bg-dark conatainer-fluid"></div>
                    <div class="">
                        <!-- TinyMCE Form text area 1-->
                        <script>
                        tinymce.init({
                            selector: "#mytextarea1",
                            content_css: "//www.tiny.cloud/css/codepen.min.css",
                            height: 500,
                            menubar: false,
                            resize: false,
                            branding: false,
                            statusbar: false,
                            block_formats: "Paragraph=p; Header 4=h4; Header 5=h5",
                            plugins: ["paste wordcount lists"],
                            toolbar: "undo redo | formatselect |" + " bold italic underline bullist numlist",
                            max_chars: 5000,
                            setup: function(ed) {
                                var allowedKeys = [8, 37, 38, 39, 40,
                                    46
                                ]; // backspace, delete and cursor keys
                                ed.on('keydown', function(e) {
                                    if (allowedKeys.indexOf(e.keyCode) != -1) return true;
                                    if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        return false;
                                    }
                                    return true;
                                });
                                ed.on('keyup', function(e) {
                                    tinymce_updateCharCounter(this, tinymce_getContentLength());
                                });
                            },
                            init_instance_callback: function() { // initialize counter div
                                $('#' + this.id).prev().append(
                                    '<h6>Max Characters</h6><div class="char_count font-weight-bold"></div>'
                                );
                                tinymce_updateCharCounter(this, tinymce_getContentLength());
                            },
                            paste_preprocess: function(plugin, args) {
                                var editor = tinymce.get(tinymce.activeEditor.id);
                                var len = editor.contentDocument.body.innerText.length;
                                var text = $(args.content).text();
                                if (len + text.length > editor.settings.max_chars) {
                                    alert('Pasting this exceeds the maximum allowed number of ' + editor
                                        .settings.max_chars + ' characters.');
                                    args.content = '';
                                } else {
                                    tinymce_updateCharCounter(editor, len + text.length);
                                }
                            }
                        });

                        function tinymce_updateCharCounter(el, len) {
                            $('#' + el.id).prev().find('.char_count').text(len + '/' + el.settings.max_chars);
                        }

                        function tinymce_getContentLength() {
                            return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
                        }
                        </script>
                        <br>
                        <label data-toggle='tooltip' title='Enter item Special Containment Procedures'
                            data-placement='left' for="_scp">
                            <h4>Special Containment Procedures: </h4>
                        </label>
                        <!-- TinyMCE Form text area 2-->
                        <textarea id="mytextarea1" class="" name="_scp"></textarea>
                    </div>
                    <br>
                    <div class="card-header bg-dark conatainer-fluid"></div>
                    <div>
                        <br>
                        <script>
                        tinymce.init({
                            selector: "#mytextarea2",
                            content_css: "//www.tiny.cloud/css/codepen.min.css",
                            height: 500,
                            menubar: false,
                            resize: false,
                            branding: false,
                            statusbar: false,
                            block_formats: "Paragraph=p; Header 4=h4; Header 5=h5",
                            plugins: ["paste wordcount lists"],
                            toolbar: "undo redo | formatselect |" + " bold italic underline bullist numlist",
                            max_chars: 15000,
                            setup: function(ed) {
                                var allowedKeys = [8, 37, 38, 39, 40,
                                    46
                                ]; // backspace, delete and cursor keys
                                ed.on('keydown', function(e) {
                                    if (allowedKeys.indexOf(e.keyCode) != -1) return true;
                                    if (tinymce_getContentLength() + 1 > this.settings.max_chars) {
                                        e.preventDefault();
                                        e.stopPropagation();
                                        return false;
                                    }
                                    return true;
                                });
                                ed.on('keyup', function(e) {
                                    tinymce_updateCharCounter(this, tinymce_getContentLength());
                                });
                            },
                            init_instance_callback: function() { // initialize counter div
                                $('#' + this.id).prev().append(
                                    '<h6>Max Characters</h6><div class="char_count font-weight-bold"></div>'
                                );
                                tinymce_updateCharCounter(this, tinymce_getContentLength());
                            },
                            paste_preprocess: function(plugin, args) {
                                var editor = tinymce.get(tinymce.activeEditor.id);
                                var len = editor.contentDocument.body.innerText.length;
                                var text = $(args.content).text();
                                if (len + text.length > editor.settings.max_chars) {
                                    alert('Pasting this exceeds the maximum allowed number of ' + editor
                                        .settings.max_chars + ' characters.');
                                    args.content = '';
                                } else {
                                    tinymce_updateCharCounter(editor, len + text.length);
                                }
                            }
                        });

                        function tinymce_updateCharCounter(el, len) {
                            $('#' + el.id).prev().find('.char_count').text(len + '/' + el.settings.max_chars);
                        }

                        function tinymce_getContentLength() {
                            return tinymce.get(tinymce.activeEditor.id).contentDocument.body.innerText.length;
                        }
                        </script>
                        <label data-toggle='tooltip' title='Enter item description' data-placement='left'
                            for="_description">
                            <h4>Description: </h4>
                        </label>
                        <!-- TinyMCE Form text area -->
                        <textarea id="mytextarea2" name="_description"></textarea>
                    </div>
                    <br>
                    <div class="">
                        <label for=" file">
                            <h5>Image upload: </h5>
                        </label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input"
                                    accept="image/jpg, image/jpeg, image/png" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" value="Create File" name="submit" class="btn btn-dark float-right">
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>

    <?php     
    if(isset($_POST['submit']))
    {
    ?>
    <script type="text/javascript">
    window.location = "index.php?action=created";
    </script>
    <?php
    };
    ?>

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
    <!-- Tooltip pop up function -->
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>

</html>