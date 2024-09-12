<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>
    <div class="container martop">
        <div class="col-md-6 mx-auto">
            <h4>Upload Image</h4>
        </div>

        <!-- Display Validation Errors -->
        <?php if (isset($validation)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= implode('<br>', $validation); ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Display Success Message -->
        <?php if (isset($success)) : ?>
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    <?= $success; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Display General Error -->
        <?php if (isset($error)) : ?>
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <?= $error; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Form to Upload Image -->
        <form method="post" enctype="multipart/form-data" class="mt-5">
            <input class="form-control" type="file" name="userfile" size="20" value="<?= set_value('userfile') ?>">
            <br>
            <button type="submit" class="btn btn-light">Update</button>
        </form>
    </div>
</body>

</html>