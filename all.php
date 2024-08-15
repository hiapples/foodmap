<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodmap</title>
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
                            <li><a class="dropdown-item" href="https://www.instagram.com/howard.2001?utm_source=qr">Instagram</a></li>
                            <li><a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100003103171019">Facebook</a></li>
                            <li><a class="dropdown-item" href="https://github.com/hiapples">Github</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex ml-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success search_button" type="submit">Search</button>  
                </form>
            </div>
        </div>
    </nav>
    <!-- content -->
    <div class="container content  scroll2 mt-3 mb-5">
        <div class="row " id="all">
            
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
                        <button type="submit" class="btn btn-primary" >確定</button>
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
                                <div class="d-flex justify-content-around">星期一<input class="form-control input-form-control" id="card-1-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-1" autocomplete="off" />–<input class="form-control input-form-control" id="card-1-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-1-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期二<input class="form-control input-form-control" id="card-2-1"value=""style="background-color:#121b10;width:20%;" type="text" name="card-2-1" autocomplete="off" />–<input class="form-control input-form-control" id="card-2-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-2-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期三<input class="form-control input-form-control" id="card-3-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-3-1" autocomplete="off" />–<input class="form-control input-form-control" id="card-3-2" value=""style="background-color:#121b10;width:20%;" type="text" name="card-3-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期四<input class="form-control input-form-control" id="card-4-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-4-1" autocomplete="off" />–<input class="form-control input-form-control" id="card-4-2" value=""style="background-color:#121b10;width:20%;" type="text" name="card-4-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期五<input class="form-control input-form-control" id="card-5-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-1" autocomplete="off" />–<input class="form-control input-form-control"id="card-5-2" value="" style="background-color:#121b10;width:20%;" type="text" name="card-5-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期六<input class="form-control input-form-control" id="card-6-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-1" autocomplete="off" />–<input class="form-control input-form-control"id="card-6-2" value="" style="background-color:#121b10;width:20%;" type="text" name="card-6-2" autocomplete="off" /></div>
                                <div class="d-flex justify-content-around mt-1">星期日<input class="form-control input-form-control" id="card-7-1"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-1" autocomplete="off" />–<input class="form-control input-form-control"id="card-7-2"value="" style="background-color:#121b10;width:20%;" type="text" name="card-7-2" autocomplete="off" /></div>
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
        //抓公開
        fetch('fetch-all.php')
        .then(response => response.json()) // 处理 JSON 数据
        .then(data => {
            const allHTML = document.getElementById("all");

            data.forEach(item => {
                allHTML.innerHTML += 
                "<div class='col-md-4'>"+
                    "<div class='card mt-3'>"+
                        "<div class='card-body'>"+
                            "<h5 class='card-title'>"+ item.card_title+"</h5>"+
                            "<div class='card-text'>"+
                                "<span>"+
                                    "星期一&ensp;"+item.card_1_1+"&ensp;–&ensp;"+item.card_1_2+"<br/>"+
                                    "星期二&ensp;"+item.card_2_1+"&ensp;–&ensp;"+item.card_2_2+"<br/>"+
                                    "星期三&ensp;"+item.card_3_1+"&ensp;–&ensp;"+item.card_3_2+"<br/>"+
                                    "星期四&ensp;"+item.card_4_1+"&ensp;–&ensp;"+item.card_4_2+"<br/>"+
                                    "星期五&ensp;"+item.card_5_1+"&ensp;–&ensp;"+item.card_5_2+"<br/>"+
                                    "星期六&ensp;"+item.card_6_1+"&ensp;–&ensp;"+item.card_6_2+"<br/>"+
                                    "星期日&ensp;"+item.card_7_1+"&ensp;–&ensp;"+item.card_7_2+"<br/>"+
                                "</span><br/>"+
                                    "類別:&ensp;"+item.card_class+"<br/>"+
                                    "地址:&ensp;<a style='color:gray' href='"+item.card_link+"'>"+item.card_address+"</a><br/>"+
                                    "備註:&ensp;"+item.card_message+
                            "</div>"+
                            "<div class='justify-content-end d-flex mt-2'>"+
                                "<button class='btn btn-secondary  mr-2 update_button'  onclick='get_edit_id(this)' id='"+item.id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_edit'>編輯</button>"+
                                "<button class='btn btn-danger btn-delete dismiss_button'  onclick='get_delete_id(this)' id='"+item.id+"' data-bs-toggle='modal' data-bs-target='#exampleModal_delete'>刪除</button>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                "</div>" 
            }); 
            //password開編輯
            update_button = document.querySelectorAll(".update_button");
            dismiss_button = document.querySelectorAll(".dismiss_button");
            if (localStorage.getItem('password')=="666") {
                update_button.forEach(button => button.style.display = "block");
                dismiss_button.forEach(button => button.style.display = "block");
            } 
        })
        .catch(error => console.error('Error fetching data:', error));
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


