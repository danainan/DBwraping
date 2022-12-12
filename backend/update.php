<?php

header('Content-Type: text/html;charset=tis-620');
$db = 'C:\xampp\htdocs\DBwraping\LCDTVDATA.mdb';
if (!file_exists($db)) {
    die("Could not find database file.");
}

$conn = odbc_connect("Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$db;Uid=;Pwd=;", "", "");

$sql = "SELECT * FROM customer";

$result = odbc_exec($conn, $sql);

if(isset($_GET['ID'])) {
    $ID = $_GET['ID'];
    $sql = "SELECT * FROM customer WHERE ID = $ID";
    $result = odbc_exec($conn, $sql);
    $row = odbc_fetch_array($result);
}


if (isset($_POST['submit'])) {
    $ID = $_POST['ID'];
    $daterecord = $_POST['daterecord'];
    $namecutomer = $_POST['namecutomer'];
    $address = $_POST['address'];
    $road = $_POST['road'];
    $tumbol = $_POST['tumbol'];
    $Amphur = $_POST['Amphur'];
    $province = $_POST['province'];
    $Tel = $_POST['Tel'];

    $sql = "UPDATE customer SET daterecord = '$daterecord', namecutomer = '$namecutomer', address = '$address', road = '$road', tumbol = '$tumbol', Amphur = '$Amphur', province = '$province', Tel = '$Tel' WHERE ID = $ID";

    $result = odbc_exec($conn, $sql);


    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $error;
    }
}

if(isset($_POST['delete'])) {
    $ID = $_POST['ID'];

    $sql = "DELETE FROM customer WHERE ID = $ID";

    $result = odbc_exec($conn, $sql);
    echo $sql;

    if ($result) {
        header("Location: admin.php");
    } else {
        echo "Error: " . $sql . "<br>" . $error;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>update</title>
</head>

<body>
    <div class="container-fluid">
        <form method="post">
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="ID" id="ID" class="form-control" placeholder="Enter ID" value="<?php echo $row['ID']; ?>" readonly>

            </div>

            <div class="form-group">
                <label>daterecord example 02/07/2565 </label>
                <input type="date" name="daterecord" id="daterecord" class="form-control" placeholder="Enter daterecord" value=<?= $row['daterecord'];?>>
            </div>

            <div class="form-group">
                <label>namecutomer</label>
                <input type="text" name="namecutomer" id="namecutomer" class="form-control" placeholder="Enter productLine" value="<?php echo $row['namecutomer']; ?>">
            </div>

            <div class="form-group">
                <label>address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" value="<?php echo $row['address']; ?>">
            </div>

            <div class="form-group">
                <label>road</label>
                <input type="text" name="road" id="road" class="form-control" placeholder="Enter road" value="<?php echo $row['road']; ?>">
            </div>

            <div class="form-group">
                <label>tumbol</label>
                <input type="text" name="tumbol" id="tumbol" class="form-control" placeholder="Enter tumbol" value="<?php echo $row['tumbol']; ?>">
            </div>

            <div class="form-group">
                <label>Amphur</label>
                <input type="text" name="Amphur" id="Amphur" class="form-control" placeholder="Enter Amphur" value="<?php echo $row['Amphur']; ?>">
            </div>

            <div class="form-group">
                <label>province</label>
                <input type="text" name="province" id="province" class="form-control" placeholder="Enter province" value="<?php echo $row['province']; ?>">
            </div>

            <div class="form-group">
                <label>Tel</label>
                <input type="text" name="Tel" id="Tel" class="form-control" placeholder="Enter Tel" value="<?php echo $row['Tel']; ?>">
            </div>

            <div class="pt-5">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
            </div>
        </form>
    </div>

</body>

</html>