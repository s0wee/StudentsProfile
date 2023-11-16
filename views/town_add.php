<?php
include_once("../db.php");
include_once("../town_city.php");

$db = new Database();
$connection = $db->getConnection();
$townCity = new TownCity($db);

// Example usage:
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["city_id"]) && isset($_POST["city_name"])) {
    $cityId = $_POST["city_id"];
    $cityName = $_POST["city_name"];

    // Create a new city
    $townCity->create($cityId, $cityName);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add City</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <h2>Add a City</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        City ID: <input type="number" name="city_id"><br><br>
        City Name: <input type="text" name="city_name"><br><br>
        <input type="submit" value="Add">
    </form>
</body>
</html>
