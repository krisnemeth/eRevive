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

    <title>eRevive: Sign Up</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <?php

    //message when page first loads
    $message = '<p>Got one already? Log in<a href="login.php" class="link"> here.</a></p>';

    //when submit btn is pressed, sanitize the username, hash the password, store email in variable, then check if details are already in db, if so
    //provide feedback msg, if not, save details into db. on succesful signup, display message to the user with link to login page.
    if (isset($_POST['submit'])) {

        include 'includes/error.php';

        /* if connect to db if fields exits */
        if (isset($_POST['username']) && isset($_POST['pwd'])) {

            $user = $_POST['username'];
            $user_trim = trim($_POST['username']);
            $user_strip = strip_tags($user_trim);
            $user_htmlspecialchars = htmlspecialchars($user_strip);

            $email = $_POST['email'];

            $pwd = $_POST['pwd'];
            $hashed_pwd_md5 = md5($pwd);

            include 'includes/connx.php';
        }

        $checkUser = "SELECT * FROM users WHERE username = '$user_htmlspecialchars'";
        $result = $conn->query($checkUser);
        if ($result->num_rows > 0) {
            $message = '<p class="text-center">Seems like you already have an account with us. Forgot your password?</p>';
        } else {
            $sql = "INSERT INTO users (username, email, password)VALUES ('$user_htmlspecialchars', '$email', '$hashed_pwd_md5')";
            if ($conn->query($sql) === TRUE) {
                $message = '<p class="text-center form-text">Account created succesfully. Log in<a href="login.php" class="link"> here.</a></p>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->$error;
            }
            $conn->close();
        }
    }
    ?>

</head>

<body class="d-flex flex-column min-vh-100">

    <?php
    include 'components/nav.php';
    ?>

    <div class="container py-5 mb-2">
        <!-- intro -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2 pb-4">
                <div class="text-center">
                    <h1 class="pb-3">Create An Account</h1>
                </div>
                <div class="text-center mt-2">
                    <!-- feedback message  -->
                    <?php echo $message ?>
                </div>
                <!-- form posts to itself, page doesnt change when submit button is clicked -->
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="email">Email:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Provide an email address" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="username">Username:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-square"></i></span>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Pick a username" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="pwd">Password:</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Set a strong password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        </div>
                        <p class="mt-1 form-text">Your password must contain 8 or more characters that include at least one number and one uppercase and lowercase letter!</p>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-green mb-4 w-25" value="Create Account" id="submit" name="submit"></a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php
    include 'components/footer.php';
    ?>

</body>

</html>