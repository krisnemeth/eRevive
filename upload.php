<?php
session_start();

include 'includes/connx.php';
include 'includes/error.php';

$user = $_GET['username'];


/* using message to display different buttons if needed */
$message = '<input type="submit" class="btn btn-green w-25 mb-4" value="Add product" name="submit">';

// grabbing user input and the uploaded file. we store the uploaded file then perform checks on it, then pushing data to db alongside the uploaded file.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $prod_condition = $_POST['prod_condition'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    //grabbing the uploaded file
    $file = $_FILES['file'];
    //storing all types of file data from the array so can perform checks on them
    $fileName = $_FILES['file']['name'];
    $fileTempLocation = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    //cleaning up the file extension
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    //setting allowed file extensions
    $allowed = array('jpg', 'jpeg', 'png');
    //setting conditions before uploading
    if (in_array($fileActualExt, $allowed )) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                //setting unique id as the filename then adding the cleaned file extension on
                $fileNameNew = $user_id . uniqid('', true). "." . $fileActualExt;
                //setting the file destination and adding the new filename to it
                $fileDestination = 'uploads/' . $fileNameNew;
                //moving the file from temp location to destination
                move_uploaded_file($fileTempLocation, $fileDestination);
                // pushing all data into the database based on user_id
                $sql = "INSERT INTO products (name, brand, prod_condition, age, description, image,  price, user_id)
                VALUES ('$name', '$brand', '$prod_condition', '$age', '$description', '$fileDestination', '$price', (SELECT user_id FROM users WHERE username = '$user'))";
            } else {
                $message = '<p class="my-3">Your file is too big.</p>
                    <input type="submit" class="btn btn-green w-25 mb-4" value="Add product" name="submit">';
            }
        } else {
            $message = '<p class="my-3">Something went wrong. We encountered a problem uploading your product.</p>
                    <input type="submit" class="btn btn-green w-25 mb-4" value="Add product" name="submit">';
        }
    } else {
        $message = '<p class="my-3">You can not upload a file of this type.</p>
                    <input type="submit" class="btn btn-green w-25 mb-4" value="Add product" name="submit">';
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: admin.php?username=' . $user);
    } else {
        $message = '<p class="my-3">Something went wrong. We encountered a problem uploading your product.</p>
                    <input type="submit" class="btn btn-green w-25 mb-4" value="Add product" name="submit">';
    }
}
$conn->close();

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
    <title>eRevive: Add Product</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>
    <?php
    include 'components/nav_admin.php';
    ?>

    <div class="container py-5 mb-2">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Add a new product</h1>
                    <h5 class="pb-4">Please provide detailed product information:</h5>
                </div>

                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label" for="name">Product name:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-laptop-fill"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="MacBook Pro" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="brand">Brand:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-apple"></i></span>
                            <input type="text" class="form-control" id="brand" name="brand" placeholder="Apple" required>
                        </div>
                    </div>
                    <label for="prod_condition" class="form-label">Condition:</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="prod_condition" name="prod_condition" required>
                        <option selected>Select an option</option>
                        <option value="Like new">Like new</option>
                        <option value="Good">Good</option>
                        <option value="Ususal wear">Usual wear</option>
                        <option value="Poor">Poor</option>
                        <option value="For parts only">For parts only</option>
                    </select>
                    <label for="age" class="form-label">Product's age:</label>
                    <select class="form-select mb-3" aria-label="Default select example" id="age" name="age" required>
                        <option selected>Select an option</option>
                        <option value="New">New</option>
                        <option value="Less than 6 months">Less than 6 months</option>
                        <option value="Less than 1 year">Less than 1 year</option>
                        <option value="2 years">2 years</option>
                        <option value="More than 2 years">More than 2 years</option>
                    </select>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <div class="input-group mb-1">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-pen-fill"></i></span>
                            <textarea class="form-control" id="description" name="description" rows="4" placeholder="Please describe the product and any features it may have..." required></textarea>
                        </div>
                        <p class="form-text">Please don't use single or double quotes in the description.</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="price">Price:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-pound"></i></span>
                            <input type="text" class="form-control" id="price" name="price" placeholder="900" required>
                        </div>
                        
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="uploaded">Image:</label>
                        <input type="file" class="form-control" name="file">
                    </div>

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