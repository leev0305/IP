<?php

require_once __DIR__ . '../../../database/Database.php';

class Consultation
{
    private $db;
    private $consultations;

    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->consultations = [];
    }

    public function getConsultations()
    {
        try {
            $query = $this->db->query("SELECT * FROM CONSULTATION;");
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $this->consultations = $query->fetchAll();
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function displayConsultations()
    {
        if (!empty($this->consultations)) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Name</th><th>Date</th></tr>"; // Adjust columns as per your table schema
            foreach ($this->consultations as $consultation) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($consultation['bookId']) . "</td>"; // Adjust column names as per your schema
                echo "<td>" . htmlspecialchars($consultation['userId']) . "</td>";
                echo "<td>" . htmlspecialchars($consultation['consultantId']) . "</td>";
                echo "<td>" . htmlspecialchars($consultation['bookDate']) . "</td>";
                echo "<td>" . htmlspecialchars($consultation['bookTime']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No consultations found.";
        }
    }
}

// Example usage
$testing = new Consultation();
$testing->getConsultations();
$testing->displayConsultations();
