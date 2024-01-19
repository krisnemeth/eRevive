<?php session_start();

//if the user's not logged in an tries to access the admin page, gets redirected to the login page, otherwise get the user from url
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
    <title>eRevive: Admin</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    //no need for checking if user's logged in, since they only able to access the admin page if they are. Navbar with admin links is displayed
    include 'components/nav_admin.php';
    ?>

    <div class="container-fluid header text-white">
        <div class="container text-center py-4">
            <h1 class="pb-2 text-white">Welcome <?php echo $user ?>!</h1>
            <h2 class="text-white">This is the admin area.</h2>
            <div class="row pb-2">
                <div class="col-12 col-lg-8 offset-lg-2">
                    <h5 class="pb-4">In this space, you can upload new products, and can also edit or delete your existing ones. From the yellow dropdown menu in the top left corner (which you can access wherever you are), you can quickly upload a product, manage your uploaded ones, change your password, and log out once you're finished.</h5>
                    <!-- passing username to upload page  -->   
                    <a href="upload.php?username=<?php echo $user ?>" class="btn btn-warning w-25"><i class="bi bi-plus-square"></i> Add Product</a>
                </div>
            </div>

        </div>
    </div>

    <!-- connecting to the db, selecting the products uploaded by the user registered for this session, 
    and displaying them in a grid. If there are no products, displaying message. -->
    <div class="container py-5">
        <div class="row text-center">
            <h3 class="text-start pb-3 ">Overview</h3>

            <?php
            include('includes/connx.php');

            $sql = "SELECT * FROM products WHERE user_id = (SELECT user_id FROM users WHERE username = '$user')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                $items_num = $result->num_rows;
                echo '<h5 class="mb-5 text-start">You have <span class="text-green">' . $items_num . '</span> product(s) for sale so far:</h5>';

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-sm-6 col-lg-4 col-xl-3 mb-3">';
                    echo '<div class="card h-100 ">';
                    echo '<img alt="" class="card-img-top" src="' . $row["image"] . '" alt="product image">';
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

                    // passing prod_id in the url towards the update page, and both prod_id and the username towards delete page
                    echo '<a href="update.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-green w-50 mb-2">Update</a>';
                    echo '<a href="delete.php?id=' . $row['prod_id'] . '&username=' . $user . '" class="btn btn-green w-50">Delete</a>';

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>'; 
                }
            } else {
                echo "<p class='mb-5 form-text'>You don't seem to have any product(s) yet</p>";
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