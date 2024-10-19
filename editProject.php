<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_edit.css">
    <title>Edit Projects</title>
</head>
<body>
    <a href="viewprojects.php?game_dev_id=<?php echo $_GET['game_dev_id']; ?>">View the Projects</a>
    <h1>Edit Projects</h1>
    <?php $getProjectByID = getProjectByID($pdo, $_GET["project_id"]); ?>
    <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&game_dev_id=<?php echo $_GET['game_dev_id']; ?>" method="POST">
        <p>
            <label for="fname">Project Name</label>
            <input type="text" name="projectName" value="<?php echo $getProjectByID['project_name']; ?> ">
        </p>
        <p>
            <label for="fname">Date Started</label>
            <input type="text" name="dateStarted" value="<?php echo $getProjectByID["date_started"]; ?>">
        </p>
        <p>
            <label for="fname">Date Finished</label>
            <input type="text" name="dateFinished" value="<?php echo $getProjectByID["date_finished"]; ?>">
            <input type="submit" name="editProjectBtn">
        </p>
    </form>
</body>
</html>