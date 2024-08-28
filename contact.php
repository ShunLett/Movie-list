<?php include_once("partial/header.php"); ?>

<h1 class="text-center">Contact Us</h1>


<?php
$recipient = "shunmovies@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $suggestion = htmlspecialchars(trim($_POST["suggestion"]));

    if (!empty($name) && !empty($email) && !empty($suggestion) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = "Contact Form Submission from $name";
        $message = "Name: $name\nEmail: $email\n\nSuggestion:\n$suggestion";
        $headers = "From: $email";

        if (mail($recipient, $subject, $message, $headers)) {
            $success_message = "Thank you for your suggestion! We will get back to you soon.";
        } else {
            $error_message = "Sorry, there was an error sending your message. Please try again.";
        }
    } else {
        $error_message = "Please fill in all fields correctly.";
    }
}
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (isset($success_message)) { ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
            <?php } ?>
            <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
            <?php } ?>

            <form method="post" action="contact.php">
                <div class="row my-3">
                    <div class="col-6 mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-12 mb-3">
                        <label for="suggestion" class="form-label">Suggestion</label>
                        <textarea class="form-control" id="suggestion" name="suggestion" rows="4" required></textarea>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once("partial/footer.php"); ?>