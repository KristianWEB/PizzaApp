<?php require 'partials/header.php' ?>


<h1 class="text-center">Your Pizzas</h1>

<div class="container mt-4">
    <div class="row">
            <?php foreach ($result as $item) { ?>
                <div class="col-lg-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item['title'] ?></h5>
                    <p class="card-text"><?php echo $item['ingredients'] ?></p>
                    <p class="card-text"><?php echo $item['email'] ?></p>
                    <p class="card-text"><?php echo $item['created_at'] ?></p>
                    <a href="?id=<?php echo $item['id'] ?>" class="btn btn-primary">Delete</a>
                </div>
            </div>
        </div>
            <?php } ?>
    </div>
</div>



<?php require 'partials/footer.php' ?>
