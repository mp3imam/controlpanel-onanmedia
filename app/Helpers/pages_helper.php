<?php
function penyelenggaraLelangPageAction($type = 'horizontal', $pasarId = null)
{
  $pasarId = myDecrypt($pasarId);
  return [
    'type' => $type,
    'actions' => [
      ['title' => 'Info', 'url' => site_url('Penyelenggaralelang/info?id=' . $pasarId), 'icon' => 'icon-info22'],
      ['title' => 'Lelang Aktif', 'url' => site_url('lelang/live?id=' . $pasarId), 'icon' => 'icon-pulse2'],
      ['title' => 'Data Lelang', 'url' => site_url('lelang/market?id=' . $pasarId), 'icon' => 'icon-database'],
    ]
  ];
}

function laporanPLKPageAction($type = 'horizontal', $pasarId = null)
{
  $pasarId = myDecrypt($pasarId);
  return [
    'type' => $type,
    'actions' => [
      ['title' => 'Upload Excel', 'url' => '#', 'icon' => 'icon-info22'],
    ]
  ];
}
function userPageAction($type = 'horizontal', $pasarId = null)
{
  $pasarId = myDecrypt($pasarId);
  return [
    'type' => $type,
    'actions' => [
      ['title' => 'Detail', 'url' => site_url('Users/detail?id=' . $pasarId), 'icon' => 'icon-eye4'],
      ['title' => 'Ubah', 'url' => site_url('Users/edit?id=' . $pasarId), 'icon' => 'icon-pencil5'],
      ['title' => 'Hapus', 'url' => site_url('Users/delete?id=' . $pasarId), 'icon' => 'icon-trash'],
    ]
  ];
}
