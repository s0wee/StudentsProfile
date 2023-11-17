<?php
include_once("../db.php");
include_once("../student.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new Database();
    $townCity = new TownCity($db);
    $cityData = $townCity->read($id); 

    if ($cityData) {

    } else {
        echo "City not found.";
    }
} else {
    echo "City ID not provided.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'city_id' => $_POST['city_id'],
        'city_name' => $_POST['city_name'],
    ];

    $db = new Database();
    $townCity = new TownCity($db);

    if ($townCity->update($id, $data)) {
        echo "City updated successfully.";
    } else {
        echo "Failed to update the City.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Edit Student</title>
</head>
<body>
    <!-- Include the header and navbar -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Edit City</h2>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $cityData['id']; ?>">
        
        <label for="city_id">City ID:</label>
        <input type="text" name="city_id" id="city_id" value="<?php echo $cityData['city_id']; ?>">
        
        <input type="submit" value="Update">
    </form>
    </div>
    <?php include('../templates/footer.html'); ?>
</body>
</html>