<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "recipe_platform";

$conn = new mysqli($server, $username, $password, $database);

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM recipes WHERE id = $id");
$recipe = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];

    $updateSql = "UPDATE recipes SET title = '$title', description = '$description', ingredients = '$ingredients'";

    if ($_FILES['image']['tmp_name']) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $updateSql .= ", image = '$image'";
    }

    $updateSql .= " WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo '<p style=" font-size: 1.2rem; text-align: center; margin-bottom: 1.5rem;">Recipe updated successfully!</p>';
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Edit Recipe</title>
</head>
<body>
    <header>Recipe Book</header>
    <main>
        <h2>Edit Recipe</h2>
        <form class="form-container" action="edit_recipe.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" value="<?php echo $recipe['title']; ?>" required>
            <textarea name="description" required><?php echo $recipe['description']; ?></textarea>
            <textarea name="ingredients" required><?php echo $recipe['ingredients']; ?></textarea>
            <input type="file" name="image">
            <button type="submit">Update Recipe</button>
        </form>
        <a href="index.php" class="btn-back">Back to Home</a> <!-- Button at the bottom -->
    </main>
</body>
</html>

