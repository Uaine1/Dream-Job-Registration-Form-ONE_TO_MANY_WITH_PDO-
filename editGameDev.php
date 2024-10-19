<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_edit.css">
    <title>Edit a Game Dev information</title>
</head>
<body>
    <?php $getGameDevByID = getGameDevByID($pdo, $_GET["id"]); ?>
    <form action="core/handleForms.php?id=<?php echo $_GET["id"]; ?>" method="POST">
        <p>
            <label for="id">ID</label>
            <input type="text" name="id" value="<?php echo $getGameDevByID["id"]; ?>">
        </p>
        <p>
            <label for="fname">First Name</label> 
            <input type="text" name="fname" value="<?php echo $getGameDevByID["first_name"]; ?>">
        </p>
        <p>
            <label for="Lname">Last Name</label>
            <input type="text" name="lname" value="<?php echo $getGameDevByID["last_name"]; ?>">
        </p>
        <p>
            <label for="email">Email</label> 
            <input type="text" name="email" value="<?php echo $getGameDevByID["email"]; ?>">
        </p>
        <p>
            <label for="contactNum">Contact No.</label>
            <input type="text" name="contactNum" value="<?php echo $getGameDevByID["contact_num"]; ?>">
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" value="<?php echo $getGameDevByID["gender"]; ?>">
        </p>
        <p>
            <label for="gameEngine">Using game engine</label>
            <input type="text" name="gameEngine" value="<?php echo $getGameDevByID["using_game_engine"]; ?>">
        </p>
        <p>
            <label for="progLang">Known programming language</label>
            <input type="text" name="progLang" value="<?php echo $getGameDevByID["known_prog_lang"]; ?>">
        </p>
        
        <input type="submit" name="editGameDevBtn">
    </form>
</body>
</html>