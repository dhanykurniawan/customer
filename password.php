<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Customer | Change Password</title>

    <!-- Pasoka icon -->
    <link rel="icon" href="assets/pasoka.ico" type="image/x-icon" />

    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body style="background-color: #ececf2;">

    <div class="container col-6 mt-4">
        <h1 class="mb-4 text-center">Change Password</h1>
        <a href="home.php" class="btn btn-primary mb-2">
            <i class="fa fa-home"></i>
            Back to Home
        </a>
        <form method="POST" action="password_change.php" class="form form-control">
            <table class="table">
                <tr class="mb-2">
                    <td class="col-5">Enter your username</td>
                    <td class="col-7"><input type="text" name="username" class="form form-control"></td>
                </tr>
                <tr>
                    <td class="col-5">Enter your existing password</td>
                    <td class="col-7"><input type="password" name="oldpassword" class="form form-control"></td>
                </tr>
                <tr>
                    <td class="col-5">Enter your new password</td>
                    <td class="col-7"><input type="password" name="newpassword" class="form form-control"></td>
                </tr>
                <tr>
                    <td class="col-5">Re-enter your new password</td>
                    <td class="col-7"><input type="password" name="confirmnewpassword" class="form form-control"></td>
                </tr>
            </table>
            <p>
                <button type="submit" class="btn btn-primary col-12">
                    <i class="fa fa-save"></i>
                    Save changes
                </button>
        </form>
    </div>
</body>
</html>