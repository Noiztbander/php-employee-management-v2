<?php

class Model
{

  function __construct()
  {
    // echo "<p>Base model class Loaded </p>";

    $this->db = new Database();
  }
}

?>