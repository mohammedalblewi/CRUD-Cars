<?php
require_once './conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php require_once './nav.php';
    $query = $conn->query("select * from cars");
    $cars = $query->fetchAll(PDO::FETCH_OBJ);

    ?>

    <div class="container mt-5">
        <div class="row">
            <?php foreach ($cars as $car) : ?>
                <div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/<?php echo $car->Image ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car->CarName ?></h5>
                            <h5 class="card-title"><?php echo $car->Price ?></h5>
                            <p class="card-text"><?php echo $car->Model ?></p>
                            <p class="card-text"><?php echo $car->Color ?></p>
                            <a href="edit.php?id=<?php echo $car->CarID ?>" class="btn btn-primary">Edit</a>
                            <a href="delete.php?id=<?php echo $car->CarID ?>" class="btn btn-danger">Remove</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>