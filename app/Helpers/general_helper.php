<?php

function assetCss($type="")
{
  $baseUrl = getenv('app.baseURL');
  // $cssPath =  ENVIRONMENT == 'production' ? 'dist/css/app.min.css' : 'dist/css/app.css';
  // 'assets/' . $cssPath,
  switch($type){
      case "main":
        $arr = [
          'assets/plugins/fontawesome-free/css/all.min.css',
          'assets/plugins/jeasyui/themes/bootstrap/easyui.css',
          'assets/plugins/jeasyui/themes/icon.css',
          'assets/dist/css/adminlte.min.css',
        ];
      break;
      case "login":
        $arr = [
          'assets/plugins/fontawesome-free/css/all.min.css',
          'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
          'assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
          'assets/dist/css/adminlte.min.css',
        ];
      break;
  }
  
  $assets = '';
  foreach ($arr as $k) {
    $version = filemtime($k);
    $assets .= "<link rel='stylesheet' href='" . $baseUrl . $k . "?v=" . $version . "' />";
  }
  return $assets;
}

function assetJs($type="")
{

  $baseUrl = getenv('app.baseURL');
  // $cssPath =  ENVIRONMENT == 'production' ? 'dist/app.min.css' : 'dist/app.css';

  switch($type){
    case "main":
      $arr = [
        'assets/plugins/jquery/jquery.min.js',
        'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'assets/plugins/jeasyui/jquery.easyui.min.js',
        'assets/dist/js/adminlte.min.js',
        'assets/dist/js/fungsi.js',
        'assets/dist/js/demo.js',
      ];
    break;
    case "login":
        $arr = [
          'assets/plugins/jquery/jquery.min.js',
          'assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
          'assets/dist/js/adminlte.min.js',
        ];
    break;
  }

  $assets = '';
  foreach ($arr as $k) {
    $version = filemtime($k);
    $assets .= "<script src='" . $baseUrl . $k . "?v=" . $version . "'></script>";
  }
  return $assets;
}

function myEncrypt($string)
{
  $encrypter = \Config\Services::encrypter();
  $ciphertext = $encrypter->encrypt($string);
  return base64_encode($ciphertext);
}

function myDecrypt($string)
{
  $decoded = base64_decode($string);
  $encrypter = \Config\Services::encrypter();
  $ciphertext = $encrypter->decrypt($decoded);
  return $ciphertext;
}


function getShortMonth($key = NULL)
{
  if ($key) $key = (int) $key;
  $months = [
    [
      'id' => 1,
      'textId' => '01',
      'shortText' => 'Jan',
      'text' => 'Januari',
    ],
    [
      'id' => 2,
      'textId' => '02',
      'shortText' => 'Feb',
      'text' => 'Februari',
    ],
    [
      'id' => 3,
      'textId' => '03',
      'shortText' => 'Mar',
      'text' => 'Maret'
    ],
    [
      'id' => 4,
      'textId' => '04',
      'shortText' => 'Apr',
      'text' => 'April'
    ],
    [
      'id' => 5,
      'textId' => '05',
      'shortText' => 'Mei',
      'text' => 'Mei'
    ],
    [
      'id' => 6,
      'textId' => '06',
      'shortText' => 'Jun',
      'text' => 'Juni'
    ],
    [
      'id' => 7,
      'textId' => '07',
      'shortText' => 'Jul',
      'text' => 'Juli'
    ],
    [
      'id' => 8,
      'textId' => '08',
      'shortText' => 'Agu',
      'text' => 'Agustus'
    ],
    [
      'id' => 9,
      'textId' => '09',
      'shortText' => 'Sep',
      'text' => 'September'
    ],
    [
      'id' => 10,
      'textId' => '10',
      'shortText' => 'Okt',
      'text' => 'Oktober'
    ],
    [
      'id' => 11,
      'textId' => '11',
      'shortText' => 'Nop',
      'text' => 'Nopember'
    ],
    [
      'id' => 12,
      'textId' => '12',
      'shortText' => 'Des',
      'text' => 'Desember'
    ],
  ];

  if (!$key) return $months;
  return $months[$key - 1];
}
function getTriwulan($key = NULL)
{
  if ($key) $key = (int) $key;
  $triwulan = [
    [
      'id' => 1,
      'textId' => '1',
      'shortText' => 'triwI',
      'text' => 'Triwulan I',
    ],
    [
      'id' => 2,
      'textId' => '2',
      'shortText' => 'triwII',
      'text' => 'Triwulan II',
    ],
    [
      'id' => 3,
      'textId' => '3',
      'shortText' => 'triwIII',
      'text' => 'Triwulan III'
    ],
    [
      'id' => 4,
      'textId' => '4',
      'shortText' => 'triwIV',
      'text' => 'Triwulan IV'
    ],

  ];

  if (!$key) return $triwulan;
  return $triwulan[$key - 1];
}
function moneytoint($money = "")
{
  $int = 0;
  if (!empty($money)) {

    $int = str_replace(".", "", $money);
    $int = str_replace(",", ".", $int);
  }
  return $int;
}

