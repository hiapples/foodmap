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
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container content">
        <div class="d-flex small-title mb-3">
            <div class="mx-auto">*僅顯示營業中地標*</div>
        </div>
        <div id="map"></div>
        <div class="d-flex justify-content-center mt-3">
            <button id="locate-btn">當前位置</button>
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

        //地圖
        var map;
        var userMarker;
        var userLocation = null;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15, // 初始放大等级
                center: { lat: 0, lng: 0 }, // 初始位置设置为零点，稍后会更新
                fullscreenControl: false, // 移除全螢幕按鈕
                mapTypeControl: false, // 移除地圖類型控制（如衛星地圖）
                streetViewControl: false, // 移除街景按鈕
                zoomControl: false // 移除放大縮小控件
            });

            geocoder = new google.maps.Geocoder(); // 初始化 Geocoder 实例
            new_marker(); // 调用函数加载标记

            // 自己标记
            userMarker = new google.maps.Marker({
                map: map,
                title: '你的當前位置'
            });

            // 获取并设置用户当前位置
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    
                    // 更新地图中心和放大级别
                    map.setCenter(userLocation);
                    map.setZoom(15); // 自动放大到级别 15
                    userMarker.setPosition(userLocation);
                }, function() {
                    handleLocationError(true, map.getCenter());
                });
            } else {
                handleLocationError(false, map.getCenter());
            }

            // 定位按钮点击事件
            document.getElementById('locate-btn').addEventListener('click', function() {
                if (userLocation) {
                    // 平滑移动到用户位置
                    map.panTo(userLocation);
                    // 可选：添加动画效果
                    userMarker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(function() {
                        userMarker.setAnimation(null); // 停止动画
                    }, 1400);
                } else {
                    alert('无法获取当前位置。');
                }
            });
            function handleLocationError(browserHasGeolocation, pos) {
                var infoWindow = new google.maps.InfoWindow({
                    content: browserHasGeolocation ?
                        '错误: 失败获取当前位置。' :
                        '错误: 不支持浏览器地理位置。',
                    position: pos
                });
                infoWindow.open(map);
            }
        }


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
            if (currentHour < 4) {
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
        function new_marker(){
            fetch('fetch-all.php')
            .then(response => response.json()) // 处理 JSON 数据
            .then(data => {
                
                const openData = data.filter(isOpen);
                openData.forEach(item => {

                    // 地址
                    var address = item.card_address;
                    // 使用 Geocoding API 将地址转换为经纬度
                    geocoder.geocode({ 'address': address }, function(results, status) {
                        if (status === 'OK') {
                            var position = results[0].geometry.location;

                            // 创建标记
                            var marker = new google.maps.Marker({
                                position: position,
                                map: map,
                                title: item.card_title,
                                icon: {
                                    url: "static/marker.png", // 自定义图标的 URL
                                    scaledSize: new google.maps.Size(40, 40) // 调整图标的显示大小
                                }
                            });

                            // 创建信息窗口内容
                            var contentString = 
                                "<div>"+
                                    "<h3>"+item.card_title+"</h3>"+
                                    "<p>"+item.card_address+"</p>"+
                                    "<a href='"+item.card_link+"' target='_blank'>在Google 地圖上查看</a>"+
                                "</div>"
                            

                            // 创建信息窗口
                            var infoWindow = new google.maps.InfoWindow({
                                content: contentString
                            });

                            // 点击标记时显示信息窗口
                            marker.addListener('click', function() {
                                infoWindow.open(map, marker);
                            });

                            // 设置地图中心到标记位置
                            map.setCenter(position);

                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }); 
            })
            .catch(error => console.error('Error fetching data:', error));
        }
        // 初始化地图
        window.onload = initMap;
    </script>
    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXWYh2BkCTL9MwSFMESxsudRZrLXVO6sM&callback=initMap" async defer></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


