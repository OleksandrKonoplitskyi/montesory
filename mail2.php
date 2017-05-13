<?php
$response = array();

/* Здесь проверяется существование переменных */
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

else {
    $response['status'] = false;
    $response['msg'] = "Ошибка отправки";
    die(json_encode($response));
}

/* Сюда впишите свою эл. почту */
$address = "konoplitsky91@gmail.com";
//$address = "arkadiy@qq.com";

/* А здесь прописывается текст сообщения, \n - перенос строки */
$mes = "
            Тема: Заказ обратного звонка!
            Имя: $name
            Телефон: $phone";

/* А эта функция как раз занимается отправкой письма на указанный вами email */
$sub = 'Новая заявка с ' . $_SERVER['HTTP_HOST']; //сабж
$email = 'no-reply@'.$_SERVER['HTTP_HOST']; // от кого

$send = mail($address, $sub, $mes, "Content-type:text/plain; charset = utf-8\r\nFrom:$email");

if ($send) {
    $response['status'] = true;
    $response['msg'] = "Ваше сообщение успешно отправлено!<Br> Вы получите ответ в ближайшее время<Br> ";
} else {
    $response['status'] = false;
    $response['msg'] = "Ошибка отправки";
}
echo json_encode($response);

?>