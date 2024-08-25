<?php
    $servername = "sql12.freesqldatabase.com"; 
    $username = "sql12727390"; 
    $password = "VUTkBwMGu3"; 
    $dbname = "sql12727390"; 

    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL 查询
    $sql = "SELECT * FROM shop_info ORDER BY id DESC";
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
