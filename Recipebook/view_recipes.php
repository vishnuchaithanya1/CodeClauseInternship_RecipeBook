<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "recipe_platform";

$conn = new mysqli($server, $username, $password, $database);

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Recipes</title>
</head>
<body>
    <header>Recipe Book</header>
    <main>
        <h2>Recipes</h2>
        <?php
        if (isset($_GET['deleted']) && $_GET['deleted'] == 'true') {
            echo '<p style="color: green; font-size: 1.2rem; text-align: center; margin-bottom: 1.5rem;">Recipe deleted successfully!</p>';
        }
        ?>
        <div class="recipes-container">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<div class='recipe-card'>";
                echo "<img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . $row['title'] . "'>";
                echo "<h3>" . $row['title'] . "</h3>";
                echo "<p>" . $row['description'] . "</p>";
                echo "<button onclick=\"window.location.href='edit_recipe.php?id=" . $row['id'] . "'\">Edit</button>";
                echo "<button onclick=\"window.location.href='delete_recipe.php?id=" . $row['id'] . "'\">Delete</button>";
                echo "</div>";
            }
            ?>
        </div>
        <a href="index.php" class="btn-back">Back to Home</a> <!-- Button at the bottom -->
    </main>
</body>
</html>

