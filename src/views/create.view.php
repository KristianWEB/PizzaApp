<?php




/**
 * AS I CAN'T IMPLEMENT THE ROUTER RIGHT NOW I'VE CREATED A SIMPLE FORM VALIDATION
 * JUST TO HAVE THAT SIMPLE THING COVERED . WE NEED TO SEND THE FORM DATA TO /controllers/FormController.php
 *
 *
 *
 * */






$title = $email = $ingredients = '';
$errors = ['pizzaName' => '', 'pizzaIngredients'=> '', 'pizzaEmail'=> ''];

if(isset($_POST['submit'])) {

    //check email


    //check title
    if (empty($_POST['pizzaName'])) {
        $errors['pizzaName'] = "A title is required <br>";
    } else {
        $title = $_POST['pizzaName'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['pizzaName'] = 'Title must be letters and spaces only';
        }
    }

    //check ingredients
    if (empty($_POST['pizzaIngredients'])) {
        $errors['pizzaIngredients'] = "At least one ingredient is required <br>";
    } else {
        $ingredients = $_POST['pizzaIngredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(, \s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['pizzaIngredients'] = 'Ingredients must be a comma separated list';
        }
    }


    if (empty($_POST['pizzaEmail'])) {
        $errors['pizzaName'] =  "Email is required<br>";
    } else {
        $email = $_POST['pizzaEmail'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['pizzaEmail'] = 'Email must be a valid email address';
        }
    }


} // end of post check


?>





<?php require 'partials/header.php' ?>



<div class="container mt-5">
    <button class="btn btn-primary">Go Back</button>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form method="POST" action="create.view.php">
                <div class="form-group">
                    <label for="pizzaName">Pizza name</label>
                    <input type="text" class="form-control" name="pizzaName"  placeholder="Enter the name of your pizza" value="<?php echo htmlspecialchars($title) ?>" required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaName']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <input type="text" class="form-control" name="pizzaIngredients" placeholder="Write in your ingredients" value="<?php echo htmlspecialchars($ingredients) ?>" required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaIngredients']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="pizzaEmail" placeholder="Your email" value="<?php echo htmlspecialchars($email) ?>" required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaEmail']; ?>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary d-block m-auto " name="submit">Submit</button>
        </div>
            </form>
        </div>
    </div>
</div>


<?php require 'partials/footer.php' ?>

