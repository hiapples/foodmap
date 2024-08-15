<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "howard900";
    $dbname = "mydb";


    // 创建连接
    $conn = new mysqli($servername, $username, $password, $dbname);

    // 检查连接
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // 确保传入的 ID 存在
    if (!isset($_POST['edit_id']) || empty($_POST['edit_id'])) {
        die("ID is required for update.");
    }

    // 获取 ID 和其他 POST 数据
    $id = intval($_POST['edit_id']);
    $card_title = $_POST['card-title'] ?? '';
    $card_1_1 = $_POST['card-1-1'] ?? '';
    $card_1_2 = $_POST['card-1-2'] ?? '';
    $card_2_1 = $_POST['card-2-1'] ?? '';
    $card_2_2 = $_POST['card-2-2'] ?? '';
    $card_3_1 = $_POST['card-3-1'] ?? '';
    $card_3_2 = $_POST['card-3-2'] ?? '';
    $card_4_1 = $_POST['card-4-1'] ?? '';
    $card_4_2 = $_POST['card-4-2'] ?? '';
    $card_5_1 = $_POST['card-5-1'] ?? '';
    $card_5_2 = $_POST['card-5-2'] ?? '';
    $card_6_1 = $_POST['card-6-1'] ?? '';
    $card_6_2 = $_POST['card-6-2'] ?? '';
    $card_7_1 = $_POST['card-7-1'] ?? '';
    $card_7_2 = $_POST['card-7-2'] ?? '';
    $card_class = $_POST['card-class'] ?? '';
    $card_address = $_POST['card-address'] ?? '';
    $card_link = $_POST['card-link'] ?? '';
    $card_message = $_POST['card-message'] ?? '';

    // 准备 SQL 更新语句
    $stmt = $conn->prepare("UPDATE shop_info SET 
        card_title = ?, card_1_1 = ?, card_1_2 = ?, card_2_1 = ?, card_2_2 = ?, 
        card_3_1 = ?, card_3_2 = ?, card_4_1 = ?, card_4_2 = ?, card_5_1 = ?, 
        card_5_2 = ?, card_6_1 = ?, card_6_2 = ?, card_7_1 = ?, card_7_2 = ?, 
        card_class = ?, card_address = ?, card_link = ?, card_message = ? 
        WHERE id = ?");

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // 绑定参数并执行
    $stmt->bind_param("sssssssssssssssssssi", 
        $card_title, $card_1_1, $card_1_2, $card_2_1, $card_2_2, 
        $card_3_1, $card_3_2, $card_4_1, $card_4_2, $card_5_1, 
        $card_5_2, $card_6_1, $card_6_2, $card_7_1, $card_7_2, 
        $card_class, $card_address, $card_link, $card_message, $id
    );

    // 执行更新操作
    if ($stmt->execute()) {
        // 更新成功后重定向到 all.php
        header("Location: all.php");
        exit(); // 确保脚本在重定向后停止执行
    } else {
        // 输出错误信息以帮助调试
        echo json_encode(['success' => false, 'message' => $stmt->error]);
    }

    // 关闭连接
    $stmt->close();
    $conn->close();
?>
