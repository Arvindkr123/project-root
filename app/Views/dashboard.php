<?php
$data = session()->get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
</head>

<body>
    <div class="container martop">
        <div class="col-md-6 center_div">
            <?php if (!empty($data)): ?>
                <p>Welcome <?= $data['name'] . " (" . $data['email'] . ")" ?> |
                    <a href="<?= base_url() ?>/logout">Logout</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
    <div class="container mt-5">
        <h4 class="text-center">User Data</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usersdata as $user): ?>
                    <tr>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['user_type'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>editUser/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                            <a onclick="return confirm('are you sure want to delete this user ? ')" href="<?= base_url() ?>deleteUser/<?= $user['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>