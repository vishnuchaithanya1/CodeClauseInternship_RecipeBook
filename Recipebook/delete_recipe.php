<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "recipe_platform";

$conn = new mysqli($server, $username, $password, $database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM recipes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view_recipes.php?deleted=true"); // Redirect to view_recipes.php with a success message
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>

