<?php require_once "core/dbConfig.php"; ?>
<?php require_once "core/models.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_delete.css">
    <title>Delete A Project</title>
</head>
<body>
    <?php $getProjectByID = getProjectByID($pdo, $_GET["project_id"]); ?>
    <h1>Are you sure you want to delete this project?</h1>
    <div class="container" style="border-style: solid; height: 400px;">
        <h2>Project Name: <?php echo $getProjectByID["project_name"]?></h2>
        <h2>Project Dev: <?php echo $getProjectByID["project_dev"]?></h2>
        <h2>Date Started: <?php echo $getProjectByID["date_started"]?></h2>
        <h2>Date Finished: <?php echo $getProjectByID["date_finished"]?></h2>

        <div class="deleteBtn" style="float: right; margin-right: 10px;">
            <form action="core/handleForms.php?project_id=<?php echo $_GET['project_id']; ?>&game_dev_id=<?php echo $_GET['game_dev_id']; ?>" method="POST">
                <input type="submit" name="deleteProjectBtn" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>