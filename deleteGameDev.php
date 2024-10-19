<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_delete.css">
    <title>Delete a Game Dev</title>
</head>
<body>
    <h1>Are you sure you want to delete this user?</h1>
    <?php $getGameDevByID = getGameDevByID($pdo, $_GET["id"]); ?>
    <form action="core/handleForms.php?id=<?php echo $_GET["id"]; ?>" method="POST">
        <div class="gameDevContainer" style="border-style: solid; font-family:'Arial';">
            <p>First Name: <?php echo $getGameDevByID["first_name"]; ?></p>
            <p>Last Name: <?php echo $getGameDevByID["last_name"]; ?></p>
            <p>Email: <?php echo $getGameDevByID["email"]; ?></p>
            <p>Contact No: <?php echo $getGameDevByID["contact_num"]; ?></p>
            <p>Gender: <?php echo $getGameDevByID["gender"]; ?></p>
            <p>Using Game Engine: <?php echo $getGameDevByID["using_game_engine"]; ?></p>
            <p>Known Programming Language: <?php echo $getGameDevByID["known_prog_lang"]; ?></p>
            <input type="submit" name="deleteGameDevBtn">
        </div>
    </form>
</body>
</html>