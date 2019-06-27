<?php require 'partials/header.php' ?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="pizzaName">Pizza name</label>
                    <input type="text" class="form-control" name="pizzaName"  placeholder="Enter the name of your pizza" value="<?php echo $singleItem[0]['title']?>"  required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaName']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <input type="text" class="form-control" name="pizzaIngredients" placeholder="Write in your ingredients"  value="<?php echo $singleItem[0]['ingredients']?>" required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaIngredients']; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="pizzaEmail" placeholder="Your email" value="<?php echo $singleItem[0]['email'] ?>"  required>
                    <div class="text-danger">
                        <?php echo $errors['pizzaEmail']; ?>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary d-block m-auto " name="submit">Update</button>
        </div>
        </form>
    </div>
</div>
</div>


<?php require 'partials/footer.php' ?>

