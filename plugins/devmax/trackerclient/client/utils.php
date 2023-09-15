<?php
// Enable logging to STDERR

function dump($msg, $data)
{
    if (DEBUG):
        echo $msg;
        var_export($data);
        echo "</br>";
    endif;
}

function dump_to_file($file, $var, $marker = '')
{   // if $marker is not empty then add marker to the beginning of the file
    if ($marker != ''){
    $marker = "###".gmdate('Y-m-d H:i:s')."\tDEBUG"."###\n";
    // $marker added to the beginning of the file
    file_put_contents($file, $marker, FILE_APPEND);
}
    return file_put_contents($file, gmdate('Y-m-d H:i:s')."\t$var\n",FILE_APPEND);
}

// create a new mail client
function mail_init()
{
    $mail = new PHPMailer;

    $mail->isSMTP();

    $mail->Host = 'server115.hosting.reg.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'molotki@fescobalt.com'; // логин от вашей почты
    $mail->Password = 'gE5kP0yA3wbX1lC9'; // пароль от почтового ящика
    $mail->SMTPSecure = 'starttls';
    $mail->Port = '587';

    $mail->CharSet = 'UTF-8';
    $mail->From = 'no-reply@rebyata-molotki.ru'; // адрес почты, с которой идет отправка
    $mail->FromName = 'Сайт rebyata-molotki.ru'; // имя отправителя
    $mail->addAddress('info@rebyata-molotki.ru', 'Дорогой менеджер'); // адрес почты, куда идет отправка
    $mail->addAddress('maxural89@yandex.kz', 'Дорогой менеджер'); // адрес почты, куда идет отправка
    $mail->addAddress('jonhson73@yandex.ru', 'Дорогой менеджер'); // адрес почты, куда идет отправка
    $mail->isHTML(true);
    // debug
    $mail->SMTPDebug = 4;

    return $mail;
}

/***
 * get IP if user even uses proxies
 * @return int|mixed
 */
function get_ip()
{
    $ip = 0;
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

// create a new cUrl client
// TYPE: POST
function curl_client($data)
{
// init curl
    $ch = curl_init(API_URL);
//Encode Data to json
    $json = json_encode($data);
    dump("json data ", $json);
//var_dump($set);
// Attach json data
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
//Set content type
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type:application/json']);
// return response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Exceute the request
    $result = curl_exec($ch);
    curl_close($ch);
    return $result ? true : false;
}