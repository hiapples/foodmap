<?php
    $servername = "sql12.freesqldatabase.com"; 
    $username = "sql12726340"; 
    $password = "NYYVTRlGwk"; 
    $dbname = "sql12726340"; 

    // 建立連線
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 檢查連線
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 檢查 card_title 是否重複
    $card_title = $_POST['card-title'];
    $check_sql = "SELECT id FROM shop_info WHERE card_title = ?";
    $stmt_check = $conn->prepare($check_sql);
    $stmt_check->bind_param("s", $card_title);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'duplicate_title']);
        $stmt_check->close();
        $conn->close();
        exit();
    }

    $stmt_check->close();

    // 創建資料表（如果不存在）
    $sql = "CREATE TABLE IF NOT EXISTS shop_info (
        id INT AUTO_INCREMENT PRIMARY KEY,
        card_title VARCHAR(255) NOT NULL,
        card_1_1 VARCHAR(255),
        card_1_2 VARCHAR(255),
        card_1_3 VARCHAR(255),
        card_1_4 VARCHAR(255),
        card_2_1 VARCHAR(255),
        card_2_2 VARCHAR(255),
        card_2_3 VARCHAR(255),
        card_2_4 VARCHAR(255),
        card_3_1 VARCHAR(255),
        card_3_2 VARCHAR(255),
        card_3_3 VARCHAR(255),
        card_3_4 VARCHAR(255),
        card_4_1 VARCHAR(255),
        card_4_2 VARCHAR(255),
        card_4_3 VARCHAR(255),
        card_4_4 VARCHAR(255),
        card_5_1 VARCHAR(255),
        card_5_2 VARCHAR(255),
        card_5_3 VARCHAR(255),
        card_5_4 VARCHAR(255),
        card_6_1 VARCHAR(255),
        card_6_2 VARCHAR(255),
        card_6_3 VARCHAR(255),
        card_6_4 VARCHAR(255),
        card_7_1 VARCHAR(255),
        card_7_2 VARCHAR(255),
        card_7_3 VARCHAR(255),
        card_7_4 VARCHAR(255),
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
    $stmt = $conn->prepare("INSERT INTO shop_info (
        card_title, 
        card_1_1, card_1_2, card_1_3, card_1_4,
        card_2_1, card_2_2, card_2_3, card_2_4,
        card_3_1, card_3_2, card_3_3, card_3_4,
        card_4_1, card_4_2, card_4_3, card_4_4,
        card_5_1, card_5_2, card_5_3, card_5_4,
        card_6_1, card_6_2, card_6_3, card_6_4,
        card_7_1, card_7_2, card_7_3, card_7_4,
        card_class, 
        card_address, 
        card_link, 
        card_message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssssssssssssssssssssssss", 
        $card_title, 
        $card_1_1, $card_1_2, $card_1_3, $card_1_4,
        $card_2_1, $card_2_2, $card_2_3, $card_2_4,
        $card_3_1, $card_3_2, $card_3_3, $card_3_4,
        $card_4_1, $card_4_2, $card_4_3, $card_4_4,
        $card_5_1, $card_5_2, $card_5_3, $card_5_4,
        $card_6_1, $card_6_2, $card_6_3, $card_6_4,
        $card_7_1, $card_7_2, $card_7_3, $card_7_4,
        $card_class, 
        $card_address, 
        $card_link, 
        $card_message
    );

    // 設定參數並執行
    $card_title = $_POST['card-title'];
    $card_1_1 = $_POST['card-1-1'];
    $card_1_2 = $_POST['card-1-2'];
    $card_1_3 = $_POST['card-1-3'];
    $card_1_4 = $_POST['card-1-4'];

    $card_2_1 = $_POST['card-2-1'];
    $card_2_2 = $_POST['card-2-2'];
    $card_2_3 = $_POST['card-2-3'];
    $card_2_4 = $_POST['card-2-4'];

    $card_3_1 = $_POST['card-3-1'];
    $card_3_2 = $_POST['card-3-2'];
    $card_3_3 = $_POST['card-3-3'];
    $card_3_4 = $_POST['card-3-4'];

    $card_4_1 = $_POST['card-4-1'];
    $card_4_2 = $_POST['card-4-2'];
    $card_4_3 = $_POST['card-4-3'];
    $card_4_4 = $_POST['card-4-4'];

    $card_5_1 = $_POST['card-5-1'];
    $card_5_2 = $_POST['card-5-2'];   
    $card_5_3 = $_POST['card-5-3'];
    $card_5_4 = $_POST['card-5-4'];

    $card_6_1 = $_POST['card-6-1'];
    $card_6_2 = $_POST['card-6-2'];
    $card_6_3 = $_POST['card-6-3'];
    $card_6_4 = $_POST['card-6-4'];

    $card_7_1 = $_POST['card-7-1'];
    $card_7_2 = $_POST['card-7-2'];
    $card_7_3 = $_POST['card-7-3'];
    $card_7_4 = $_POST['card-7-4'];

    $card_class = $_POST['card-class'];
    $card_address = $_POST['card-address'];
    $card_link = $_POST['card-link'];
    $card_message = $_POST['card-message'];

    // 执行插入操作
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $stmt->error]);
    }

    // 关闭连接
    $stmt->close();
    $conn->close();
?>
