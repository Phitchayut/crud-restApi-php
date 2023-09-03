<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
require_once '../db.php';
try {
    $users = array();
    foreach ($conn->query('SELECT * FROM user') as $row) {
        array_push($users, array(
            'id' => $row['id'],
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'email' => $row['email'],
            'avatar' => $row['avatar'],
        )
        );
    }
    echo json_encode($users);
    $conn = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<?php
