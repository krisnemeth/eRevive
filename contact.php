<?php 

session_start();

if (!isset($_GET['username'])) {
    header('Location:login.php');
} else {
    $user = $_GET['username'];
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
    <title>eRevive: Contact</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body class="d-flex flex-column min-vh-100">


    <?php

    include 'components/nav_admin.php';

    ?>

    <!-- contact form -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="text-center">
                        <h1 class="pb-1">Get In Touch!</h1>
                        <p class="">Let us know if you have any issues uploading or updating products.</p>
                    </div>
                    <div class="container">
                        <form action="submit">
                            <div class="mb-2">
                                <label for="basic-url" class="form-label">Name:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="basic-url" class="form-label">Email:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="basic-url" class="form-label">Message:</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon3"><i class="bi bi-pen-fill"></i></span>
                                    <textarea class="form-control" name="message" id="" rows="3" maxlength="300" required></textarea>
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <a type="submit" class="btn btn-green w-25" href="contact-fwd.php?username=<?php echo $user ?>">Submit</a>
                            </div>
                        </form>
                    </div>
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