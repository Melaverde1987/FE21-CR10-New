<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once 'components/boot.php'?>
        <link rel="stylesheet" href="css/style.css" />
        <title>Add media</title>
    </head>
    <body>
        <?php require_once 'components/header.php'?>
        <div class="container">  
            <div class="row my-3">
                <div class="col-12 h2">Add media</div>
            </div>
            <form action="actions/a_create.php" method="post" enctype="multipart/form-data" class="my-4">
                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Title</span>
                    <input class='form-control col-12 col-md-9' type="text" name="title"  placeholder="Insert title" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Author name</span>
                    <input class='form-control col-12 col-md-9' type="text" name="author_name"  placeholder="Insert author name" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Author lastname</span>
                    <input class='form-control col-12 col-md-9' type="text" name="author_lastname"  placeholder="Insert author lastname" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">ISBN code</span>
                    <input class='form-control col-12 col-md-9' type="number" name="code"  placeholder="Insert ISBN code" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Description</span>
                    <input class='form-control col-12 col-md-9' type="text" name="description"  placeholder="Max 50 symbols" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publish date</span>
                    <input class='form-control col-12 col-md-9' type="date" name="publish_date"  placeholder="Insert publish date" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publisher name</span>
                    <input class='form-control col-12 col-md-9' type="text" name="publisher_name"  placeholder="Insert publisher name" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Publisher address</span>
                    <input class='form-control col-12 col-md-9' type="text" name="publisher_address"  placeholder="Insert publisher address" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Size</span>
                    <input class='form-control col-12 col-md-9' type="text" name="size"  placeholder="Big,medium or small" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Type</span>
                    <input class='form-control col-12 col-md-9' type="text" name="type"  placeholder="Book, CD or DVD" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Status</span>
                    <input class='form-control col-12 col-md-9' type="text" name="status"  placeholder="available or reserved" />
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text bg-light fw-bold col-12 col-md-3">Picture</span>
                    <input class='form-control col-12 col-md-9' type="file" name="picture"/>
                </div>

                <button class='btn my_bg border-secondary' type="submit">Insert Product</button>
            </form>
        </div>
    </body>
</html>