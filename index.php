<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=11, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_index.css">
    <title>Registration Form</title>

</head>
<body>
    <h3>Welcome to the Game Developer Management System. Input your details to register</h3>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="fname">First Name</label> 
            <input type="text" name="fname" placeholder="Type Here...">
        </p>
        <p>
            <label for="Lname">Last Name</label>
            <input type="text" name="lname" placeholder="Type Here...">
        </p>
        <p>
            <label for="email">Email</label> 
            <input type="text" name="email" placeholder="Type Here...">
        </p>
        <p>
            <label for="contactNum">Contact No.</label>
            <input type="text" name="contactNum" placeholder="Type Here...">
        </p>
        <p>
            <label for="gender">Gender</label>
            <input type="text" name="gender" placeholder="Type Here...">
        </p>
        <p>
            <label for="gameEngine">Using game engine</label>
            <input type="text" name="gameEngine" placeholder="Type Here...">
        </p>
        <p>
            <label for="progLang">Known programming language</label>
            <input type="text" name="progLang" placeholder="Type Here...">
        </p>
        <input type="submit" name="insertNewGameDevBtn">
    </form>
    <hr>

    <!--<a href="testGetVariable.php?gameDevName=Angelo&usingGameEngine=RPGMaker">Test Get Superglobal</a>-->
    <table style="width:75%; margin-top: 50px;">
        <tr>
            <th>Game Dev ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Contact No.</th>
            <th>Gender</th>
            <th>Using Game Engine</th>
            <th>Known Programming Language</th>
            <th>Action</th>
        </tr>

        <?php $seeAllGameDevRecords = seeAllGameDevRecords($pdo); ?>
        <?php foreach ($seeAllGameDevRecords as $row) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["contact_num"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["using_game_engine"]; ?></td>
                <td><?php echo $row["known_prog_lang"]; ?></td>
                <td>
                    <a href="viewprojects.php?game_dev_id=<?php echo $row['id']; ?>">View Projects</a>
                    <a href="editGameDev.php?id=<?php echo $row['id'];?>">Edit</a>
                    <a href="deleteGameDev.php?id=<?php echo $row['id'];?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>