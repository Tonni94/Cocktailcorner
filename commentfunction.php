<?php

// Function to establish a database connection
function db_connect() {
    $conn = mysqli_connect('localhost', 'root', '', 'tipsybartender');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

// Function to insert a comment into the database
function insert_comment($user_id, $comment, $page_identifier) {
    $conn = db_connect(); // Establish the database connection

    $sql = "INSERT INTO comments (user_id, comment_text, page_identifier) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $user_id, $comment, $page_identifier);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

// Function to fetch comments from the database
function get_comments($page_identifier) {
    $conn = db_connect(); // Establish the database connection

    $sql = "SELECT c.comment_text, c.created_at, u.name AS username, u.profile_image 
    FROM comments c 
    JOIN user u ON c.user_id = u.user_id 
    WHERE c.page_identifier = ? 
    ORDER BY c.created_at DESC";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $page_identifier);
    
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $result;
    } else {
        // Handle SQL execution error
        echo "Error executing SQL query: " . mysqli_error($conn);
    }
}
?>
