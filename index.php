<?php

session_start();

include 'includes/connx.php';
include 'includes/error.php';

if (isset($_GET['username'])) {    
    $user = $_GET['username'];   
} else {
    $user = '';
}

//when session is active, display nav_admin, otherwise diaplay normal nav. To keep the session going, form will re-pass un to the url when page loasd with search results.
//if user's not logged in, form will not pass username in url

if (isset($user) && $_SESSION['userLogged'] === $user) {
    include 'components/nav_admin.php';

    $form_action = 'index.php?username=' . $user . '#results';
} else {
    include 'components/nav.php';

    $form_action = 'index.php#results';
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
    <title>eRevive: Home</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>

    <div class="container-fluid header text-white">
        <div class="container text-center py-4">
            <h1 class="pb-2 text-white">Welcome to eRevive!</h1>
            <h2 class="text-white">Your one-stop-shop for recycled, refurbished, ready-to-reuse electronics.</h2>
            <div class="row pb-2">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h5 class="pb-4 pb-md-3">Electronic waste is a growing problem in our modern society, with millions of tons of electronic devices being discarded each year. Join us in our quest to help recycle some of these goods, and give them a second chance at life! Create an account and start recycling!
                    </h5>
                    <a href="signup.php" class="btn btn-warning w-25">Sign Up</a>
                </div>
            </div>
        </div>
    </div>

    <!-- search-->
    <div class="container text-center py-5">
        <h3 class="mb-3" id="results"></h3>
        <form action="<?php echo $form_action ?>" method="POST">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 mb-3 mb-lg-0">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control me-0" placeholder="Search for products..." id="search_param" name="search_param" required>
                        <input type="submit" class="btn btn-green w-25 ms-0" id="submit" name="submit" value="Search">
                    </div>
                </div>
            </div>
            
        </form>


        <div class="row pt-5 pb-1">

            <?php

            // if form has been submitted, taking the user input, searching the db, then displaying the number of results, and the results in a grid
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit']) && isset($_POST['search_param'])) {

                $search_param  = $_POST['search_param'];

                $sql =  "SELECT * FROM products
                    WHERE name LIKE '%$search_param%' 
                    OR brand LIKE '%$search_param%' 
                    OR prod_condition LIKE '%$search_param%' 
                    OR age LIKE '%$search_param%'
                    OR description LIKE '%$search_param%'
                    ORDER BY name";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    $items_num = $result->num_rows;

                    if (isset($search_param)) {
                        echo '<h5 class="text-start prod_title mb-4">' . $items_num . ' result(s) for "' . $search_param . '":</h5>';
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                        echo '<div class="card h-100 ">';
                        echo '<img alt="" class="card-img-top" src="' . $row["image"] . '">';
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="prod_title">' . $row['name'] . '</h5>';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '</div>'; 
                        echo '<div class="mt-auto">';
                        echo '<p class="price">£' . $row['price'] . '</p>';
                        // performing checks to allow user to purchase item (redirect to product page), or force them to sign up first
                        if ($_SESSION['userLogged'] === $user) {
                            echo '<a href="product.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-green">Purchase</a>';
                        } else if ($user === '') {
                            echo '<a href="signup.php" class="btn btn-green">Purchase</a>';
                        } else {
                            echo '<a href="signup.php" class="btn btn-green">Purchase</a>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }

                    //button to clear search results and redirect to home
                    echo '<div class="mt-5">';
                    if (isset($user) && $_SESSION['userLogged'] === $user) {
                        echo '<a href="index.php?username=' . $user . '" class="btn btn-green">All Products</a>';
                    } else {
                        echo '<a href="index.php" class="btn btn-green">All Products</a>';
                    }

                    echo  '</div>';
                } else {
                    //displaying message to user
                    echo "<h5 class='prod_title mb-4'>No products found.</h5>";
                }
            } else {

                //display all products in a grid
                
                $sql =  "SELECT prod_id, name, brand, prod_condition, description, age, image, price FROM products";
                $result_all = $conn->query($sql);

                if ($result_all->num_rows > 0) {
                    
                    while ($row = $result_all->fetch_assoc()) {
                        echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                        echo '<div class="card h-100 ">';
                        echo '<img alt="" class="card-img-top" src="' . $row["image"] . '">';;
                        echo '<div class="card-body d-flex flex-column">';
                        echo '<h5 class="prod_title">' . $row['name'] . '</h5>';
                        echo '<div class=text-start>';
                        echo '<p class="description">' . $row['description'] . '</p>';
                        echo '<p><span class="rows">Brand: </span>' . $row['brand'] . '</p>';
                        echo '<p><span class="rows">Condition: </span>' . $row['prod_condition'] . '</p>';
                        echo '<p><span class="rows">Age: </span>' . $row['age'] . '</p>';
                        echo '</div>'; 
                        echo '<div class="mt-auto">';
                        echo '<p class="price">£' . $row['price'] . '</p>';
                        // performing checks to allow user to purchase item, or force them to sign up first
                        if ($user === '') {
                            echo '<a href="signup.php" class="btn btn-green">Purchase</a>';
                        } else if (isset($user)) {
                            echo '<a href="product.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-green w-50">Purchase</a>';
                        } else {
                            echo '<a href="signup.php" class="btn btn-green">Purchase</a>';
                        }
                        
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'components/footer.php';
    ?>

</body>

</html>