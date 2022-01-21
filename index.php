<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BookSharelf</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/icon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="assets/css/styles.css" rel="stylesheet" />

    <!-- 送信完了メッセージ表示 -->
    <script language="javascript" type="text/javascript">
        var param = location.search
        if (param) {
            alert(getParam("message"));
        }

        function getParam(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, "\\$&");
            var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, " "));
        }
    </script>

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">BookSharelf</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">BookSharelf</h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">BookSharelfでは本の橋渡しにより、皆様に快適なBookLifeをお届けしています</p>
                    <a class="btn btn-primary btn-xl" href="#about">Find out more</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">BookSharelfとは</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">いらなくなった本を回収し、必要としている方へ提供することを主なサービスとしています</p>
                    <a class="btn btn-light btn-xl" href="#services">Service</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">サービスに関する情報</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Theme</h3>
                        <p class="text-muted mb-0">本の魅力の提供</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Offer</h3>
                        <p class="text-muted mb-0">本を必要としている方への提供</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Image</h3>
                        <p class="text-muted mb-0">本棚のイメージ提供</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Environment</h3>
                        <p class="text-muted mb-0">破棄に迷っている本の回収</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/book2.png" title="Home">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/book2.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Booksharelf(社員宅)</div>
                            <div class="project-name">ワンランク上の大人の空間をあなたに</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/book3.png" title="Cafe">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/book3.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Book & coffee(提供先)</div>
                            <div class="project-name">本の魅力を少しでも多くの人に</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/book1.png" title="Office">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/book1.png" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">lime株式会社(提供先)</div>
                            <div class="project-name">仕事場を華やかに</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <<section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">BookSharelfを利用する</h2>
                    <hr class="divider" />
                    <p class="text-muted mb-5">本の提供･貸し出し先を募集しています</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form action="contact_input.php" method="post" name="contact_form">

                        <div class="form-floating mb-3">
                            <select class="form-select" name="contact_flag">
                                <option value="1">BookSharelfに本を提供する</option>
                                <option value="2">BookSharelfを利用する</option>
                            </select>
                            <label class="form-label">提供/利用</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Name" required="" />
                            <label class="form-label">名前</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Address" required="" />
                            <label class="form-label">住所</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" name="number" placeholder="Nunmber" required="" />
                            <label class="form-label">電話番号</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="mail" placeholder="Mail" />
                            <label class="form-label">メールアドレス</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="message" placeholder="Message" />
                            <label class="form-label">メッセージ</label>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-xl" id="submitButton" type="submit">送信</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </section>

        <footer class="bg-light py-5">
            <div class="container px-4 px-lg-5">
                <div class="small text-center text-muted">Copyright &copy; 2021 - BookSharelf
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>