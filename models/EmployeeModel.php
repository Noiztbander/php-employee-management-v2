<?php

include_once ENTITIES . '/Content.php';

class EmployeeModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        // echo '<p>Dashboard model loaded</p>';
    }

    public function insertNewEmployee($data)
    {
        $result = "OK";
        try {
            //Insert data into DB
            $query = $this->db->connect()->prepare('INSERT INTO employees (name, lastName, email, gender, city, streetAddress, state, age, postalCode, phoneNumber) VALUES (:name, :lastName, :email, :gender, :city, :streetAddress, :state, :age, :postalCode, :phoneNumber)');
            $query->execute(['name' => $data['name'], 'lastName' => $data["lastName"], 'email' => $data['email'], 'gender' => $data['gender'],'city' => $data['city'],'streetAddress' => $data['streetAddress'],'state' => $data['state'],'age' => $data['age'],'postalCode' => $data['postalCode'],'phoneNumber' => $data['phoneNumber']]);
            return $result;
        } catch (PDOException $e) {
            //echo 'Error INSERT: ' . $e->getMessage();
            if ($e->errorInfo[1] == 1062) {
                return $result = "This email already exists";
            } else {
                return $result = "Database error";
            }
            //return $result = $e->getMessage();
        }
    }
    public function getEmployeeById($id)
    {

        $item = new Content();

        $query = $this->db->connect()->prepare("SELECT * FROM employees WHERE id = :id");
        try {
            $query->execute(['id' => $id]);

            while ($row = $query->fetch()) {
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
            }

            return $item;
        } catch (PDOException $e) {
            return null;
        }
    }

}

?>