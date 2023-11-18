<!DOCTYPE html>
<html>
<head>
    <title>Delete Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .message {
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete Record</h1>
        <div class="message <?php echo isset($isDeleted) && $isDeleted ? 'success' : 'error'; ?>">
            <?php
            include_once("../db.php");
            include_once("../town_city.php");
            if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];

                try {
                    // Instantiate the Database and TownCity classes
                    $db = new Database();
                    $townCity = new TownCity($db);

                    // Attempt to delete the record
                    $isDeleted = $townCity->delete($id);

                    if ($isDeleted) {
                        echo "Record deleted successfully.";
                    } else {
                        echo "Failed to delete the record.";
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage(); // Display or log the specific error
                }
            } else {
                echo "Invalid request or missing ID parameter.";
            }
            ?>
        </div>
    </div>
</body>
</html>
