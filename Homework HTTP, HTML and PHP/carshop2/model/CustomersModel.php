<?php
class CustomersModel extends Model
{
	private $name;
	private $family;

    /**
     * CustomersModel constructor.
     * @param $name
     * @param $family
     */
    public function __construct($db, $name, $family)
    {
        parent::__construct($db);
        $this->name = $name;
        $this->family = $family;
        $this->table = "customers";
    }


    public function create()
	{
		// Insert into customers
		try{
            $stmt = $this->db->prepare("
              INSERT INTO `customers`
                (`first_name`, `last_name`)
              VALUES
                (?, ?)");
            $stmt->bindParam(1, $this->name);
            $stmt->bindParam(2, $this->family);
            $stmt->execute();

            $customer_id_query = $this->db->prepare("
            SELECT `id`
            FROM `customers`
            WHERE `id` = LAST_INSERT_ID()
            ");
            $customer_id_query->execute();
            $customer_id = '';
            foreach ($customer_id_query as $i => $iv) {
                $customer_id = $iv['id'];
            }
            return($customer_id);
        } catch (PDOException $e) {
            $this->db->rollBack();
            print "Error!: " . $e->getMessage() . "<br/>";
        }
        return false;
	}

    public function readCustomers()
    {
        try {
            $stmt = $this->db->prepare("
              SELECT *         
                FROM `deal_`");
            $stmt->execute();
            $all = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ($all);
        } catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
        }
    }

	//Todo - problem 2
    // Read all customers

}