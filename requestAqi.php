<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request</title>
    <link rel="stylesheet" href="./style_requestAqi.css">
</head>
<body>
    <div class="outer-container">
        <div class="request-box">
            <h3>Select Cities to View AQI</h3>
            <form action="showAqi.php" method="post" onsubmit="return validateSelection()">
                <?php
                $con = mysqli_connect("localhost", "root", "", "AQI");
                $sql = "SELECT city, country FROM infoAQI LIMIT 10";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="city-option">';
                        echo '<input type="checkbox" name="cities[]" value="'.$row['city'].','.$row['country'].'">';
                        echo '<label>'.$row['city'].', '.$row['country'].'</label>';
                        echo '</div>';
                    }
                }
                mysqli_close($con);
                ?>
                <div id="error-msg" class="error"></div>
                <button type="submit" class="show-button">Show AQI</button>
            </form>
        </div>
    </div>
    <script>
        function validateSelection() {
            const checkboxes = document.querySelectorAll('input[name="cities[]"]');
            let checked = false;
            
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) checked = true;
            });

            if (!checked) {
                document.getElementById('error-msg').textContent = 'Please select at least one city!';
                return false;
            }
            document.getElementById('error-msg').textContent = '';
            return true;
        }
    </script>
</body>
</html>