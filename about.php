<?php 
session_start();

if (isset($_GET['username'])) {
    $user = $_GET['username'];
}

//if session is active, display navbar with admin links, if not display standard nav
if (isset($user)) {
    include 'components/nav_admin.php';
} else {
    include 'components/nav.php';
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

    <title>eRevive: About</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>

    
    <div class="container mt-5 mb-2 text-center">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 py-3">
                <h1 class="pb-3">Our mission</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-1">
                    <img src="img/e-waste.jpg" alt="Recycling bin for electronics">
                </div>
                <div class="col-md-6 col-lg-8 mb-1">
                    <h6 class="text-start lh-lg">Electronic waste is a growing problem in our modern society, with millions of tons of electronic devices being discarded each year. These devices can contain harmful chemicals and materials that can harm the environment and human health if not properly disposed of. By recycling your e-waste, you can help conserve natural resources, reduce greenhouse gas emissions, and prevent hazardous materials from polluting our landfills and waterways. Our website provides a space where you get to step up, and take part in the fight against electronic waste production by reselling your used electronic goods.</h6>
                    <h6 class="text-start lh-lg">Join us to promote responsible e-waste recycling and help create a more sustainable future for our planet!</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-5">
        <div class="container mb-5">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 pt-4 pb-4">
                    <div class="text-center py-5">
                        <a href="signup.php" class="btn btn-green"><i class="bi bi-arrow-right"></i> Sign Up Here <i class="bi bi-arrow-left"></i></a>
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