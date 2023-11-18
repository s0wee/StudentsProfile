<?php
include_once("../db.php");
include_once("../town_city.php");

$db = new Database();
$connection = $db->getConnection();
$student = new TownCity($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towns</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <!-- Include the header -->
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Towns</h2>
    <table class="orange-theme">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit | Delete</th>
            </tr>
        </thead>
        <tbody>
            
            
            <?php
            $results = $student->getAll(); 
            foreach ($results as $result) {
            ?>
            <tr>
                <td><?php echo $result['city_id']; ?></td>
                <td><?php echo $result['city_name']; ?></td>
                <td>
                    <a href="town_edit.php?id=<?php echo $result['city_id']; ?>">Edit</a>
                    |
                    <a href="town_delete.php?id=<?php echo $result['city_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
        
    <a class="button-link" href="town_add.php">Add New Record</a>

        </div>
        
  
    <?php include('../templates/footer.html'); ?>


    <p></p>
</body>
</html>