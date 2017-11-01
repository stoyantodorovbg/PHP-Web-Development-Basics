<?php
class CarsModel extends Model
{
	
	private $make;
	private $model;
	private $year;

	public function __construct($db, $make, $model, $year)
	{
	    parent::__construct($db);
	    $this->make = $make;
	    $this->model = $model;
	    $this->year = $year;
		$this->table = "cars";
	}

	public function create(){
		try {
            // Insert into cars
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
              INSERT INTO `cars`
                (`make`, `model`, `year`)
              VALUES
                (?, ?, ?)");
            $stmt->bindParam(1, $this->make);
            $stmt->bindParam(2, $this->model);
            $stmt->bindParam(3, $this->year);
            $stmt->execute();
            $car_id_query = $this->db->prepare("
            SELECT `id`
            FROM `cars`
            WHERE `id` = LAST_INSERT_ID()
            ");
            $car_id_query->execute();
            $car_id = '';
            foreach($car_id_query as $i => $iv) {
                $car_id = $iv['id'];
            }
			return $car_id;
		 } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}


}