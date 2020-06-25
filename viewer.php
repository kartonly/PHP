<?php
function getFriendsList($type, $page)
{
// осуществляем подключение к базе данных
$mysqli = mysqli_connect('std-mysql', 'std_941', '84996111636', 'std_941');
if( mysqli_connect_errno() ) // проверяем корректность подключения
return 'Ошибка подключения к БД: '.mysqli_connect_error();
// формируем и выполняем SQL-запрос для определения числа записей
$sql_res=mysqli_query($mysqli, 'SELECT COUNT(*) FROM std_941.form');
// проверяем корректность выполнения запроса и определяем его результат
if( !mysqli_errno($mysqli) && $row=mysqli_fetch_row($sql_res) )
{
if( !$TOTAL=$row[0] ) // если в таблице нет записей
return 'В таблице нет данных'; // возвращаем сообщение
$PAGES = ceil($TOTAL/10);// вычисляем общее количество страниц
if( $page>=$PAGES ) // если указана страница больше максимальной
$page=$TOTAL-1; // будем выводить последнюю страницу
$diapazon=$page*10;
if ($_GET['sort'] == 'byid')// формируем и выполняем SQL-запрос для выборки записей из БД
$sql='SELECT * FROM std_941.form LIMIT '.$diapazon.', 1';
if ($_GET['sort'] == 'fam')
$sql='SELECT * FROM std_941.form ORDER BY qu1 LIMIT '.$diapazon.', 1';
if ($_GET['sort'] == 'birth')
$sql='SELECT * FROM std_941.form ORDER BY qu1 LIMIT '.$diapazon.', 1';
$sql_res=mysqli_query($mysqli, $sql);
$ret='<h1>Создание сессии</h1>
<p><a href="destroy.php">Закрыть сессию</a></p><form class="form-control" name="form_sess" method="post" action="">'; // строка с будущим контентом страницы
while( $row=mysqli_fetch_assoc($sql_res) ) // пока есть записи
{
$ret.='

<label for="first">'.$row['1q'].'</label>
<input class="form-control" type="text" id="first" name="first" placeholder="Первый вопрос">
<label for="second">'.$row['2q'].'</label>
<input class="form-control" type="text" id="first" name="first" placeholder="Второй вопрос">
<label for="third">'.$row['3q'].'</label>
<input class="form-control" type="text" id="third" name="third" placeholder="Третий вопрос">
<label for="fourth">'.$row['4q'].'</label>
<input class="form-control" type="text" id="fourth" name="fourth" placeholder="Четвертый вопрос">
<label>'.$row['5q'].'</label>
<input class="form-control" type="radio" id="Choice1" name="choice" value="'.$row['6q'].'">
<label for="Choice1">'.$row['6q'].'</label>
<input class="form-control" type="radio" id="Choice2" name="choice" value="'.$row['8q'].'">
<label for="Choice2">'.$row['8q'].'</label>
<label>'.$row['10q'].'</label>
<input class="form-control" type="checkbox" id="chk1" name="chk1" value="'.$row['11q'].'">
  <label for="chk1">'.$row['11q'].'</label>
  <input class="form-control" type="checkbox" id="chk2" name="chk2" value="'.$row['13q'].'">
  <label for="chk3">'.$row['13q'].'</label>
  <input class="form-control" type="checkbox" id="chk3" name="chk3" value="'.$row['15q'].'">
  <label for="chk1">'.$row['15q'].'</label>
';
}
$ret.='</form>'; // заканчиваем формирование таблицы с контентом
if( $PAGES>1 ) // если страниц больше одной – добавляем пагинацию
{
$ret.='<div id="pages">Выберите страницу: '; // блок пагинации
for($i=0; $i<$PAGES; $i++) // цикл для всех страниц пагинации
if( $i != $page ) // если не текущая страница
$ret.='<a href="?p=viewer&pg='.$i.'&sort='.$_GET['sort'].'"> '.($i+1).'</a>';
else // если текущая страница
$ret.='<span> '.($i+1).'</span>';
$ret.='</div>';
}
return $ret; // возвращаем сформированный контент
}
// если запрос выполнен некорректно
return 'Неизвестная ошибка'; // возвращаем сообщение
} 
?>
