<?php
require_once './conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <?php require_once './nav.php'; ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Your Car</h1>
                <?php
                if (!empty($message)) {
                    echo `<div class="alert alert-success">$message</div>`;
                }
                ?>
            </div>
            <div class="card-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Car Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Car Name</label>
                        <input type="text" class="form-control" name="car_name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Car Model</label>
                        <input type="text" class="form-control" name="model">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Car Price</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Color</label>
                        <input type="text" class="form-control" name="color">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>


<?php
if (isset($_POST["submit"])) {
    $image = $_FILES["image"]["name"];
    $car_name = $_POST["car_name"];
    $model = $_POST["model"];
    $price = $_POST["price"];
    $color = $_POST["color"];

    $sql = "insert into cars (CarName,Image,Model,Price,Color) values (:car_name,:img,:model,:price,:color)";

    $query = $conn->prepare($sql);

    // Bind the parameters
    $query->bindParam(':car_name', $car_name, PDO::PARAM_STR);
    $query->bindParam(':img', $image, PDO::PARAM_STR);
    $query->bindParam(':model', $model, PDO::PARAM_STR);
    $query->bindParam(':price', $price, PDO::PARAM_STR);
    $query->bindParam(':color', $color, PDO::PARAM_STR);

    $result = $query->execute();

    header("Location: index.php");
}

?>