<?php
// 인기 펫시터 기준
const HOT_REVIEW = 100;
const HOT_RATING = 4.5;

function view($page, $data = [])
{
  extract($data);
  require_once "../Views/Particals/header.php";
  require_once "../Views/$page.php";
  require_once "../Views/Particals/footer.php";
}
function part($name, $data = [])
{
  extract($data);
  require "../Views/Particals/$name.php";
}
function render($name, $data = [])
{
  ob_start();
  part($name, $data);
  return ob_get_clean();
}
function json($data)
{
  header('Content-Type: application/json');
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
  die;
}
function move($uri, $msg = "")
{
  if ($msg) echo "<script>alert('$msg');location.replace('$uri')</script>";
  else header("Location:$uri");
  die;
}
function back($msg = "")
{
  if ($msg) echo "<script>alert('$msg');history.back();</script>";
  die;
}
function ss()
{
  return isset($_SESSION['ss']) ? (object)$_SESSION['ss'] : false;
}
function admin()
{
  return ss() && ss()->u_role == 1;
}
// xss 방지
function e($s)
{
  return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
// 이미지 업로드 
function upload($file, $exts = ['jpg', 'jpeg', 'png', 'gif', 'webp'])
{
  if (!$file || $file['error'] !== UPLOAD_ERR_OK) return null;
  $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
  if (!in_array($ext, $exts)) return false;
  $name = uniqid('', true) . ".$ext";
  move_uploaded_file($file['tmp_name'], "./upload/$name");
  return $name;
}
// 없으면 기본 이미지
function profile($p, $dir = "/upload")
{
  return $p ? "$dir/$p" : "/images/profile.png";
}
// 오늘 이후 예약이 잡힌 펫시터 번호들
function booked()
{
  static $list;
  return $list ??= array_column(DB::fetchAll("SELECT DISTINCT p_idx FROM reservations WHERE r_date >= CURDATE()"), 'p_idx');
}
// 내가 찜한 펫시터 번호들
function favs()
{
  static $list;
  return $list ??= ss() ? array_column(DB::fetchAll("SELECT p_idx FROM favorites WHERE u_idx = ?", [ss()->u_idx]), 'p_idx') : [];
}
function tags($json)
{
  return json_decode((string)$json, true) ?: [];
}
// 인기 펫시터 여부
function hot($s)
{
  return $s['review_count'] >= HOT_REVIEW && $s['rating'] >= HOT_RATING;
}

function ments($idx)
{
  $ments = [
    ['매일 사진 보내주셔서 안심됐어요!', '아이가 정말 좋아했어요.', '친절하고 꼼꼼하게 돌봐주셨어요.'],
    ['요청사항을 하나하나 다 지켜주셨어요.', '집도 깨끗하게 정리해주셨어요.', '다음에도 꼭 예약할게요!'],
    ['처음 맡겼는데 걱정이 사라졌어요.', '산책 시간을 잘 지켜주셨어요.', '연락이 빨라서 좋았습니다.'],
  ];
  return $ments[$idx % 3];
}
function ban_check($kind)
{
  $b = DB::fetch("SELECT until FROM bans WHERE u_idx=? AND kind=? AND until>CURDATE()", [ss()->u_idx, $kind]);
  if ($b) back("해당 서비스는 이용금지 상태입니다. {$b['until']}부터 활동 가능합니다.");
}
function notify($writer, $msg)
{
  foreach (DB::fetchAll("SELECT u_idx FROM follows WHERE target=?", [$writer]) as $f)
    DB::exec("INSERT INTO notices (u_idx, msg) VALUES (?,?)", [$f['u_idx'], $msg]);
}