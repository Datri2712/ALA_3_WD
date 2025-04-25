<?php include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, published_year) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $title, $author, $year);
    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Book</title>
<link rel=stylesheet href="style.css">
</head>
<body>
<h2>Add New Book</h2>
<form method="post">
    Title: <input type="text" name="title" required><br><br>
    Author: <input type="text" name="author" required><br><br>
    Year: <input type="number" name="year" required><br><br>
    <input type="submit" value="Add Book">
</form>
</body>
</html>
