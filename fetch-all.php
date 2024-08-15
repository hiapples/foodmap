<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "howard900";
    $dbname = "mydb";
    $port = "3311";

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // 检查连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL 查询
    $sql = "SELECT * FROM shop_info";
    $result = $conn->query($sql);
    
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
    $conn->close();
?>