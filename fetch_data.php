<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
// 資料庫設定
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "movie_ticket_system";

// 建立資料庫連接
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}

// 查詢資料
$sql = "SELECT id, T_Adult, T_Stud, T_Early, T_Love FROM tickets";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    // 輸出每行資料
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 結果";
}
$conn->close();

// 輸出 JSON 格式資料
header('Content-type: application/json;');

echo json_encode($data);

