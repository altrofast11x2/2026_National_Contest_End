<?php
session_start();
require_once "../db.php";
require_once "../lib.php";
require_once "../Router.php";
require_once "../Controller/page.php";
if (ss()) {
  $u = DB::fetch("SELECT * FROM users WHERE u_idx = ?", [ss()->u_idx]);
  $msg = !$u ? '해당 계정은 관리자에 의해 삭제되었습니다.' : ($u['u_token'] !== ss()->u_token ? '다른 곳에서 로그인되어 로그아웃 되었습니다.' : '');
  if ($msg) {
    session_destroy();
    if (str_starts_with($_SERVER['REQUEST_URI'], '/api/')) json(['logout' => $msg]);
    move('/', $msg);
  }
  unset($u['u_pw']);
  $_SESSION['ss'] = $u;
}
Router::requesthandle();
