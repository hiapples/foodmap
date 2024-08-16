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
    <div class="form1">
        <div class="d-flex justify-content-center mt-5  content-dev ">
            <div class="password_title mr-2 mt-1">密碼:</div>
            <input class="form-control input-form-control " style="background-color:#121b10;width:30%;" type="password" name="password" id="password"/>
        </div>
    </div>
    <div class="form2">
        <div class="container content-dev">
            <div class="row mt-2">
                <div class="col-md-6 mx-auto">
                    <div class="insert-title">新增項目</div>
                    <div class="card mt-3">
                        <div class="card-body"> 
                            <form action="insert.php" method="post" id="shop-form">
                                <div class="d-flex align-items-center mt-2">
                                    <div style="white-space: nowrap; margin-right: 10px;">店名:</div>
                                    <input class="form-control input-form-control"  style="background-color:#121b10" type="text" name="card-title" required autocomplete="off" />
                                </div>
                                <p class="card-text" style="white-space: pre-line;"><span>
                                        <div class="d-flex justify-content-around align-items-center week">週一&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-1-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-1-2" autocomplete="off" /> &thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-1-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-1-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週二&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-2-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-2-2" autocomplete="off" />&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-2-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-2-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週三&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-3-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-3-2" autocomplete="off" /> &thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-3-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-3-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週四&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-4-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-4-2" autocomplete="off" />&thinsp; <input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-4-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-4-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週五&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-5-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-5-2" autocomplete="off" /> &thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-5-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-5-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週六&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-6-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-6-2" autocomplete="off" /> &thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-6-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-6-4" autocomplete="off" /></div>
                                        <div class="d-flex justify-content-around align-items-center week mt-1">週日&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-7-1" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-7-2" autocomplete="off" /> &thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-7-3" autocomplete="off" />&thinsp;:&thinsp;<input class="form-control input-form-control"  style="background-color:#121b10;width:20%;" type="text" name="card-7-4" autocomplete="off" /></div>
                                    </span>
                                    <div class="d-flex align-items-center mt-2">
                                        <div style="white-space: nowrap; margin-right: 10px;">類別:</div>
                                        <input class="form-control input-form-control"  style="background-color:#121b10;" type="text" name="card-class" required autocomplete="off" />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div style="white-space: nowrap; margin-right: 10px;">地址:</div>
                                        <input class="form-control input-form-control"  style="background-color:#121b10;" type="text" name="card-address" required autocomplete="off" />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div style="white-space: nowrap; margin-right: 10px;">連結:</div>
                                        <input class="form-control input-form-control"  style="background-color:#121b10;" type="text" name="card-link" required autocomplete="off" />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <div style="white-space: nowrap; margin-right: 10px;">備註:</div>
                                        <textarea class="form-control input-form-control"  style="background-color:#121b10;" name="card-message"  rows="2" autocomplete="off" ></textarea>
                                    </div>                    
                                </p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-secondary ">送出</button>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 成功模态框 -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm "  style="margin-top:100px">
            <div class="modal-content exampleModal_edit" >
                <div class="modal-header" >
                    <h5 class="modal-title" id="exampleModalLabel">成功</h5>
                </div>
                <div class="modal-body">
                    傳入資料庫成功!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">確定</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 失败模态框 -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" style="margin-top:100px">
            <div class="modal-content exampleModal_edit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">失敗</h5>
                </div>
                <div class="modal-body">
                    傳入資料庫失敗!
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">確定</button>
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

        //判斷新增是否成功
        document.getElementById('shop-form').addEventListener('submit', function(event) {
            event.preventDefault(); // 阻止默认提交

            const formData = new FormData(this);

            fetch('insert.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    $('#successModal').modal('show');
                } else {
                    $('#errorModal').modal('show');
                }
            })
            .catch(error => {
                $('#errorModal').modal('show');
            });
        });
        //新增重整
        var successModal = document.getElementById('successModal');
        successModal.addEventListener('hidden.bs.modal', function () {
            location.reload();
        });
        //password開編輯
        form1=document.querySelector(".form1")
        form2=document.querySelector(".form2")
        password.addEventListener("input", function() {
            if (password.value == "666") {
                localStorage.setItem('password', '666');
                form2.style.display = "block";
                form1.style.display = "none";
            } 
        });
        if (localStorage.getItem('password')=="666") {
            form2.style.display = "block";
            form1.style.display = "none";
        }
    </script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


