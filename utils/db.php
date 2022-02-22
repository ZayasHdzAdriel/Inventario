<?php

$servername = "localhost";
$username = "root";
$password = "";

$connection = mysqli_connect("localhost", "root", "") or die("Error conexion");
$connection->select_db("prueba");


function ComboBoxFor($name, $table, $placeholder, $data)
{
    global $connection;

    $sql = "SELECT id, name FROM $table";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {

        echo "<select name='$name' class='form-select'>";

        if (is_null($data)) {

        }



        echo '</select>';

        
        echo "<option value='' selected disabled >$placeholder</option>";

        while ($row = $result->fetch_assoc()) {

            if ($row['id'] == $data[$name]) {
                echo '<option selected value="' . $row["id"] . '">' . $row["name"] . '</option>';
            } else {
                echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
            }

            echo '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
        }

        
    }
}
