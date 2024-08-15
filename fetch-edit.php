<?php
    $servername = "localhost";
    $username = "root";
    $password = "howard900";
    $dbname = "mydb";

    // 创建连接
    $conn = new mysqli($servername, $username, $password);

    // 检查连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 从 POST 请求中获取 ID
    $id = isset($_POST['edit_id']) ? intval($_POST['edit_id']) : 0;

    // 准备 SQL 查询
    $sql = "SELECT * FROM shop_info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row; // 将每一行数据存入数组
        }
    }

    // 以 JSON 格式输出数据
    header('Content-Type: application/json');
    echo json_encode($data);

    // 关闭连接
    $stmt->close();
    $conn->close();
?>
