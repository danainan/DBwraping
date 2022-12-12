

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin index</title>
</head>

<body >
    
    <center>
    <h1>ADMIN INDEX</h1>
    <div class="pt-5">
    <div class="d-grid gap-2 col-10 mx-5 justify-content-end">
    <a href="insert.php" class="btn btn-primary">Insert</a>
    </div>
    <?php
    header('Content-Type: text/html;charset=tis-620');
    $db = 'C:\xampp\htdocs\DBwraping\LCDTVDATA.mdb';
    if(!file_exists($db)) {
        die("Could not find database file.");
    }
    $conn = odbc_connect("Driver={Microsoft Access Driver (*.mdb, *.accdb)};Dbq=$db;Uid=;Pwd=;", "", ""

    
    );
    
    
    $sql = "SELECT * FROM customer";

    $result = odbc_exec($conn, $sql);


    //delete
    if(isset($_GET['ID'])) {
        $ID = $_GET['ID'];
        $sql = "DELETE FROM customer WHERE ID = $ID";
        $result = odbc_exec($conn, $sql);
        header("location: admin.php");
    }
    

    echo "<table class='table table-striped table-bordered table-hover'>
    <tr>
    <th>ID</th>
    <th>daterecord</th>
    <th>namecutomer</th>
    <th>address</th>
    <th>road</th>
    <th>tumbol</th>
    <th>Amphur</th>
    <th>province</th>
    <th>Tel</th>

    </tr>";
    
    while($row = odbc_fetch_array($result)) {

        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['daterecord'] . "</td>";
        echo "<td>" . $row['namecutomer'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['road'] . "</td>";
        echo "<td>" . $row['tumbol'] . "</td>";
        echo "<td>" . $row['Amphur'] . "</td>";
        echo "<td>" . $row['province'] . "</td>";
        echo "<td>" . $row['Tel'] . "</td>";

        echo "<td><a href='update.php?ID=".$row["ID"]."' class='btn btn-warning'>Edit</a> <a href='admin.php?ID=".$row["ID"]."' onclick='return confirm(\"Are you sure?\")' class='btn btn-danger'>Delete</a></td>";
        echo "</tr>";
        }
        echo "</table>";
    ?>
    
    </div>
    </center>
</body>

</html>