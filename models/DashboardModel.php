<?php

include_once ENTITIES . '/Content.php';

class DashboardModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        // echo '<p>Dashboard model loaded</p>';
    }

    public function get()
    {
        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM employees;");
            while ($row = $query->fetch()) {
                $item = new Content();

                $item->id = $row['id'];
                $item->name = $row['name'];
                $item->lastName = $row['lastName'];
                $item->email = $row['email'];
                $item->gender = $row['gender'];
                $item->city = $row['city'];
                $item->streetAddress = $row['streetAddress'];
                $item->state = $row['state'];
                $item->age = $row['age'];
                $item->postalCode = $row['postalCode'];
                $item->phoneNumber = $row['phoneNumber'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}

?>