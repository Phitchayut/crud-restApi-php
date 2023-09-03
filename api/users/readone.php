<?php
header("Access-Control-Allow-Origin: *");
header("Content-type: application/json; charset=utf-8");
require_once '../db.php';
try {
    $stmt = $conn->prepare("SELECT * FROM user where id = ?");
    $stmt->execute([$_GET['id']]);
    foreach ($stmt as $row) {
        $user = array(
            'id' => $row['id'],
            'fname' => $row['fname'],
            'lname' => $row['lname'],
            'email' => $row['email'],
            'avatar' => $row['avatar'],
        );
        echo json_encode($user);
        break;
    }
    $conn = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
<?php
