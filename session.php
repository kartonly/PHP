<?
    session_start();
    $message = 'Вы в тесте';
    if ($_SERVER["REQUEST_METHOD"] == "POST"):
      $ip = (string)$_SERVER['REMOTE_ADDR'];
      $first = (string)($_POST["first"]);
      $second = (string)$_POST["second"];
      $third = (string)($_POST["third"]);
      $fourth = (string)$_POST["fourth"];
      $choice = (string)($_POST["choice"]);
      $chk1 = (string)$_POST["chk1"];
      $chk2 = (string)$_POST["chk2"];
      $chk3 = (string)$_POST["chk3"];
      if(empty($first)):
          $message = 'Поле `ваш первый вопрос` обязательно к заполнению!';
      elseif(empty($second)):
          $message = 'Поле `Ваш второй вопрос` обязательно к заполнению!';
      elseif(empty($third)):
            $message = 'Поле `Ваш третий вопрос` обязательно к заполнению!';
      elseif(empty($fourth)):
            $message = 'Поле `Ваш четвертый вопрос` обязательно к заполнению!';
      // Если поля заполнены, записываем в сессию
      else:
          $_SESSION["first"] = $first;
          $_SESSION["second"] = $second;
          $_SESSION["third"] = $third;
          $_SESSION["fourth"] = $fourth;
          $_SESSION["choice"] = $choice;
          $_SESSION["chk1"] = $chk1;
          $_SESSION["chk2"] = $chk3;
          $_SESSION["chk3"] = $chk3;
      endif;
     
    // Иначе берём данные из сессии
    else:
        $first = $_SESSION["first"] ?? null;
        $second = $_SESSION["second"] ?? null;
        $third = $_SESSION["third"] ?? null;
        $fourth = $_SESSION["fourth"] ?? null;
        $choice = $_SESSION["choice"] ?? null;
        $chk1 = $_SESSION["chk1"] ?? null;
        $chk2 = $_SESSION["chk2"] ?? null;
        $chk3 = $_SESSION["chk3"] ?? null;
    endif;
include 'viewer.php'; 
// подключаеммодульсбиблиотекойфункций
// есливпараметрахнеуказанатекущаястраница – выводимсамуюпервую
if( !isset($_GET['pg']) || $_GET['pg']<0 ) $_GET['pg']=0; 
// есливпараметрахнеуказантипсортировкиилионнедопустим
if(!isset($_GET['sort']) || ($_GET['sort']!='byid' && $_GET['sort']!='fam' &&     $_GET['sort']!='birth'))  $_GET['sort']='byid'; 
// устанавливаемсортировкупоумолчанию// формируемконтентстраницыспомощьюфункцииивыводимего
echo getFriendsList($_GET['sort'], $_GET['pg']); 
    ?>
