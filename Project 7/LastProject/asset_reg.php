<?php

include("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$AssetID = $_POST['assetid'];
$AssetName = $_POST['assetname'];
$Category = $_POST['category'];
$PurchasedDate = $_POST['purdate'];
$Location = $_POST['placelocation'];
$Condation = $_POST['condition'];
$Assignedto = $_POST['assignto'];
$Note = $_POST['note'];



$insert = "INSERT INTO asset_reg (AssetID, AssetName, 	Category, 	PurchasedDate, 	Locations, 	Conditions, AssignedTo, Notes)
VALUES ('$AssetID', '$AssetName', '$Category', '$PurchasedDate', '$Location', '$Condation', '$Assignedto', '$Note')";

if ($con->query($insert) === TRUE) {  
    $message = "<p class='success-message'>Success! The data has been stored successfully</p>";
} else {
    $message = "<p class='error-message'>Error! The data has not been stored</p>";
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

    <button class="btn"><a href="Log in.php" style="color: white; text-decoration: none;"> Log Out </a></button>

    <div class="header">
        <h2 style="color: #0A3981;">City<span style="color: #eb1325; border-bottom: #0A3981;">Cot</span> University</h2>
     </div>

        <div class="card">
        <div class="card-header">
            <h5>Asset Registration</h5>
        </div>
        
        <div class="success-message">
        <?php if (!empty($message)) echo $message; ?>
        </div>

        <div class="card-body">       
            
        
            <form class="assetreg"  method="POST">
                <!--first row-->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="id">Asset ID</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-id-card"></i></span>
                            <input type="text" class="form-control" id="assetid" name="assetid" placeholder="Enter ID" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="name">Asset Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-bars-staggered"></i></span>
                            <input type="text" class="form-control" id="assetname" name="assetname" placeholder="Enter Name" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="category">Category</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-list"></i></span>
                            <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category" required>
                        </div>
                    </div>
                </div>
                <!--second row-->
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label for="date">Purchased Date</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                            <input type="date" class="form-control" id="purdate" name="purdate" placeholder="mm/dd/yyyy" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="location">Location</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                            <select id="placelocation" name="placelocation" class="form-select">
                                <option>Select Location</option>
                                <option>Nakhil Campus</option>
                                <option>Main Campus</option>  
                            </select>
               
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="condition">Condition</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                            <select id="condition" name="condition" class="form-select">
                                <option>Select Condition</option>
                                <option>Working</option>
                                <option>Scrap</option> 
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
                            <input type="text" class="form-control" id="assignto" name="assignto" placeholder="Enter" required>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="note">Note</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa-regular fa-pen-to-square"></i></span>
                            <textarea class="form-control" id="note" name="note" placeholder="Write Note..." required></textarea>
                        </div>
                    </div>
                </div>

                <!--fourth row-->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <button type="submit" class="btn w-100" style="color:white"> Submit </button>
                    </div>

            </form>
        </div>


    </div>
</div>



<div class="container">
    <div class="card">

        <div class="card-header">
          <h4> Asset List </h4>
        </div>
       
        <div class="card-body" style="overflow-x:auto;">


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Asset ID</th>
                        <th scope="col">Asset Name</th>
                           <th scope="col">Category</th>
                           <th scope="col">Location</th>
                           <th scope="col">Condation</th>
                           <th scope="col">Actions</th>
                        </tr>
                </thead>
                <tbody>
                <?php

        $sql = "Select * from `asset_reg`";
        $res = mysqli_query($con, $sql);
            if($res){
            while ($row = mysqli_fetch_assoc($res)){
                    $AssetID = $row['AssetID'];
                    $AssetName = $row['AssetName'];
                    $Category = $row['Category'];
                    $Location = $row['Locations'];
                    $Condation = $row['Conditions'];
                    echo '<tr>
                    <th scope= "row">'.$AssetID.'</th>
                      <td>'.$AssetName.'</td>
                      <td>'.$Category.'</td>
                      <td>'.$Location.'</td>
                      <td>'.$Condation.'</td>
                      <td> 
        <button class="btn "> <a href="update.php?update_id=' . $row['AssetID'] . '"  class="text-light" style="text-decoration: none;">Update</a></button>
        <button class="btn "><a href="delete.php?deleteid=' . $row['AssetID'] . '" class="text-light" style="text-decoration: none;">Delete</a></button>
                      </td>
                    </tr>';
                }
            }

                ?>
                    </tbody>
                    </table>
                    </div>
                    </div>
        </div>
    
</body>
</html>