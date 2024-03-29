<?php
include_once("db.php"); // Include the Database class file

class TownCity {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        try {
            $sql = "SELECT * FROM town_city";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    public function create($cityId, $cityName) {
        try {
            $sql = "INSERT INTO town_city (city_id, city_name) VALUES (:cityId, :cityName)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindParam(':cityId', $cityId); // Corrected parameter name
            $stmt->bindParam(':cityName', $cityName); // Corrected parameter name
            $stmt->execute();
    
            echo "Town created: ID - $cityId, Name - $cityName\n";
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    

    public function read($id) {
        try {
            $connection = $this->db->getConnection();
    
            $sql = "SELECT * FROM town_city WHERE city_id = :city_id"; // Corrected parameter name
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':city_id', $id); // Corrected parameter name
            $stmt->execute();
    
            // Fetch the city data as an associative array
            $cityData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $cityData;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    

    public function update($id, $data) {
        try {
            $sql = "UPDATE town_city SET
                    city_id = :city_id,
                    city_name = :city_name
                    WHERE city_id = :id"; // Adjusted the WHERE clause
    
            $stmt = $this->db->getConnection()->prepare($sql);
            // Bind parameters
            $stmt->bindValue(':id', $id); // Binding the id parameter in the WHERE clause
            $stmt->bindValue(':city_id', $data['city_id']);
            $stmt->bindValue(':city_name', $data['city_name']);
    
            // Execute the query
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM town_city WHERE city_id = :id"; // Changed 'id' to 'city_id'
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            // Check if any rows were affected (record deleted)
            if ($stmt->rowCount() > 0) {
                return true; // Record deleted successfully
            } else {
                return false; // No records were deleted (city_id not found)
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
    

    public function displayAll(){
        try {
            $sql = "SELECT * FROM students LIMIT 10"; // Modify the table name to match your database
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
?>
