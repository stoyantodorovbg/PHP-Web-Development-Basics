<?php
class CustomersModel extends Model
{
	private $name;
	private $family;
	
	public function create()
	{
		// Insert into customers
		try{
            $stmt = $this->db->prepare("
              INSERT INTO `".$this->table."`
                (`first_name`, `family_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->execute();
            $customer_id = $this->db->lastInsertId();
            return($customer_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

	//Todo - problem 2
    // Read all customers

}