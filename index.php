<!DOCTYPE html>
<html>
<head>
<title>Forms</title>
<html lang="en">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet"> 
</head>
<body>
<header>
<h1>Создание формы(для администратора)</h1>
</header>
<main>


<form class="form-control" name="form_add" method="post" action="">
<label for="adminpassword">Введите пароль, если вы админ</label>
<input class="form-control" id="adminpassword" type="password" name="adminpassword" placeholder="Введите пароль">
<input type="submit" name="button" class="form-control" value="Ну ка проверим"> 
</form>


<?php
$rightpass='iamanadmin';
$adminpassword = $_POST['adminpassword'];
$adminpassword = (string)$_POST['adminpassword'];
if( mysqli_connect_errno() ) // проверяем корректность подключения
echo 'Ошибка подключения к БД: '.mysqli_connect_error();
// если были переданы данные для добавления в БД
if( isset($_POST['button']) && $_POST['button']== 'Ну ка проверим')
{ 
    if ($rightpass==$_POST['adminpassword']){
        echo '
        <form class="form-control" name="form_sess" method="post" action="">
        <label for="1q">Первый вопрос</label>
        <input class="form-control" type="text" id="1q" name="1q" placeholder="Первый вопрос">
        <label for="2q">Второй вопрос</label>
        <input  class="form-control" id="2q" type="text" name="2q" placeholder="Второй вопрос">
        <label for="3q">Третий вопрос</label>
        <input class="form-control" type="text" id="3q" name="3q" placeholder="Третий вопрос">
        <label for="4q">Четвертый вопрос</label>
        <input class="form-control" type="text" id="4q" name="4q" placeholder="Четвертый вопрос">
        <label for="5q">Пятый вопрос</label>
        <input class="form-control" type="text" id="5q" name="5q" placeholder="Пятый вопрос">
        <label for="6q">Первый вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="6q" name="6q">
        <label for="7q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="7q" name="7q">
        <label for="8q">Второй вариант ответа на 5 вопрос</label>
        <input class="form-control" type="text" id="8q" name="8q">
        <label for="9q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="9q" name="9q">
        <label for="10q">Шестой вопрос</label>
        <input class="form-control" type="text" id="10q" name="10q" placeholder="Шестой вопрос">
        <label for="11q">Первый вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="11q" name="11q">
        <label for="12q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="12q" name="12q">
        <label for="13q">Второй вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="13q" name="13q">
        <label for="14q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="14q" name="14q">
        <label for="15q">Третий вариант ответа на 6 вопрос</label>
        <input class="form-control" type="text" id="15q" name="15q">
        <label for="16q">Его цена(баллы)</label>
        <input class="form-control" type="text" id="16q" name="16q">
        <input type="submit" name="buttonupdate" class="form-control" value="Создать форму" > 
        </form>
        </div>
        ';
    }
}
?>
</main>

<footer>
<h3>Экзамен по PHP. Османова Карина, 191-321</h3>
</footer>
</body>
</html>