function inttomoney($money)
{
  $int = number_format($money, 0, ",", ".");
  return $int;
}

function dateFormat($date, $type = 'normal')
{
  if (!$date) return '-';
  $separator = '/';
  $datetime = explode(' ', $date);
  $exDate = explode('-', $datetime[0]);
  if ($type == 'text') {
    $bulan = getShortMonth($exDate[1]);
    $separator = ' ';
    return $exDate[2] . $separator . $bulan['text'] . $separator . $exDate[0];
  }
  return $exDate[2] . $separator . $exDate[1] . $separator . $exDate[0];
}

function dateTimeFormat($date, $type = 'normal')
{
  if (!$date) return '-';
  $separator = '/';
  $datetime = explode(' ', $date);
  $exDate = explode('-', $datetime[0]);

  if ($type == 'text') {
    $bulan = getShortMonth($exDate[1]);
    $separator = ' ';
    return $exDate[2] . $separator . $bulan['text'] . $separator . $exDate[0] . ' ' . substr($datetime[1], 0, 8);
  }
  return $exDate[2] . $separator . $exDate[1] . $separator . $exDate[0] . ' ' . substr($datetime[1], 0, 8);
}

function timeFormat($date)
{
  $datetime = explode(' ', $date);
  return substr($datetime[1] ?? $datetime[0], 0, 8);
}
function getTypeOfTrade($type = null)
{
  if ($type && !is_numeric($type)) return '-';
  $trades = ['None', 'Spot', 'Forward', 'Cash', 'Negosiasi'];
  if ($type) return $trades[$type];
  return $trades;
}

function toPrimitiveArray($arr, $key)
{
  $newArr = array();
  foreach ($arr as $value) {
    array_push($newArr, $value[$key]);
  }
  return $newArr;
}

function generateUniqId($marketId)
{
  $tempnya = str_replace(array(" "), array(""), $marketId);
  $kd = $tempnya . date('Ymd') . uniqid();
  return $kd;
}

function getMenu($marketId)
{
  $allMenu =  [
    [
      'id' => 1,
      'url' => base_url('home'),
      'icon' => "icon-stats-dots",
      'title' => "Dashboard",
    ],
    [
      'id' => 2,
      'url' => base_url('penyelenggaralelang'),
      'icon' => "icon-home2",
      'title' => "Penyelenggara Lelang",
    ],
    [
      'id' => 3,
      'url' => base_url('rekaptransaksi'),
      'icon' => "icon-stack",
      'title' => "Rekap Transaksi",
    ],
    [
      'id' => 4,
      'url' => '#',
      'icon' => "icon-gear",
      'title' => "Pengaturan",
      'child' => [
        [
          'id' => 41,
          'url' => base_url('role'),
          'title' => "Role",
        ],
        [
          'id' => 42,
          'url' => base_url('users'),
          'title' => "User",
        ],
      ]
    ],
    [
      'id' => 5,
      'url' => '#',
      'icon' => "icon-stack",
      'title' => "Laporan",
      'child' => [
        [
          'id' => 51,
          'url' => base_url('laporan/plk'),
          'title' => "Transaksi PLK",
        ],
        [
          'id' => 52,
          'url' => base_url('laporan/bulanan'),
          'title' => "Laporan Bulanan",
        ],
        [
          'id' => 53,
          'url' => base_url('laporan/triwulan'),
          'title' => "Laporan Triwulan",
        ],
        [
          'id' => 54,
          'url' => base_url('laporan/tahunan'),
          'title' => "Laporan Tahunan",
        ],
      ]
    ],
  ];
  $showToPenyelenggara = [4];
  $showedMenus = [];
  if ($marketId != '') {
    foreach ($showToPenyelenggara as $key) {
      array_push($showedMenus, $allMenu[$key]);
    }
  } else {
    $showedMenus = $allMenu;
  }
  return $showedMenus;
}
