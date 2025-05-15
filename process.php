<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="./style_process.css">
</head>
<body>
    <div class="outer-container">
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
            <div class="data-list">
                <div><span>Name</span><span>: <?php echo getValue("ufullname") ?></span></div>
                <div><span>Email</span><span>: <?php echo getValue("uemail") ?></span></div>
                <div><span>Date of Birth</span><span>: <?php echo getValue("udob") ?></span></div>
                <div><span>Country</span><span>: <?php echo getValue("ucountry") ?></span></div>
                <div><span>Preferred Color</span><span>: <?php echo getValue("ucolor") ?></span></div>
                <div><span>Gender</span><span>: <?php echo getValue("ugender") ?></span></div>
            </div>
            <button type="button" class="confirm-button">Confirm</button>
        </div>
    </div>
</body>
</html>