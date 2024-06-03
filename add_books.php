<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Books</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #009879;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #006f56;
        }
        p {
            text-align: center;
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Add Books</h1>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        
        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" required>
        
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>
        
        <label for="published_year">Published Year:</label>
        <input type="number" id="published_year" name="published_year" required>
        
        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required>
        
        <input type="submit" value="Add Book">
    </form>

    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Read the JSON file
        $json = file_get_contents('./books.json');
        $data = json_decode($json, true);

        // Prepare new book data
        $newBook = [
            'id' => count($data) + 1,  // Generate new ID (assuming IDs are incremental integers)
            'title' => $_POST['title'],
            'author' => $_POST['author'],
            'genre' => $_POST['genre'],
            'year' => $_POST['year'],
            'published_year' => $_POST['published_year'],
            'isbn' => $_POST['isbn']
        ];

        // Add the new book to the data array
        $data[] = $newBook;

        // Encode the updated data back to JSON format
        $updatedJson = json_encode($data, JSON_PRETTY_PRINT);

        // Write the updated JSON back to the file
        file_put_contents('./books.json', $updatedJson);

        // Display success message
        echo '<p>Book added successfully!</p>';
    }
    ?>

</body>
</html>
