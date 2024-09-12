<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="name">First Name:</label>
                    <input type="text" name="name" id="name" value="<?= $userdata["name"] ?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= $userdata["email"] ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= $userdata["password"] ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>