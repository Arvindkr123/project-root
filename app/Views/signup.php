<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 mx-auto">
            <h1>Sign Up</h1>
            <?php if (isset($validation)) : ?>
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <?= $validation->listErrors() ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($flash_message)) : ?>
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        Congratulations! Registered successfully!
                    </div>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group mb-3">
                    <label for="name">First Name:</label>
                    <input type="text" name="name" id="name" value="<?= set_value("name") ?>" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="lname">Last Name:</label>
                    <input type="text" name="lname" id="lname" class="form-control" value="<?= set_value("lname") ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value("email") ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= set_value("password") ?>">
                </div>
                <div class="form-group mb-3">
                    <label for="confirm-pwd">Confirm Password:</label>
                    <input type="password" name="confirm-pwd" id="confirm-pwd" class="form-control" value="<?= set_value("confirm-pwd") ?>">
                </div>
                <div class="mb-3">
                    <label>Already have an account? <a href="<?php echo base_url() ?>">Login</a></label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>