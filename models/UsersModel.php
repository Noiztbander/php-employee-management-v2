<?php

class UsersModel extends Model
{
    public function __construct()
    {
        //This calls to the constructor of the class Model is extending
        parent::__construct();

        if (EXECUTION_FLOW)
            echo '<p>Content model</p>';
    }

    public function getUsersFromDb($userInput,$userPassword)
    {

        echo "<p>get users from db</p>";
        echo $userInput . $userPassword;

        // $items = [];

        // try {
        //     $query = $this->db->connect()->query("SELECT * FROM contents;");
        //     while ($row = $query->fetch()) {
        //         $item = new Content();

        //         $item->id = $row['id'];
        //         $item->name = $row['name'];
        //         $item->email = $row['email'];
        //         $item->text = $row['text'];

        //         array_push($items, $item);
        //     }

        //     return $items;
        // } catch (PDOException $e) {
        //     echo $e;
        // }
    }
    
}

?>


$userPassword = SELECT password FROM users WHERE name='admin';
