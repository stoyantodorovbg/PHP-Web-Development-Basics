<?php
class CarsModel extends Model
{
	
	private $make;
	private $model;
	private $year;
	
	public function __construct()
	{
		$this->table = "cars";
	}
	
	public function create(){
		try {
            // Insert into car
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `".$this->table."`
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->execute();
            $car_id = $this->db->lastInsertId();
			return $car_id;
		 } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

    // Todo - problem 6
    // Method/s to search for a car and owner. Use join

}