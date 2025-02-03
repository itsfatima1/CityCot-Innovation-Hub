<?php
include('database.php');

if(isset($_GET['update_id'])) {
$AssetID = $_GET['update_id'];
   
$sql = "SELECT * FROM asset_reg WHERE AssetID= $AssetID";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) == 0) 
{
    echo "No asset found with this ID.";
}
else 
{
$row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $AssetName = $_POST['assetname'];
    $Category = $_POST['category'];
    $PurchasedDate = $_POST['purdate'];
    $Location = $_POST['placelocation'];
    $Condition = $_POST['conditions'];
    $Assignedto = $_POST['assignedto'];
    $Note = $_POST['notes'];

$sql = "UPDATE asset_reg set AssetID='$AssetID', AssetName='$AssetName', Category='$Category', PurchasedDate='$PurchasedDate',
Locations='$Location', Conditions='$Condition', AssignedTo='$Assignedto', Notes='$Note' WHERE AssetID='$AssetID'";
$result = mysqli_query($con, $sql);
if ($result) {
    header ('location:asset_reg.php');
} else {
    $message = "<p class='error-message'>Error! The data has not been updated</p>";
} 
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/97cdf934e8.js" crossorigin="anonymous"></script>
    <title>Asset Registration System</title>
</head>
<body>

 
    <div class="container">

    <div class="header">
        <h2 style="color: #0A3981;">City<span style="color: #820300;">Cot</span> University</h2>
     </div>


        <div class="card">
        <div class="card-header">
            <h5>Asset Registration</h5>
        </div>
        
        <div class="success-message">
        <?php if (!empty($message)) echo $message; ?>
        </div>

        <div class="card-body">
            <form class="assetreg" method="POST">
             
                <!--first row-->

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="id">Asset ID</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                            <input type="text" class="form-control" id="assetid" name="assetid" value="<?php echo $row['AssetID'];?>" disabled  placeholder="Enter ID" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="name">Asset Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-bars-staggered"></i></span>
                            <input type="text" class="form-control" id="assetname" name="assetname" value="<?php echo $row['AssetName'];?>" placeholder="Enter Name" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="category">Category</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                            <input type="text" class="form-control" id="category" name="category" value="<?php echo $row['Category'];?>" placeholder="Enter Category" required>
                        </div>
                    </div>
                </div>

                <!--second row-->

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="date">Purchased Date</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                            <input type="date" class="form-control" id="purdate" name="purdate" value="<?php echo $row['PurchasedDate'];?>" placeholder="mm/dd/yyyy" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="location">Location</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                            <select id="placelocation" name="placelocation" class="form-select">
                                <option>Select Location</option>
                                <option value="Nakhil Cumpus" <?php echo ($row['Locations'] == 'Nakhill Campus') ? 'selected' : '';?>>Nakhil Campus</option>
                                <option value="Main Campus" <?php echo ($row['Locations'] == 'Main Campus') ? 'selected' : '';?>>Main Campus</option>  
                            </select>
               
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="condition">Condition</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                            <select id="conditions" name="conditions" class="form-select">
                                <option>Select Condition</option>
                                <option value="Working" <?php echo ($row['Conditions']  == 'Working') ? 'selected' : '';?>>Working</option>
                                <option value="Scrap" <?php echo ($row['Conditions']  == 'Scrap') ? 'selected' : '';?>>Scrap</option> 
                            </select>
                       
                        </div>
                    </div>
                </div>

                <!--third row-->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="to">Assigned To</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-circle-check"></i></span>
                            <input type="text" class="form-control" id="assignedto" name="assignedto" value="<?php echo $row['AssignedTo'];?>" placeholder="Enter" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="note">Note</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-pen-to-square"></i></span>
                            <textarea class="form-control" id="notes" name="notes" value="<?php echo $row['Notes'];?>" placeholder="Write Note..." required></textarea>
                        </div>
                    </div>
                </div>

                <!--fourth row-->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <button type="submit" class="btn w-100"><a href="asset_reg.php" style="color: #fff; text-decoration: none;"> Update </a></button>
                    </div>

            </form>
        </div>


    </div>
</div>
</body>
</html>

