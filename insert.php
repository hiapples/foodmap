<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "howard900";
    $dbname = "mydb";


    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連線
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 創建資料表（如果不存在）
    $sql = "CREATE TABLE IF NOT EXISTS shop_info (
        id INT AUTO_INCREMENT PRIMARY KEY,
        card_title VARCHAR(255) NOT NULL,
        card_1_1 VARCHAR(255),
        card_1_2 VARCHAR(255),
        card_2_1 VARCHAR(255),
        card_2_2 VARCHAR(255),
        card_3_1 VARCHAR(255),
        card_3_2 VARCHAR(255),
        card_4_1 VARCHAR(255),
        card_4_2 VARCHAR(255),
        card_5_1 VARCHAR(255),
        card_5_2 VARCHAR(255),
        card_6_1 VARCHAR(255),
        card_6_2 VARCHAR(255),
        card_7_1 VARCHAR(255),
        card_7_2 VARCHAR(255),
        card_class VARCHAR(255),
        card_address VARCHAR(255),
        card_link VARCHAR(1000),
        card_message TEXT
    )";

    if ($conn->query($sql) === TRUE) {
        // 表创建成功或已存在
    } else {
        die("Error creating table: " . $conn->error);
    }

    // 準備 SQL 語句並綁定參數
    $stmt = $conn->prepare("INSERT INTO shop_info (card_title, card_1_1, card_1_2, card_2_1, card_2_2, card_3_1, card_3_2, card_4_1, card_4_2, card_5_1, card_5_2, card_6_1, card_6_2, card_7_1, card_7_2, card_class, card_address, card_link, card_message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssssssssss", 
        $card_title, $card_1_1, $card_1_2, $card_2_1, $card_2_2, 
        $card_3_1, $card_3_2, $card_4_1, $card_4_2, $card_5_1, 
        $card_5_2, $card_6_1, $card_6_2, $card_7_1, $card_7_2, 
        $card_class, $card_address, $card_link, $card_message
    );

    // 設定參數並執行
    $card_title = $_POST['card-title'];
    $card_1_1 = $_POST['card-1-1'];
    $card_1_2 = $_POST['card-1-2'];
    $card_2_1 = $_POST['card-2-1'];
    $card_2_2 = $_POST['card-2-2'];
    $card_3_1 = $_POST['card-3-1'];
    $card_3_2 = $_POST['card-3-2'];
    $card_4_1 = $_POST['card-4-1'];
    $card_4_2 = $_POST['card-4-2'];
    $card_5_1 = $_POST['card-5-1'];
    $card_5_2 = $_POST['card-5-2'];
    $card_6_1 = $_POST['card-6-1'];
    $card_6_2 = $_POST['card-6-2'];
    $card_7_1 = $_POST['card-7-1'];
    $card_7_2 = $_POST['card-7-2'];
    $card_class = $_POST['card-class'];
    $card_address = $_POST['card-address'];
    $card_link = $_POST['card-link'];
    $card_message = $_POST['card-message'];
    
    // 执行插入操作
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    // 关闭连接
    $stmt->close();
    $conn->close();
?>
