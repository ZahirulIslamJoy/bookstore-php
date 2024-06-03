<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
        }
        th {
            background-color: #009879;
            color: #ffffff;
            font-weight: bold;
        }
        tr {
            border-bottom: 1px solid #dddddd;
        }
        tr:nth-child(even) {
            background-color: #f3f3f3;
        }
        tr:nth-child(odd) {
            background-color: #e9f7f6;
        }
        tr:hover {
            background-color: #d1e7e2;
        }
        .edit-btn, .delete-btn {
            padding: 5px 10px;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
            transition: background-color 0.3s;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .edit-btn:hover, .delete-btn:hover {
            background-color: #006f56;
        }
        .delete-btn:hover {
            background-color: #d32f2f;
        }
        .add-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #009879;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .add-btn:hover {
            background-color: #006f56;
        }
    </style>
</head>
<body>
    <h1>Books Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Published Year</th>
                <th>ISBN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Read the JSON file
            $json = file_get_contents('./books.json');
            $data = json_decode($json, true);

            // Display each book in a table row
            foreach ($data as $book) {
                echo "<tr>";
                echo "<td>{$book['id']}</td>";
                echo "<td>{$book['title']}</td>";
                echo "<td>{$book['author']}</td>";
                echo "<td>{$book['genre']}</td>";
                echo "<td>{$book['year']}</td>";
                echo "<td>{$book['published_year']}</td>";
                echo "<td>{$book['isbn']}</td>";
                echo "<td>
                <button class='edit-btn'>Edit</button>
                <a href='delete_books.php?id={$book['id']}' class='delete-btn'>Delete</a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="add_books.php" class="add-btn">Add Books</a>
</body>
</html>
