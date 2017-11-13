<html>
    <body>
<?php
include('dbConfig.php');
    
    //Get all country data
    $query = $db->query("SELECT DISTINCT start_place,route_id FROM route ");
    
    //Count total number of rows
    $rowCount = $query->num_rows;
    ?>
        <form>
    <select name="country" id="country" >
        <option value="">Select Country</option>
        <?php
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['route_id'].'">'.$row['start_place'].'</option>';
            }
        }else{
            echo '<option value="">Country not available</option>';
        }
        
        ?>
    </select>
            </form>
<?php

if(isset($_POST["country"])){
    echo"fsf";
    echo ($_GET['country']);
    
}
?>
</body>
</html>

