<?php
if (isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $json = file_get_contents('./books.json');
    $data = json_decode($json, true);

    foreach ($data as $key => $book) {
        if ($book['id'] == $bookId) {
            unset($data[$key]);
            break;
        }
    }

    file_put_contents('./books.json', json_encode(array_values($data), JSON_PRETTY_PRINT));
    header("Location: test.php");
    exit;
} else {
    echo "Invalid ID!";
    exit;
}
