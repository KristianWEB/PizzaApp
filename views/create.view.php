<?php require 'partials/header.php'?>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <form>
                <div class="form-group">
                    <label for="pizzaName">Pizza name</label>
                    <input type="text" class="form-control" name="pizzaName"  placeholder="Enter the name of your pizza">
                </div>
                <div class="form-group">
                    <label for="ingredients">Ingredients</label>
                    <input type="text" class="form-control" name="pizzaIngredients" placeholder="Write in your ingredients">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="pizzaIngredients" placeholder="Your email">

                </div>
                <button type="submit" class="btn btn-primary d-block m-auto ">Submit</button>
        </div>
            </form>
        </div>
    </div>
</div>


<?php require 'partials/footer.php'?>