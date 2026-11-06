<?php
// 라우터
class Router
{
  // 빈배열
  static $router = [];
  // 받을 값들 할당
  static function path($reqM, $uri, $handle)
  {
    // 대체할 값들
    $uri = preg_replace("#\{(.*?)\}#", "([^\/]+)", $uri);
    self::$router[] = [$reqM, "#^$uri$#", $handle];
  }
  // url 값 맞는지 검사
  static function requesthandle()
  {
    $REQUEST_MEHTOD = $_SERVER['REQUEST_METHOD'];
    // ?p=1 같은 쿼리스트링은 떼고 경로만 비교
    $REQUEST_URI = rawurldecode(strtok($_SERVER['REQUEST_URI'], '?'));
    foreach (self::$router as $route) {
      [$reqM, $uri, $handle] = $route;
      if ($reqM !== $REQUEST_MEHTOD) continue;
      if (preg_match($uri, $REQUEST_URI, $match)) {
        array_shift($match);
        return call_user_func_array($handle, $match);
      }
    }
    // 배열에 없는 값이면 홈으로 보냄
    move('/');
  }
}
// 유틸
function get($uri, $handle = "")
{
  Router::path('GET', $uri, $handle);
}
function post($uri, $handle = "")
{
  Router::path('POST', $uri, $handle);
}
