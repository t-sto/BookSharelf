<?php
require_once('../assets/php/db_config.php');
require("../assets/php/login_check.php");

//DB内の集荷データを取得
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $stmt = $pdo->prepare('select * from CollectDestinationTable');
  $stmt->execute();
  $collectDestination = $stmt->fetchAll();
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}

//リスト表示用コード自動生成
function make_list($row)  //1集荷先の情報を代入
{
  //集荷先ユーザーIDからDB内のユーザーデータ取得
  try {
    $pdo = new PDO(DSN, DB_USER, DB_PASS);
    $stmt = $pdo->prepare('select * from UserInfoTable where user_id = :id');
    $stmt->bindValue(':id', $row["user_id"]);
    $stmt->execute();
    $userInfo = $stmt->fetch();
  } catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }

  //リスト生成
  $date = date_create($row["collect_date"]);
  echo '<tbody> <tr> <td>' . date_format($date, 'Y') . "年" . date_format($date, 'm') . "月" . date_format($date, 'd') . "日" .  '</td>'
    . '<td>' . $userInfo["user_address"] . '</td>'
    . '<td>' . $userInfo["user_number"] . '</td>';
  echo '<td>';
  switch ($row["collect_executedflag"]) { //集荷状況を取得して表示
    case 1:
      echo "未確認";
      break;
    case 2:
      echo "確認済み";
      break;
    case 3:
      echo "集荷完了";
      break;
  }
  echo '</td> </tr> </tbody>';
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
    BS Admin -集荷先情報-
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
            <a class="navbar-brand">集荷先情報</a>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card-body">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  絞り込み
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">未確認</a>
                  <a class="dropdown-item" href="#">連絡済み</a>
                  <a class="dropdown-item" href="#">集荷完了</a>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                      日付
                    </th>
                    <th>
                      住所
                    </th>
                    <th>
                      電話番号
                    </th>
                    <th>
                      集荷状況
                    </th>
                  </thead>

                  <?php
                  //リスト表示用コード自動生成実行
                  foreach ($collectDestination as $row) {
                    make_list($row);  //一人分のデータを代入して実行
                  }
                  ?>

                </table>
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