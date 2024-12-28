<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "recipe_platform";

$conn = new mysqli($server, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO recipes (title, description, ingredients, image) VALUES ('$title', '$description', '$ingredients', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo '<p style=" font-size: 1.2rem; text-align: center; margin-bottom: 1.5rem;">Recipe added successfully!</p>';
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
    <title>Add Recipe</title>
</head>
<body>
    <header>
        Recipe Book
    </header>
    <main>
        <h2>Add Recipe</h2>
        <form class="form-container" action="add_recipe.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Recipe Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <textarea name="ingredients" placeholder="Ingredients" required></textarea>
            <input type="file" name="image" required>
            <button type="submit">Add Recipe</button>
        </form>
        <a href="index.php" class="btn-back">Back to Home</a> <!-- Button at the bottom -->
    </main>
</body>
</html>
