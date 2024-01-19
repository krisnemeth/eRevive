<?php

$user = $_GET['username'];

include 'includes/connx.php';

/* grabs the product's id using the GET method */
$prod_id = $_GET['id'];

$message = '<p class="form-text mt-5">The previous information can not be retrived once changed.</p>
    <input type="submit" name="submit" class="btn btn-green w-25 mb-4" value="Update">';

/* retrive all the already exisiting information of the product with that specific id */
$sql = "SELECT * from products WHERE prod_id = '$prod_id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    /* store product's info in different variables */
    $selected_prod_name = $row['name'];
    $selected_prod_brand = $row['brand'];
    $selected_prod_condition = $row['prod_condition'];
    $selected_prod_age = $row['age'];
    $selected_prod_description = $row['description'];
    $selected_prod_price = $row['price'];
    $selected_prod_image = $row['image'];
}

/* if submit button pressed */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $new_name = $_POST['new-name'];
    $new_brand = $_POST['new_brand'];
    $new_condition = $_POST['new_condition'];
    $new_age = $_POST['new_age'];
    $new_description = $_POST['new_description'];
    $new_price = $_POST['new_price'];

    $sql = "UPDATE products 
        SET name = '$new_name', 
        brand = '$new_brand', 
        prod_condition = '$new_condition',
        age = '$new_age',
        description = '$new_description',
        price = '$new_price' 
        WHERE prod_id = '$prod_id'";

    if (mysqli_query($conn, $sql)) {
        header('Location:admin.php?username=' . $user);
    } else {
        $message = "nope";
        echo "Error updating record: " . mysqli_error($conn);
    }
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
    <title>eRevive: Update a product</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>
    <?php
    include 'components/nav_admin.php';
    ?>

    <div class="container py-5 mb-2">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Update the product: <?php echo $selected_prod_name ?></h1>
                    <h5 class="pb-4">Here, you can update the product then save it.</h5>
                    <img class="preview mb-5" src="<?php echo $selected_prod_image ?>" alt="preview image">
                </div>


                <form method="POST">

                    
                    <div class="mb-3">
                        <label class="form-label" for="new-name">Prod name:</label>
                        <input type="text" class="form-control" id="new-name" name="new-name" placeholder="Ex: iPhone 12 pro" value="<?php echo $selected_prod_name ?>">
                        
                        <p class="mt-1"><span>Current product name:</span><span class="form-text"> <?php echo $selected_prod_name ?></span></p>
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label" for="new-brand">Brand:</label>
                        <input type="text" class="form-control" id="new-brand" name="new_brand" placeholder="Ex: Apple" value="<?php echo $selected_prod_brand ?>">
                        
                        <p class="mt-1"><span>Current product brand:</span><span class="form-text"> <?php echo $selected_prod_brand ?></span></p>
                    </div>

                    
                    <div class="mb-3">
                        <label for="new_condition" class="form-label">Condition:</label>
                        <select class="form-select" aria-label="Default select example" id="new_condition" name="new_condition">
                            <option selected><?php echo $selected_prod_condition ?></option>
                            <option value="Like new">Like new</option>
                            <option value="Good">Good</option>
                            <option value="Ususal wear">Usual wear</option>
                            <option value="Poor">Poor</option>
                            <option value="For parts only">For parts only</option>
                        </select>
                        
                        <p class="mt-1"><span>Current product condition:</span><span class="form-text"> <?php echo $selected_prod_condition ?></span></p>
                    </div>

                    <!-- age -->
                    <div class="mb-3">
                        <label for="new_age" class="form-label">Product's age:</label>
                        <select class="form-select" aria-label="Default select example" id="new_age" name="new_age">
                            <option selected><?php echo $selected_prod_age ?></option>
                            <option value="New">New</option>
                            <option value="Less than 6 months">Less than 6 months</option>
                            <option value="Less than 1 year">Less than 1 year</option>
                            <option value="2 years">2 years</option>
                            <option value="More than 2 years">More than 2 years</option>
                        </select>
                        
                        <p class="mt-1"><span>Current product condition:</span><span class="form-text"> <?php echo $selected_prod_age ?></span></p>
                    </div>

                    
                    <div class="mb-3">
                        <label for="new_description" class="form-label">Description:</label>
                        <textarea class="form-control" id="new_description" name="new_description" rows="4" value="<?php echo $selected_prod_description ?>" placeholder="<?php echo $selected_prod_description ?>"></textarea>
                        
                        <p class="mt-1"><span>Current product description:</span><span class="form-text"> <?php echo $selected_prod_description ?></span></p>
                    </div>

                    <!-- class -->
                    <div class="mb-3">
                        <label class="form-label" for="new_price">Price:</label>
                        <input type="text" class="form-control" id="new_price" name="new_price" placeholder="Ex: £120" value="<?php echo $selected_prod_price ?>">
                        
                        <p class="mt-1"><span>Current product price:</span><span class="form-text"> <?php echo $selected_prod_price ?></span></p>
                    </div>

                    <!-- button -->
                    <div class="text-center">
                        <?php echo $message ?>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php
    include 'components/footer.php';
    ?>

</body>

</html>