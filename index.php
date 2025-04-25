<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Book List</title>
    <link rel=stylesheet href="style.css">
</head>
<body>
    <h2>Book List</h2>
    <a href="add.php">Add New Book</a>
    <br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>Title</th><th>Author</th><th>Year</th><th>Actions</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM books");
        while($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['title']) ?></td>
            <td><?= htmlspecialchars($row['author']) ?></td>
            <td><?= htmlspecialchars($row['published_year']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
