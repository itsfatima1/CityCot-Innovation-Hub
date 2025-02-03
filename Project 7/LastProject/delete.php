<?php 

$con = mysqli_connect(hostname:"localhost", username:"root", password:"", database:"citycot");
 
if(isset($_GET['deleteid'])) {
    $AssetID = $_GET['deleteid'];
    $sql = "DELETE FROM asset_reg WHERE assetid= $AssetID";
    $res = mysqli_query($con, $sql);
    if($res) {
        #echo "deleted successfully";
        header ('location:asset_reg.php');
    } else {
        echo "not deleted" . mysqli_error($con);
    }
}

?>

