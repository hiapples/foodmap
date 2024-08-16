<?php
    $servername = "db"; // 使用 Docker Compose 中的服務名稱
    $username = "mydb"; // 使用 docker-compose.yml 中配置的 MYSQL_USER
    $password = "howard900"; // 使用 docker-compose.yml 中配置的 MYSQL_PASSWORD
    $dbname = "mydb"; // 使用 docker-compose.yml 中配置的 MYSQL_DATABASE



    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連線
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 从 POST 请求中获取 ID
    $id = isset($_POST['delete_id']) ? intval($_POST['delete_id']) : 0;

    if ($id > 0) {
        // 准备 SQL 删除语句
        $sql = "DELETE FROM shop_info WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);

        // 执行 SQL 删除语句
        if ($stmt->execute()) {
            // 删除成功后重定向到 all.php
            header("Location: all.php");
            exit(); // 确保脚本在重定向后停止执行
        } else {
            // 处理删除失败的情况（例如返回错误信息）
            echo "删除失败，请重试。";
        }

        // 关闭语句
        $stmt->close();
    } else {
        echo "无效的 ID";
    }

    // 关闭数据库连接
    $conn->close();
?>
