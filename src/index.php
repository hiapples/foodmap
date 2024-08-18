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
            </div>
        </div>
    </nav>
    <!-- banner -->
    <div class="banner-container">
        <div class="banner banner1"></div>
        <div class="banner banner2"></div>
        <div class="banner banner3"></div>
    </div>
    <!-- content -->
    <div class="content">
        <div class="text-slide-title">尋找美食</div>
        <div class="text-slide-content mt-2">是一種美妙的探索旅程，無論是在繁華的城市街道還是隱秘的鄉村小徑。</div> 
        <div class="container-fluid text-slide-icon">
            <div class="row">
                <div class="col-4 d-flex flex-column align-items-center text-slide">
                    <img src="static/content1.png" width="70" height="70"/>
                    <div class="text-slide-content-title mt-2">開啟地圖</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center text-slide">
                    <img src="static/content2.png" width="70" height="70"/>
                    <div class="text-slide-content-title mt-2">尋找美食</div>
                </div>
                <div class="col-4 d-flex flex-column align-items-center text-slide">
                    <img src="static/content3.png" width="70" height="70"/>
                    <div class="text-slide-content-title mt-2">立即出發</div>
                </div>
            </div>
        </div>
        <div class="text-slide-title2 mb-5">享受美食</div>
        <div class=" image-container text-slide2">
            <img src="static/life.png" />
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
        //content顯示左邊出現
        document.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;

            if (scrollPosition > 250) {
                // 确保仅在第一次滚动超过300像素时执行
                if (!document.querySelector('.text-slide.visible')) {
                    const items = document.querySelectorAll('.text-slide');
                    items.forEach((item, index) => {
                        setTimeout(() => {
                            item.classList.add('visible');
                        }, index * 500); 
                    });
                }
            }
            if (scrollPosition > 800) {
                var textSlide2 = document.querySelector('.text-slide2');
                textSlide2.classList.add('visible');
            }
        });

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

    </script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>


