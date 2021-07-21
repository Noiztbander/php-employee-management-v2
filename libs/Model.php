<?php

class Model
{

  function __construct()
  {
    echo "<p>Base model class</p>";

    $this->db = new Database();
  }
}

?>