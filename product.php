<?php

session_start();

$single_prod = $_GET['id'];

if (isset($_GET['username'])) {
    $user = $_GET['username'];
} else {
    $user = '';
}

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

    <title>eRevive: Product</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body class="d-flex flex-column min-vh-100">

    <div class="container py-5 mb-5">
        <div class="text-center mb-3">
            <div class="row gx-5">

                <?php

                include('includes/connx.php');

                // select prod in db whose ID = id passed in URL
                $sql = "SELECT * FROM products WHERE prod_id = '$single_prod'";
                $result = $conn->query($sql);

                // if match in db
                if ($result->num_rows === 1) {

                    // display products
                    while ($row = $result->fetch_assoc()) {
                        echo '<h1 class="prod_title pb-4">' . $row['name'] . '</h1>';
                        echo '<div class="col-md-6 col-lg-5 offset-lg-1 col-xl-4 offset-xl-2">';
                        echo '<img class="mb-3 mb-md-0 "alt="" src="' . $row["image"] . '">';
                        echo '</div>';
                        echo '<div class="col-md-6 col-lg-5 col-xl-4 pt-2">';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '<p><span class="rows">Price: </span>£' . $row['price'] . '</p>';
                        echo '<div class="text-center text-md-start">';
                        echo '<a href="#" class="btn btn-green w-25 mt-2">Purchase</a><br>';
                        if ($_SESSION['userLogged'] === $user) {
                            echo '<a href="index.php?username=' . $user . '" class="btn btn-green w-25 mt-3">Home</a>';
                        } else if ($user === '') {
                            echo '<a href="index.php" class="btn btn-green w-25 mt-3">Home</a>';
                        } else {
                            echo '<a href="index.php" class="btn btn-green w-25 mt-3">Home</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>We couldn't find the product.</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'components/footer.php';
    ?>

    
</body>

</html>