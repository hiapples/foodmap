<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodmap</title>
    <link rel="icon" href="static/hamburger.png" type="image/x-icon" />
    <link rel='apple-touch-icon' href='static/hamburger.png'>
    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="static/style.css">
    
</head>
<body class='scroll'>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar_color">
        <div class="container-fluid">
            <a class="navbar-brand" href="all.php">
                <!-- (img)https://logo.com/dashboard -->
                <img src="static/foodmap.png"  width="170" height="60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ml-lg-3 mr-2">
                        <a class="nav-link active" aria-current="page" href="index.php">首頁</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="all.php">總覽</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="map.php">美食地圖</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="nav-link" href="dev.php">開發人員工具</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            聯絡我 
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="https://github.com/hiapples">Github</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="ml-auto inputsearch-top">
                    <input class="form-control" id="inputsearch-top" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                </div>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container noscroll mt-3 mb-5">
        <div class="dropdown d-flex mt-2 mb-2 justify-content-between align-items-center">
            <div class="small-title" id="small-title-time">
                排序:&emsp;營業時間
            </div>
            <div class="small-title" id="small-title-insert">
                排序:&emsp;新增日期
            </div>
            <div class="small-title" id="small-title-search">
                排序:&emsp;搜尋
            </div>
            <div class="d-flex ml-auto" >
                <div class=" inputsearch-down">
                    <input class="form-control" id="inputsearch-down" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                </div>
            </div>
            <button class="btn btn-secondary dropdown-toggle ml-auto" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                篩選
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#" onclick="all1();">營業時間</a></li>
                <li><a class="dropdown-item" href="#" onclick="all2();">新增日期</a></li>
            </ul>
        </div>
        <div>
            <div class="row form1-all " id="form1-all">

            </div>
            <div class="row form2-search " id="form2-search">

            </div>
        </div>

    </div>
    <!-- 刪除確認Modal -->
    <div class="modal fade" id="exampleModal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="margin-top:100px" >
            <div class="modal-content exampleModal_edit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">確定刪除嗎?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                    <form action="delete.php" method="POST">
                        <input name="delete_id"value="" id="delete_id" type="hidden"/>
                        <button type="submit" class="btn btn-danger" >刪除</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
      <!-- 編輯Modal -->
      <div class="modal fade" id="exampleModal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="margin-top:10px">
            <div class="modal-content exampleModal_edit">
                <div class="modal-body">
                    <form action="update.php" method="post" id="shop-form">
                        <div class="d-flex align-items-center">
                            <div style="white-space: nowrap; margin-right: 10px;">店名:</div>
                            <input class="form-control input-form-control"  id="card-title" style="background-color:#121b10" type="text" name="card-title" value="" required autocomplete="off" />
                        </div>
                        <p class="card-text" style="white-space: pre-line;"><span>
                                <div class="d-flex justify-content-around">週一&ensp;<input class="form-control input-form-control" id="card-1-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-1" autocomplete="off" />:<input class="form-control input-form-control" id="card-1-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-1-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-1-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-4" autocomplete="off" /> </div>
                                <div class="d-flex justify-content-around mt-1">週二&ensp;<input class="form-control input-form-control" id="card-2-1"value=""style="background-color:#121b10;width:20%;" type="text" name="card-2-1" autocomplete="off" />:<input class="form-control input-form-control" id="card-2-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-2-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-2-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-2-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-2-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-2-4" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">週三&ensp;<input class="form-control input-form-control" id="card-3-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-3-1" autocomplete="off" />:<input class="form-control input-form-control" id="card-3-2" value=""style="background-color:#121b10;width:20%;" type="text" name="card-3-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-3-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-3-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-3-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-3-4" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">週四&ensp;<input class="form-control input-form-control" id="card-4-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-4-1" autocomplete="off" />:<input class="form-control input-form-control" id="card-4-2" value=""style="background-color:#121b10;width:20%;" type="text" name="card-4-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-4-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-4-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-4-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-4-4" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">週五&ensp;<input class="form-control input-form-control" id="card-5-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-1" autocomplete="off" />:<input class="form-control input-form-control"id="card-5-2" value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-5-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-5-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-4" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">週六&ensp;<input class="form-control input-form-control" id="card-6-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-1" autocomplete="off" />:<input class="form-control input-form-control"id="card-6-2" value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-6-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-6-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-4" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">週日&ensp;<input class="form-control input-form-control" id="card-7-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-1" autocomplete="off" />:<input class="form-control input-form-control"id="card-7-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-2" autocomplete="off" />&ensp;<input class="form-control input-form-control" id="card-7-3"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-3" autocomplete="off" />:<input class="form-control input-form-control" id="card-7-4"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-4" autocomplete="off" /></div>
                            </span>
                            <div class="d-flex align-items-center mt-2">
                                <div style="white-space: nowrap; margin-right: 10px;">類別:</div>
                                <input class="form-control input-form-control" id="card-class"value="" style="background-color:#121b10;" type="text" name="card-class" required autocomplete="off" />
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <div style="white-space: nowrap; margin-right: 10px;">地址:</div>
                                <input class="form-control input-form-control" id="card-address"value="" style="background-color:#121b10;" type="text" name="card-address" required autocomplete="off" />
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <div style="white-space: nowrap; margin-right: 10px;">連結:</div>
                                <input class="form-control input-form-control"id="card-link"value="" style="background-color:#121b10;" type="text" name="card-link" required autocomplete="off" />
                            </div>
                            <div class="d-flex align-items-center mt-2">
                                <div style="white-space: nowrap; margin-right: 10px;">備註:</div>
                                <textarea class="form-control input-form-control" id="card-message"value="" style="background-color:#121b10;" name="card-message"  rows="2" autocomplete="off" ></textarea>
                            </div>                    
                        </p>
                        <div class="d-flex justify-content-end">
                            <input name="edit_id"value="" id="edit_id" type="hidden"/>
                            <button  type="button"class="btn btn-secondary mr-2"  data-bs-dismiss="modal">取消</button>
                            <button class="btn btn-primary  ">修改</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container footer_container">
            <div class="row">
                <div class="col-12 col-sm-6 mt-5">
                    <div class="footer_title">Contact us & </div>
                    <div class="footer_title">have a nice day!</div>
                </div>
                <div class="col-12 col-sm-6 mt-5">
                    <form action="/contact" method="POST">  
                    <div>
                        <label class="font-weight" for="nickname">*&ensp;Nickname</label>
                        <input type="text" name="nickname" class="form-control"  id="nickname"required>      
                    </div>
                    <div>
                        <label for="email" class="font-weight mt-3">*&ensp;Email</label>
                        <input type="email" name="email" class="form-control" id="email"required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="font-weight mt-3">*&ensp;Leave us a message...</label>
                        <textarea class="form-control"  name="message"id="message" required rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn2 mt-3 mb-5"> 
                        <span>submit</span>
                    </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center footer_bottom">
            <div style="color: #FFFFFF;">Powered and secured by PoPalz.</div>
        </div>
    </footer>
    <!--back-->
    <a href="#" class="toTop" > ↑ </a>
    <script>
        //矛點
        document.querySelector('.toTop').addEventListener('click', function(event) {
            event.preventDefault(); // 防止默認行為
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // 平滑滾動
            });
        });
        //F5最上面
        if ('scrollRestoration' in history) {
            history.scrollRestoration = 'manual';
        }
        window.addEventListener('load', function() {
            window.scrollTo(0, 0); // 滾動到頁面頂部
        });
        //判斷是否營業
        function isOpen(item) {
            const now = new Date();
            const currentHour = now.getHours();
            const currentMinute = now.getMinutes();
            const currentTimeInMinutes = currentHour * 60 + currentMinute;
            const dayOfWeek = now.getDay(); // 0 是星期日, 1 是星期一, 以此类推

            // 获取当天和前一天的营业时间段
            let timeSlotsToday = getTimeSlotsForDay(dayOfWeek, item);
            let timeSlotsYesterday = getTimeSlotsForDay(dayOfWeek === 0 ? 6 : dayOfWeek - 1, item);

            // 检查当天的营业时间
            if (isTimeInSlots(currentTimeInMinutes, timeSlotsToday)) {
                return true;
            }

            // 如果当前时间在凌晨（例如00:00到04:00），检查前一天的跨夜时间段
            if (currentHour < 4 ) {
                if (isTimeInSlots(currentTimeInMinutes + 24 * 60, timeSlotsYesterday)) {
                    return true;
                }
            }

            return false;
        }
        function isTimeInSlots(currentTimeInMinutes, timeSlots) {
            for (const slot of timeSlots) {
                if (!slot.start || !slot.end) continue;

                const [startHour, startMinute] = slot.start.split(':').map(Number);
                let [endHour, endMinute] = slot.end.split(':').map(Number);

                // Handle 24-hour business case (00:00 ~ 00:00)
                if (slot.start === "00:00" && slot.end === "00:00") {
                    return true;
                }

                const startTimeInMinutes = startHour * 60 + startMinute;
                let endTimeInMinutes = endHour * 60 + endMinute;

                // 处理跨夜时间段
                if (endTimeInMinutes < startTimeInMinutes) {
                    endTimeInMinutes += 24 * 60; // 将跨夜结束时间增加一天的分钟数
                }

                if (currentTimeInMinutes >= startTimeInMinutes && currentTimeInMinutes < endTimeInMinutes) {
                    return true;
                }
            }
            return false;
        }
        function getTimeSlotsForDay(dayOfWeek, item) {
            switch(dayOfWeek) {
                case 0: // 星期日
                    return [
                        { start: item.card_7_1, end: item.card_7_2 },
                        { start: item.card_7_3, end: item.card_7_4 }
                    ];
                case 1: // 星期一
                    return [
                        { start: item.card_1_1, end: item.card_1_2 },
                        { start: item.card_1_3, end: item.card_1_4 }
                    ];
                case 2: // 星期二
                    return [
                        { start: item.card_2_1, end: item.card_2_2 },
                        { start: item.card_2_3, end: item.card_2_4 }
                    ];
                case 3: // 星期三
                    return [
                        { start: item.card_3_1, end: item.card_3_2 },
                        { start: item.card_3_3, end: item.card_3_4 }
                    ];
                case 4: // 星期四
                    return [
                        { start: item.card_4_1, end: item.card_4_2 },
                        { start: item.card_4_3, end: item.card_4_4 }
                    ];
                case 5: // 星期五
                    return [
                        { start: item.card_5_1, end: item.card_5_2 },
                        { start: item.card_5_3, end: item.card_5_4 }
                    ];
                case 6: // 星期六
                    return [
                        { start: item.card_6_1, end: item.card_6_2 },
                        { start: item.card_6_3, end: item.card_6_4 }
                    ];
                default:
                    return [];
            }
        }    
        //判斷公開頁面
        const inputsearch_top=document.getElementById("inputsearch-top")
        const inputsearch_down=document.getElementById("inputsearch-down")
        const form1_all = document.getElementById("form1-all");
        const form2_search = document.getElementById("form2-search");
        if (localStorage.getItem('all') == "2"){
            all2();
        }else{
            all1();
        }
        inputsearch_top.addEventListener("input", toggleForms);
        inputsearch_down.addEventListener("input", toggleForms);
        function toggleForms(event) {
            small_title_time=document.getElementById("small-title-time")
            small_title_insert=document.getElementById("small-title-insert")
            small_title_search=document.getElementById("small-title-search")
            const inputElement = event.target;
            if (inputElement.value == "") {
                form1_all.style.display = "flex";
                form2_search.style.display = "none";
                small_title_search.style.display="none"
                if(localStorage.getItem('all') == "2"){
                    small_title_insert.style.display="block"
                    small_title_time.style.display="none"
                }else{
                    small_title_insert.style.display="none"
                    small_title_time.style.display="block"
                }
            } else {
                form1_all.style.display = "none";
                form2_search.style.display = "flex";
                small_title_time.style.display="none"
                small_title_insert.style.display="none"
                small_title_search.style.display="block"
                //搜尋
                fetch('fetch-all.php')
                .then(response => response.json()) // 处理JSON数据
                .then(data => {
                    const searchValue = inputElement.value.toLowerCase();
                    const allHTML = document.getElementById("form2-search");
                    let all = "";
                    const filteredData = data.filter(item => item.card_title.toLowerCase().includes(searchValue));
                    // 先根據是否營業進行排序
                    filteredData.sort((a, b) => {
                        const isOpenA = isOpen(a);
                        const isOpenB = isOpen(b);
                        return isOpenB - isOpenA; // 营业中的排在前面
                    });

                    // 构建HTML内容
                    filteredData.forEach(item => {
                        const id = item.id; // 获取每个项的唯一id
                        const titleId = `card-title-search-${id}`; // 为每个title设置唯一的id

                        all += 
                        "<div class='col-md-4'>"+
                            "<div class='card mt-3'>"+
                                "<div class='card-body'>"+
                                    "<h5 class='card-title' id='" + titleId + "'>" + item.card_title + "</h5>" +
                                    "<div class='card-text'>"+
                                        "<span>"+
                                            // 星期一
                                            "星期一&emsp;" + (item.card_1_1 === "" && item.card_1_2 === "" && item.card_1_3 === "" && item.card_1_4 === "" ? "休假" : (item.card_1_1 === item.card_1_2 && item.card_1_1 !== ""  ? "全天營業" : item.card_1_1 + "<span id='dash-search-"+id+"-1-1' class='dash-search-"+id+"-1-1'>&ensp;–&ensp;</span>" + item.card_1_2 + "&emsp;" + item.card_1_3 + "<span id='dash-search-"+id+"-1-3' class='dash-search-"+id+"-1-3'>&ensp;–&ensp;</span>" + item.card_1_4)) + "<br/>"+
                                            // 星期二
                                            "星期二&emsp;" + (item.card_2_1 === "" && item.card_2_2 === "" && item.card_2_3 === "" && item.card_2_4 === "" ? "休假" : (item.card_2_1 === item.card_2_2 && item.card_2_1 !== ""  ? "全天營業" : item.card_2_1 + "<span id='dash-search-"+id+"-2-1' class='dash-search-"+id+"-2-1'>&ensp;–&ensp;</span>" + item.card_2_2 + "&emsp;" + item.card_2_3 + "<span id='dash-search-"+id+"-2-3' class='dash-search-"+id+"-2-3'>&ensp;–&ensp;</span>" + item.card_2_4)) + "<br/>"+
                                            // 星期三
                                            "星期三&emsp;" + (item.card_3_1 === "" && item.card_3_2 === "" && item.card_3_3 === "" && item.card_3_4 === "" ? "休假" : (item.card_3_1 === item.card_3_2 && item.card_3_1 !== ""  ? "全天營業" : item.card_3_1 + "<span id='dash-search-"+id+"-3-1' class='dash-search-"+id+"-3-1'>&ensp;–&ensp;</span>" + item.card_3_2 + "&emsp;" + item.card_3_3 + "<span id='dash-search-"+id+"-3-3' class='dash-search-"+id+"-3-3'>&ensp;–&ensp;</span>" + item.card_3_4)) + "<br/>"+
                                            // 星期四
                                            "星期四&emsp;" + (item.card_4_1 === "" && item.card_4_2 === "" && item.card_4_3 === "" && item.card_4_4 === "" ? "休假" : (item.card_4_1 === item.card_4_2 && item.card_4_1 !== ""  ? "全天營業" : item.card_4_1 + "<span id='dash-search-"+id+"-4-1' class='dash-search-"+id+"-4-1'>&ensp;–&ensp;</span>" + item.card_4_2 + "&emsp;" + item.card_4_3 + "<span id='dash-search-"+id+"-4-3' class='dash-search-"+id+"-4-3'>&ensp;–&ensp;</span>" + item.card_4_4)) + "<br/>"+
                                            // 星期五
                                            "星期五&emsp;" + (item.card_5_1 === "" && item.card_5_2 === "" && item.card_5_3 === "" && item.card_5_4 === "" ? "休假" : (item.card_5_1 === item.card_5_2 && item.card_5_1 !== ""  ? "全天營業" : item.card_5_1 + "<span id='dash-search-"+id+"-5-1' class='dash-search-"+id+"-5-1'>&ensp;–&ensp;</span>" + item.card_5_2 + "&emsp;" + item.card_5_3 + "<span id='dash-search-"+id+"-5-3' class='dash-search-"+id+"-5-3'>&ensp;–&ensp;</span>" + item.card_5_4)) + "<br/>"+
                                            // 星期六
                                            "星期六&emsp;" + (item.card_6_1 === "" && item.card_6_2 === "" && item.card_6_3 === "" && item.card_6_4 === "" ? "休假" : (item.card_6_1 === item.card_6_2 && item.card_6_1 !== ""  ? "全天營業" : item.card_6_1 + "<span id='dash-search-"+id+"-6-1' class='dash-search-"+id+"-6-1'>&ensp;–&ensp;</span>" + item.card_6_2 + "&emsp;" + item.card_6_3 + "<span id='dash-search-"+id+"-6-3' class='dash-search-"+id+"-6-3'>&ensp;–&ensp;</span>" + item.card_6_4)) + "<br/>"+
                                            // 星期日
                                            "星期日&emsp;" + (item.card_7_1 === "" && item.card_7_2 === "" && item.card_7_3 === "" && item.card_7_4 === "" ? "休假" : (item.card_7_1 === item.card_7_2 && item.card_7_1 !== ""  ? "全天營業" : item.card_7_1 + "<span id='dash-search-"+id+"-7-1' class='dash-search-"+id+"-7-1'>&ensp;–&ensp;</span>" + item.card_7_2 + "&emsp;" + item.card_7_3 + "<span id='dash-search-"+id+"-7-3' class='dash-search-"+id+"-7-3'>&ensp;–&ensp;</span>" + item.card_7_4)) + "<br/>"+
                                        "</span><br/>"+
                                            "類別:&ensp;"+item.card_class+"<br/>"+
                                            "地址:&ensp;<a style='color:gray' href='"+item.card_link+"'>"+item.card_address+"</a><br/>"+
                                            "備註:&ensp;"+item.card_message+
                                    "</div>"+
                                    "<div class='justify-content-end d-flex mt-4'>"+
                                        "<button class='btn btn-secondary mr-2 update_button' onclick='get_edit_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_edit'>編輯</button>"+
                                        "<button class='btn btn-danger btn-delete dismiss_button' onclick='get_delete_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_delete'>刪除</button>"+
                                    "</div>"+
                                "</div>"+
                            "</div>"+
                        "</div>";
                    });

                    allHTML.innerHTML = all;
                    // 更新每个title的颜色
                    filteredData.forEach(item => {
                        const titleElement = document.getElementById(`card-title-search-${item.id}`);
                        if (isOpen(item)) {
                            if (titleElement) {
                                titleElement.style.color = 'green';
                            }
                        } 
                    });
                    // 根据内容更新每个dash的可见性
                    filteredData.forEach(item => {
                        for (let day = 1; day <= 7; day++) {
                            const card_1 = item[`card_${day}_1`];
                            const card_2 = item[`card_${day}_2`];
                            const card_3 = item[`card_${day}_3`];
                            const card_4 = item[`card_${day}_4`];

                            const dashInsert1 = document.querySelector(`#dash-search-${item.id}-${day}-1`);
                            const dashInsert3 = document.querySelector(`#dash-search-${item.id}-${day}-3`);

                            if (dashInsert1) {
                                dashInsert1.style.display = card_1 === "" ? "none" : "inline";
                            }
                            if (dashInsert3) {
                                dashInsert3.style.display = card_3 === "" ? "none" : "inline";
                            } 
                        }
                    });

                    // 更新按钮的可见性
                    const update_buttons = document.querySelectorAll(".update_button");
                    const dismiss_buttons = document.querySelectorAll(".dismiss_button");
                    if (localStorage.getItem('password') == "666") {
                        update_buttons.forEach(button => button.style.display = "block");
                        dismiss_buttons.forEach(button => button.style.display = "block");
                    } 
                })
                .catch(error => console.error(error));
            }
        }
        //抓公開營業時間
        function all1(){
            small_title_time=document.getElementById("small-title-time")
            small_title_insert=document.getElementById("small-title-insert")
            small_title_search=document.getElementById("small-title-search")
            small_title_time.style.display="block"
            small_title_insert.style.display="none"
            small_title_search.style.display="none"
            form1_all.style.display = "flex";
            form2_search.style.display = "none";
            inputsearch_top.value=""
            inputsearch_down.value=""
            localStorage.setItem('all', '1');
            fetch('fetch-all.php')
            .then(response => response.json()) // 处理JSON数据
            .then(data => {
                const allHTML = document.getElementById("form1-all");
                let all = "";
                // 先根據是否營業進行排序
                data.sort((a, b) => {
                    const isOpenA = isOpen(a);
                    const isOpenB = isOpen(b);
                    return isOpenB - isOpenA; // 营业中的排在前面
                });

                // 构建HTML内容
                data.forEach(item => {
                    const id = item.id; // 获取每个项的唯一id
                    const titleId = `card-title-time-${id}`; // 为每个title设置唯一的id

                    all += 
                    "<div class='col-md-4'>"+
                        "<div class='card mt-3'>"+
                            "<div class='card-body'>"+
                                "<h5 class='card-title' id='" + titleId + "'>" + item.card_title + "</h5>" +
                                "<div class='card-text'>"+
                                    "<span>"+
                                        // 星期一
                                        "星期一&emsp;" + (item.card_1_1 === "" && item.card_1_2 === "" && item.card_1_3 === "" && item.card_1_4 === "" ? "休假" : (item.card_1_1 === item.card_1_2 && item.card_1_1 !== ""  ? "全天營業" : item.card_1_1 + "<span id='dash-time-"+id+"-1-1' class='dash-time-"+id+"-1-1'>&ensp;–&ensp;</span>" + item.card_1_2 + "&emsp;" + item.card_1_3 + "<span id='dash-time-"+id+"-1-3' class='dash-time-"+id+"-1-3'>&ensp;–&ensp;</span>" + item.card_1_4)) + "<br/>"+
                                        // 星期二
                                        "星期二&emsp;" + (item.card_2_1 === "" && item.card_2_2 === "" && item.card_2_3 === "" && item.card_2_4 === "" ? "休假" : (item.card_2_1 === item.card_2_2 && item.card_2_1 !== ""  ? "全天營業" : item.card_2_1 + "<span id='dash-time-"+id+"-2-1' class='dash-time-"+id+"-2-1'>&ensp;–&ensp;</span>" + item.card_2_2 + "&emsp;" + item.card_2_3 + "<span id='dash-time-"+id+"-2-3' class='dash-time-"+id+"-2-3'>&ensp;–&ensp;</span>" + item.card_2_4)) + "<br/>"+
                                        // 星期三
                                        "星期三&emsp;" + (item.card_3_1 === "" && item.card_3_2 === "" && item.card_3_3 === "" && item.card_3_4 === "" ? "休假" : (item.card_3_1 === item.card_3_2 && item.card_3_1 !== ""  ? "全天營業" : item.card_3_1 + "<span id='dash-time-"+id+"-3-1' class='dash-time-"+id+"-3-1'>&ensp;–&ensp;</span>" + item.card_3_2 + "&emsp;" + item.card_3_3 + "<span id='dash-time-"+id+"-3-3' class='dash-time-"+id+"-3-3'>&ensp;–&ensp;</span>" + item.card_3_4)) + "<br/>"+
                                        // 星期四
                                        "星期四&emsp;" + (item.card_4_1 === "" && item.card_4_2 === "" && item.card_4_3 === "" && item.card_4_4 === "" ? "休假" : (item.card_4_1 === item.card_4_2 && item.card_4_1 !== ""  ? "全天營業" : item.card_4_1 + "<span id='dash-time-"+id+"-4-1' class='dash-time-"+id+"-4-1'>&ensp;–&ensp;</span>" + item.card_4_2 + "&emsp;" + item.card_4_3 + "<span id='dash-time-"+id+"-4-3' class='dash-time-"+id+"-4-3'>&ensp;–&ensp;</span>" + item.card_4_4)) + "<br/>"+
                                        // 星期五
                                        "星期五&emsp;" + (item.card_5_1 === "" && item.card_5_2 === "" && item.card_5_3 === "" && item.card_5_4 === "" ? "休假" : (item.card_5_1 === item.card_5_2 && item.card_5_1 !== ""  ? "全天營業" : item.card_5_1 + "<span id='dash-time-"+id+"-5-1' class='dash-time-"+id+"-5-1'>&ensp;–&ensp;</span>" + item.card_5_2 + "&emsp;" + item.card_5_3 + "<span id='dash-time-"+id+"-5-3' class='dash-time-"+id+"-5-3'>&ensp;–&ensp;</span>" + item.card_5_4)) + "<br/>"+
                                        // 星期六
                                        "星期六&emsp;" + (item.card_6_1 === "" && item.card_6_2 === "" && item.card_6_3 === "" && item.card_6_4 === "" ? "休假" : (item.card_6_1 === item.card_6_2 && item.card_6_1 !== ""  ? "全天營業" : item.card_6_1 + "<span id='dash-time-"+id+"-6-1' class='dash-time-"+id+"-6-1'>&ensp;–&ensp;</span>" + item.card_6_2 + "&emsp;" + item.card_6_3 + "<span id='dash-time-"+id+"-6-3' class='dash-time-"+id+"-6-3'>&ensp;–&ensp;</span>" + item.card_6_4)) + "<br/>"+
                                        // 星期日
                                        "星期日&emsp;" + (item.card_7_1 === "" && item.card_7_2 === "" && item.card_7_3 === "" && item.card_7_4 === "" ? "休假" : (item.card_7_1 === item.card_7_2 && item.card_7_1 !== ""  ? "全天營業" : item.card_7_1 + "<span id='dash-time-"+id+"-7-1' class='dash-time-"+id+"-7-1'>&ensp;–&ensp;</span>" + item.card_7_2 + "&emsp;" + item.card_7_3 + "<span id='dash-time-"+id+"-7-3' class='dash-time-"+id+"-7-3'>&ensp;–&ensp;</span>" + item.card_7_4)) + "<br/>"+
                                    "</span><br/>"+
                                        "類別:&ensp;"+item.card_class+"<br/>"+
                                        "地址:&ensp;<a style='color:gray' href='"+item.card_link+"'>"+item.card_address+"</a><br/>"+
                                        "備註:&ensp;"+item.card_message+
                                "</div>"+
                                "<div class='justify-content-end d-flex mt-4'>"+
                                    "<button class='btn btn-secondary mr-2 update_button' onclick='get_edit_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_edit'>編輯</button>"+
                                    "<button class='btn btn-danger btn-delete dismiss_button' onclick='get_delete_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_delete'>刪除</button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>";
                });

                allHTML.innerHTML = all;
                // 更新每个title的颜色
                data.forEach(item => {
                    const titleElement = document.getElementById(`card-title-time-${item.id}`);
                    if (isOpen(item)) {
                        if (titleElement) {
                            titleElement.style.color = 'green';
                        }
                    } 
                });
                // 根据内容更新每个dash的可见性
                data.forEach(item => {
                    for (let day = 1; day <= 7; day++) {
                        const card_1 = item[`card_${day}_1`];
                        const card_2 = item[`card_${day}_2`];
                        const card_3 = item[`card_${day}_3`];
                        const card_4 = item[`card_${day}_4`];

                        const dashInsert1 = document.querySelector(`#dash-time-${item.id}-${day}-1`);
                        const dashInsert3 = document.querySelector(`#dash-time-${item.id}-${day}-3`);

                        if (dashInsert1) {
                            dashInsert1.style.display = card_1 === "" ? "none" : "inline";
                        }
                        if (dashInsert3) {
                            dashInsert3.style.display = card_3 === "" ? "none" : "inline";
                        }  
                    }
                });

                // 更新按钮的可见性
                const update_buttons = document.querySelectorAll(".update_button");
                const dismiss_buttons = document.querySelectorAll(".dismiss_button");
                if (localStorage.getItem('password') == "666") {
                    update_buttons.forEach(button => button.style.display = "block");
                    dismiss_buttons.forEach(button => button.style.display = "block");
                } 
                
            })
            .catch(error => console.error(error));
        }   
        
     
        //抓公開新增日期
        function all2(){
            small_title_time=document.getElementById("small-title-time")
            small_title_insert=document.getElementById("small-title-insert")
            small_title_search=document.getElementById("small-title-search")
            small_title_time.style.display="none"
            small_title_insert.style.display="block"
            small_title_search.style.display="none"
            form1_all.style.display = "flex";
            form2_search.style.display = "none";
            inputsearch_top.value=""
            inputsearch_down.value=""
            localStorage.setItem('all', '2');
            fetch('fetch-all.php')
            .then(response => response.json()) // 处理JSON数据
            .then(data => {
                const allHTML = document.getElementById("form1-all");
                let all = "";

                data.forEach(item => {
                    const id = item.id; // 获取每个项的唯一id
                    const titleId = `card-title-insert-${id}`; // 为每个title设置唯一的id
                    // 构建HTML内容
                    all += 
                    "<div class='col-md-4'>"+
                        "<div class='card mt-3'>"+
                            "<div class='card-body'>"+
                                "<h5 class='card-title' id='" + titleId + "'>" + item.card_title + "</h5>" +
                                "<div class='card-text'>"+
                                    "<span>"+
                                        // 星期一
                                        "星期一&emsp;" + (item.card_1_1 === "" && item.card_1_2 === "" && item.card_1_3 === "" && item.card_1_4 === "" ? "休假" : (item.card_1_1 === item.card_1_2 && item.card_1_1 !== ""  ? "全天營業" : item.card_1_1 + "<span id='dash-insert-"+id+"-1-1' class='dash-insert-"+id+"-1-1'>&ensp;–&ensp;</span>" + item.card_1_2 + "&emsp;" + item.card_1_3 + "<span id='dash-insert-"+id+"-1-3' class='dash-insert-"+id+"-1-3'>&ensp;–&ensp;</span>" + item.card_1_4)) + "<br/>"+
                                        // 星期二
                                        "星期二&emsp;" + (item.card_2_1 === "" && item.card_2_2 === "" && item.card_2_3 === "" && item.card_2_4 === "" ? "休假" : (item.card_2_1 === item.card_2_2 && item.card_2_1 !== ""  ? "全天營業" : item.card_2_1 + "<span id='dash-insert-"+id+"-2-1' class='dash-insert-"+id+"-2-1'>&ensp;–&ensp;</span>" + item.card_2_2 + "&emsp;" + item.card_2_3 + "<span id='dash-insert-"+id+"-2-3' class='dash-insert-"+id+"-2-3'>&ensp;–&ensp;</span>" + item.card_2_4)) + "<br/>"+
                                        // 星期三
                                        "星期三&emsp;" + (item.card_3_1 === "" && item.card_3_2 === "" && item.card_3_3 === "" && item.card_3_4 === "" ? "休假" : (item.card_3_1 === item.card_3_2 && item.card_3_1 !== ""  ? "全天營業" : item.card_3_1 + "<span id='dash-insert-"+id+"-3-1' class='dash-insert-"+id+"-3-1'>&ensp;–&ensp;</span>" + item.card_3_2 + "&emsp;" + item.card_3_3 + "<span id='dash-insert-"+id+"-3-3' class='dash-insert-"+id+"-3-3'>&ensp;–&ensp;</span>" + item.card_3_4)) + "<br/>"+
                                        // 星期四
                                        "星期四&emsp;" + (item.card_4_1 === "" && item.card_4_2 === "" && item.card_4_3 === "" && item.card_4_4 === "" ? "休假" : (item.card_4_1 === item.card_4_2 && item.card_4_1 !== ""  ? "全天營業" : item.card_4_1 + "<span id='dash-insert-"+id+"-4-1' class='dash-insert-"+id+"-4-1'>&ensp;–&ensp;</span>" + item.card_4_2 + "&emsp;" + item.card_4_3 + "<span id='dash-insert-"+id+"-4-3' class='dash-insert-"+id+"-4-3'>&ensp;–&ensp;</span>" + item.card_4_4)) + "<br/>"+
                                        // 星期五
                                        "星期五&emsp;" + (item.card_5_1 === "" && item.card_5_2 === "" && item.card_5_3 === "" && item.card_5_4 === "" ? "休假" : (item.card_5_1 === item.card_5_2 && item.card_5_1 !== ""  ? "全天營業" : item.card_5_1 + "<span id='dash-insert-"+id+"-5-1' class='dash-insert-"+id+"-5-1'>&ensp;–&ensp;</span>" + item.card_5_2 + "&emsp;" + item.card_5_3 + "<span id='dash-insert-"+id+"-5-3' class='dash-insert-"+id+"-5-3'>&ensp;–&ensp;</span>" + item.card_5_4)) + "<br/>"+
                                        // 星期六
                                        "星期六&emsp;" + (item.card_6_1 === "" && item.card_6_2 === "" && item.card_6_3 === "" && item.card_6_4 === "" ? "休假" : (item.card_6_1 === item.card_6_2 && item.card_6_1 !== ""  ? "全天營業" : item.card_6_1 + "<span id='dash-insert-"+id+"-6-1' class='dash-insert-"+id+"-6-1'>&ensp;–&ensp;</span>" + item.card_6_2 + "&emsp;" + item.card_6_3 + "<span id='dash-insert-"+id+"-6-3' class='dash-insert-"+id+"-6-3'>&ensp;–&ensp;</span>" + item.card_6_4))+ "<br/>"+
                                        // 星期日
                                        "星期日&emsp;" + (item.card_7_1 === "" && item.card_7_2 === "" && item.card_7_3 === "" && item.card_7_4 === "" ? "休假" : (item.card_7_1 === item.card_7_2 && item.card_7_1 !== ""  ? "全天營業" : item.card_7_1 + "<span id='dash-insert-"+id+"-7-1' class='dash-insert-"+id+"-7-1'>&ensp;–&ensp;</span>" + item.card_7_2 + "&emsp;" + item.card_7_3 + "<span id='dash-insert-"+id+"-7-3' class='dash-insert-"+id+"-7-3'>&ensp;–&ensp;</span>" + item.card_7_4)) + "<br/>"+
                                    "</span><br/>"+
                                        "類別:&ensp;"+item.card_class+"<br/>"+
                                        "地址:&ensp;<a style='color:gray' href='"+item.card_link+"'>"+item.card_address+"</a><br/>"+
                                        "備註:&ensp;"+item.card_message+
                                "</div>"+
                                "<div class='justify-content-end d-flex mt-4'>"+
                                    "<button class='btn btn-secondary mr-2 update_button' onclick='get_edit_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_edit'>編輯</button>"+
                                    "<button class='btn btn-danger btn-delete dismiss_button' onclick='get_delete_id(this)' id='"+id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_delete'>刪除</button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"+
                    "</div>"; 
                });

                // 更新HTML内容
                allHTML.innerHTML = all;


                // 更新每个title的颜色
                data.forEach(item => {
                    const titleElement = document.getElementById(`card-title-insert-${item.id}`);
                    if (isOpen(item)) {
                        if (titleElement) {
                            titleElement.style.color = 'green';
                        }
                    } 
                });
                // 根据内容更新每个dash的可见性
                data.forEach(item => {
                    for (let day = 1; day <= 7; day++) {
                        const card_1 = item[`card_${day}_1`];
                        const card_2 = item[`card_${day}_2`];
                        const card_3 = item[`card_${day}_3`];
                        const card_4 = item[`card_${day}_4`];

                        const dashInsert1 = document.querySelector(`#dash-insert-${item.id}-${day}-1`);
                        const dashInsert3 = document.querySelector(`#dash-insert-${item.id}-${day}-3`);

                        if (dashInsert1) {
                            dashInsert1.style.display = card_1 === "" ? "none" : "inline";
                        }
                        if (dashInsert3) {
                            dashInsert3.style.display = card_3 === "" ? "none" : "inline";
                        }   
                    }
                });

                // 更新按钮的可见性
                const update_buttons = document.querySelectorAll(".update_button");
                const dismiss_buttons = document.querySelectorAll(".dismiss_button");
                if (localStorage.getItem('password') == "666") {
                    update_buttons.forEach(button => button.style.display = "block");
                    dismiss_buttons.forEach(button => button.style.display = "block");
                } 
            })
            .catch(error => console.error('获取数据时出错:', error));
        }

        //delete
        function get_delete_id(element){
            const id = element.id;
            delete_id = document.getElementById("delete_id")
            delete_id.value=id
        }
        //edit
        function get_edit_id(element){
            const id = element.id;
            edit_id = document.getElementById("edit_id")
            edit_id.value=id
            const formData = new FormData();
            formData.append('edit_id', id);
            fetch('fetch-edit.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json()) // 处理 JSON 数据
            .then(data => {
                card_title = document.getElementById("card-title")
                card_1_1 = document.getElementById("card-1-1")
                card_2_1 = document.getElementById("card-2-1")
                card_3_1 = document.getElementById("card-3-1")
                card_4_1 = document.getElementById("card-4-1")
                card_5_1 = document.getElementById("card-5-1")
                card_6_1 = document.getElementById("card-6-1")
                card_7_1 = document.getElementById("card-7-1")
                card_1_2 = document.getElementById("card-1-2")
                card_2_2 = document.getElementById("card-2-2")
                card_3_2 = document.getElementById("card-3-2")
                card_4_2 = document.getElementById("card-4-2")
                card_5_2 = document.getElementById("card-5-2")
                card_6_2 = document.getElementById("card-6-2")
                card_7_2 = document.getElementById("card-7-2")
                card_1_3 = document.getElementById("card-1-3")
                card_2_3 = document.getElementById("card-2-3")
                card_3_3 = document.getElementById("card-3-3")
                card_4_3 = document.getElementById("card-4-3")
                card_5_3 = document.getElementById("card-5-3")
                card_6_3 = document.getElementById("card-6-3")
                card_7_3 = document.getElementById("card-7-3")
                card_1_4 = document.getElementById("card-1-4")
                card_2_4 = document.getElementById("card-2-4")
                card_3_4 = document.getElementById("card-3-4")
                card_4_4 = document.getElementById("card-4-4")
                card_5_4 = document.getElementById("card-5-4")
                card_6_4 = document.getElementById("card-6-4")
                card_7_4 = document.getElementById("card-7-4")
                card_class = document.getElementById("card-class")
                card_address = document.getElementById("card-address")
                card_link = document.getElementById("card-link")
                card_message = document.getElementById("card-message")
                data.forEach(item => {
                    card_title.value=item.card_title
                    card_1_1.value=item.card_1_1
                    card_2_1.value=item.card_2_1
                    card_3_1.value=item.card_3_1
                    card_4_1.value=item.card_4_1
                    card_5_1.value=item.card_5_1
                    card_6_1.value=item.card_6_1
                    card_7_1.value=item.card_7_1
                    card_1_2.value=item.card_1_2
                    card_2_2.value=item.card_2_2
                    card_3_2.value=item.card_3_2
                    card_4_2.value=item.card_4_2
                    card_5_2.value=item.card_5_2
                    card_6_2.value=item.card_6_2
                    card_7_2.value=item.card_7_2

                    card_1_3.value=item.card_1_3
                    card_2_3.value=item.card_2_3
                    card_3_3.value=item.card_3_3
                    card_4_3.value=item.card_4_3
                    card_5_3.value=item.card_5_3
                    card_6_3.value=item.card_6_3
                    card_7_3.value=item.card_7_3
                    card_1_4.value=item.card_1_4
                    card_2_4.value=item.card_2_4
                    card_3_4.value=item.card_3_4
                    card_4_4.value=item.card_4_4
                    card_5_4.value=item.card_5_4
                    card_6_4.value=item.card_6_4
                    card_7_4.value=item.card_7_4
                    card_class.value = item.card_class
                    card_address.value = item.card_address
                    card_link.value = item.card_link
                    card_message.value = item.card_message
                });  
            })
            .catch(error => console.error('Error fetching data:', error));
        }

    </script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


