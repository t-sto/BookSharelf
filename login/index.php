<?php
session_start();
$_SESSION['bs_account_id'] = array();  //セッションを初期化(ログアウト)
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BS Admin -login-</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">

    <!-- Masthead-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="mt-0">BookSharelf管理者用ログインページ</h2>
                    <hr class="divider" />
                </div>
            </div>

            <!-- エラーメッセージの表示 -->
            <?php
            if (!empty($_SESSION['error_message'])) {
                echo $_SESSION['error_message'];
                $_SESSION['error_message'] = "";  //初期化
            }
            ?>

            <form action="login.php" method="post" name="Login_Form" class="form-signin">
                <div class="form-floating mb-3">
                    <input class="form-control" id="UserName" name="UserName" type="text" data-sb-validations="required" />
                    <label for="name">UserName</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="Password" name="Password" type="password" data-sb-validations="required,password" />
                    <label for="email">Password</label>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary btn-xl" id="submitButton" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Footer-->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="../assets/js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>