<?php include 'config.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM books WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE books SET title=?, author=?, published_year=? WHERE id=?");
    $stmt->bind_param("ssii", $title, $author, $year, $id);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Book</title>
<link rel=stylesheet href="style.css">
</head>
<body>
<h2>Edit Book</h2>
<form method="post">
    Title: <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($row['author']) ?>" required><br><br>
    Year: <input type="number" name="year" value="<?= $row['published_year'] ?>" required><br><br>
    <input type="submit" value="Update Book">
</form>
</body>
</html>
