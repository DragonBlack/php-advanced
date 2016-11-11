<?php
$admin=0;
//тут может быть еще что-нибудь предварительное
$admin=$_REQUEST['admin'];
if($admin)
{
    //..функционал админа
}
else
{
    //что-то еще
}
//==================================//

$login=$_POST['login'];
$password=$_POST['password'];
//предполагаем соединение с БД установленным
$result=mysqli_query($link, "SELECT user_id FROM users WHERE login=$login AND password=$password");
if(mysql_num_rows($result))
{
    //все хорошо - пользователь найден, выполняем процедуру его логина
}
else
{
    //какая-то ошибка для пользователя
}

//====================================//

$rgResult=array();
$processName=$_POST['processName'];
exec("ps aux | grep ".$processName, $rgResult);
foreach($rgResult as $value)
{
    echo($value."<br>\n");
}
//=================================//

include("database.inc");
//далее работа с БД