<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
</head>

<body>
    <div class="container martop">
        <div class="col-md-6 center_div">
            <h1>Login</h1>
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
                        Login User SuccessFully!!
                    </div>
                </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= set_value("email") ?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Password :</label>
                    <input type="password" name="password" id="password" class="form-control" value="<?= set_value("password") ?>">
                </div>
                <div class="checkbox">
                    <label>don't have an account ? <a href="<?php echo base_url() ?>signup">signup</a></label>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>