<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show AQI</title>
    <link rel="stylesheet" href="./style_showAqi.css">
</head>
<body>
    <div class="outer-container">
        <div class="aqi-table">
            <h3 class="aqi-title">Air Quality Index</h3>
            <table>
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>City</th>
                        <th>AQI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(isset($_POST['cities'])) {
                        $con = mysqli_connect("localhost", "root", "", "AQI");
                        
                        // Create placeholders for the query
                        $selected = $_POST['cities'];
                        
                        // Split city/country pairs
                        $params = [];
                        foreach($selected as $pair) {
                            list($city, $country) = explode(',', $pair);
                            $params[] = $city;
                            $params[] = $country;
                        }
                        
                        // Prepare query
                        $sql = "SELECT country, city, aqi FROM infoAQI WHERE ";
                        $conditions = [];
                        for($i = 0; $i < count($selected); $i++) {
                            $conditions[] = "(city = ? AND country = ?)";
                        }
                        $sql .= implode(" OR ", $conditions);
                        
                        $stmt = mysqli_prepare($con, $sql);
                        mysqli_stmt_bind_param($stmt, str_repeat('ss', count($selected)), ...$params);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>{$row['country']}</td>
                                    <td>{$row['city']}</td>
                                    <td>{$row['aqi']}</td>
                                  </tr>";
                        }
                        mysqli_close($con);
                    } else {
                        echo "<tr><td colspan='3'>No cities selected</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>