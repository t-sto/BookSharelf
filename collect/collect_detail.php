<?php
require_once('../assets/php/db_config.php');
require("../assets/php/login_check.php");

//表生成
function make_list()
{
  //URL内クエリ文字の集荷IDからDB内の集荷詳細データを取得
  try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare('select * from CollectDestinationTable, UserInfoTable where CollectDestinationTable.user_id = UserInfoTable.user_id and collect_id = :id');
    $stmt->bindValue(':id', $_GET["id"]);
    $stmt->execute();
    $collect_data = $stmt->fetch();
  } catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }

  $date = date_create($collect_data["collect_date"]);
  echo '<tbody> <tr> <th scope="row">日付</th> <td>' . date_format($date, 'Y') . "年" . date_format($date, 'm') . "月" . date_format($date, 'd') . "日" . '</td> </tr>'
    . '<tr> <th scope="row">住所</th> <td>' . $collect_data["user_address"] . '</td> </tr>'
    . '<tr> <th scope="row">電話番号</th> <td>' . $collect_data["user_number"] . '</td> </tr>'
    . '<tr> <th scope="row">集荷状況</th> <td>';
  switch ($collect_data["collect_executedflag"]) { //集荷状況を取得して表示
    case 1:
      echo "未確認";
      break;
    case 2:
      echo "連絡済み";
      break;
    case 3:
      echo "集荷完了";
      break;
  }
  echo '</td> </tr>';
  echo '<tr> <th scope="row">メッセージ</th> <td>' . $collect_data["collect_message"] . '</td> </tr>'
    . '<tr> <th scope="row">メールアドレス</th> <td>' . $collect_data["user_mail"] . '</td> </tr>'
    . '<tr> <th scope="row">名前</th> <td>' . $collect_data["user_name"] . '</td> </tr> </tbody>';

  $_SESSION['bs_collect_id'] = $_GET["id"]; //集荷状況更新･削除用IDをセッションに保存
}
?>

<!doctype html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    BS Admin -集荷先詳細情報-
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <script language="javascript" type="text/javascript">
    //連絡済みボタン押下時
    function Contacted() {
      window.location.href = "collect_contacted.php"; //連絡済み更新処理ページへリダイレクト
    }

    //集荷完了ボタン押下時
    function Collected() {
      window.location.href = "collect_collected.php"; //集荷完了更新処理ページへリダイレクト
    }

    //削除ボタン押下時
    function DeleteCheck() {
      if (confirm("削除を実行します")) { //アラートを表示し、OKがクリックされた場合
        window.location.href = "collect_delete.php"; //集荷情報･ユーザー情報削除処理ページへリダイレクト
      }
    }
  </script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="../collect" class="simple-text logo-mini">
        </a>
        <a href="../collect" class="simple-text logo-normal">
          BookSharelf
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="../collect">
              <i class="nc-icon nc-bank"></i>
              <p>集荷先管理</p>
            </a>
          </li>
          <li>
            <a href="../shipping">
              <i class="nc-icon nc-diamond"></i>
              <p>発送先管理</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">集荷先詳細情報</a>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
              <br>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">

                    <?php
                    //表示用コード自動生成実行
                    make_list();  //表生成
                    ?>

                </table>
                <input type="submit" class="btn btn-primary" value="連絡済み" onclick="Contacted();">
                <input type="submit" class="btn btn-primary" value="集荷完了" onclick="Collected();">
                <input type="button" class="btn btn-danger" value="削除" onclick="DeleteCheck();">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>