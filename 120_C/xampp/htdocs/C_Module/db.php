<?php
// 데이터베이스
class DB
{
  static $db = null;
  // 연결 함수
  static function conn()
  {
    return self::$db ??= new PDO("mysql:host=localhost;dbname=c_module;charset=utf8mb4", "root", "", [19 => 2, 3 => 2, 20 => false]);
  }
  static function __callStatic($name, $arguments)
  {
    $st = self::conn()->prepare($arguments[0]);
    $st->execute($arguments[1] ?? []);
    return match ($name) {
      // 실행
      "exec" => self::conn()->LastInsertId(),
      // 단일
      "fetch" => $st->fetch(),
      // 다중
      "fetchAll" => $st->fetchAll(),
      // 삭제, 업데이트
      "run" => $st->rowCount()
    };
  }
}
