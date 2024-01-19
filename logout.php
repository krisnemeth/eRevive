<?php session_start();

$user = $_GET['username'];

/* kills session on click */
if (isset($_POST['submit'])) {

    session_start();
    session_destroy();
    header('Location:index.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atkinson+Hyperlegible:ital@0;1&family=Michroma&display=swap" rel="stylesheet">
    <!-- custom CSS -->
    <link href="css/stylesheet.css" rel="stylesheet">
    <title>eRevive: Logout</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- navbar -->
    <?php
    include 'components/nav_admin.php';
    ?>

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <div class="container">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>

                    <!-- peronalized warning message -->
                    <h5 class="pb-2">Are you sure you want to log out <?php echo $user ?></span>?</h5>
                    <p class="pb-4">You won't be able to add, update or delete products until you log back in.</p>
                </div>

                <!-- giving the user options to continue logging out, or to return to the admin page -->
                <div class="text-center">                  
                    <form action="index.php" method="POST">
                        <div class="mb-2">
                            <input type="submit" name="submit" id="submit" class="btn btn-danger w-25" value="Log out">
                        </div>
                    </form> 
                    <a href="admin.php?username=<?php echo $user ?>" class="btn btn-green text-white w-25">Cancel</a>
                </div>
                
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'components/footer.php';
    ?>

</body>

</html>