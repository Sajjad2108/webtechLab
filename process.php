<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="./process_style.css">
</head>
<body>
    <div class="confirm-box">
        <h3>Confirm Details</h3>
        <?php
        if (!isset($_POST['submit'])) {
            header("Location: index.html"); 
            exit();
        }
        function getValue($key){
            if ($_POST[$key] != "") {
                return $_POST[$key];
            }
            else{
                return " No Data";
            }
        }
        ?>
        <p>Name: <?php echo " " .getValue("ufullname") ?></p>
        <p>Email: <?php echo " " .getValue("uemail") ?></p>
        <p>Date of Birth: <?php echo " " .getValue("udob") ?></p>
        <p>Country: <?php echo " " .getValue("ucountry") ?></p>
        <p>Prefered Color: <?php echo " " .getValue("ucolor") ?></p>
        <p>Gender: <?php echo " " .getValue("ugender") ?></p>

        <button type="button">Confirm</button>
    </div>
</body>
</html>