<?php
require_once "core/dbConfig.php";
require_once "core/models.php";

if (isset($_GET['game_dev_id'])) {
    $game_dev_id = $_GET['game_dev_id'];
} else {
    die("Game Developer ID is missing.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_viewproject.css">
    <title>Projects</title>
</head>
<body>
    <form action="core/handleForms.php?game_dev_id=<?php echo $game_dev_id; ?>" method="POST">
        <p>
            <label for="projectName">Project Name</label>
            <input type="text" name="projectName" required>
        </p>
        <p>
            <label for="dateStarted">Date Started</label>
            <input type="text" name="dateStarted" required>
        </p>
        <p>
            <label for="dateFinished">Date Finished</label>
            <input type="text" name="dateFinished">
            <input type="submit" name="insertNewProjectBtn">
        </p>
    </form>

    <table style="width:100%; margin-top: 50px;">
        <tr>
            <th>Project ID</th>
            <th>Game Dev ID</th>
            <th>Project Name</th>
            <th>Date Started</th>
            <th>Date Finished</th>
        </tr>
        <?php
        $getProjectByGameDev = getProjectByGameDev($pdo, $game_dev_id);
        if (empty($getProjectByGameDev)) {
            echo "<tr><td colspan='5'>No projects found for this developer.</td></tr>";
        } else {
            foreach ($getProjectByGameDev as $row) { ?>
                <tr>
                    <td><?php echo $row["project_id"]; ?></td>
                    <td><?php echo $row["project_dev"]; ?></td>
                    <td><?php echo $row["project_name"]; ?></td>
                    <td><?php echo $row["date_started"]; ?></td>
                    <td><?php echo $row["date_finished"]; ?></td>
                    <td>
                        <a href="editProject.php?project_id=<?php echo $row['project_id']; ?>&game_dev_id=<?php echo $game_dev_id; ?>">Edit</a>
                        <a href="deleteProject.php?project_id=<?php echo $row['project_id']; ?>&game_dev_id=<?php echo $game_dev_id; ?>">Delete</a>
                    </td>
                </tr>
            <?php }
        }
        ?>
    </table>
</body>
</html>
