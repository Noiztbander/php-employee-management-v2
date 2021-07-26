<?php

include_once ENTITIES . '/Content.php';

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function getReceivedUserFromDb($userInput,$userPassword)
    {

        $items = [];

        try {
            $query = $this->db->connect()->query("SELECT * FROM users WHERE name='$userInput'");
            while ($row = $query->fetch()) {
                $item = new Content();

                $item->id = $row['userId'];
                $item->name = $row['name'];
                $item->email = $row['email'];
                $item->password = $row['password'];
                $item->isAdmin = $row['isAdmin'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>

