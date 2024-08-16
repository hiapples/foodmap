<?php
    $servername = "db"; // 使用 Docker Compose 中的服務名稱
    $username = "mydb"; // 使用 docker-compose.yml 中配置的 MYSQL_USER
    $password = "howard900"; // 使用 docker-compose.yml 中配置的 MYSQL_PASSWORD
    $dbname = "mydb"; // 使用 docker-compose.yml 中配置的 MYSQL_DATABASE


    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);

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