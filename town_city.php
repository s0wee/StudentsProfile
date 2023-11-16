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
            $stmt->bindParam(':cityId', $cityId);
            $stmt->bindParam(':cityName', $cityName);
            $stmt->execute();

            echo "City created: ID - $cityId, Name - $cityName\n";
        } catch (PDOException $e) {
            // Handle errors (log or display)
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
?>
