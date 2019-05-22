<?php
require_once('functions.php');
require_once('vendor/autoload.php');

$con = connectToDb();

if (!$con) {
    mysqli_connect_error($con);
}
else {
    $query = "SELECT id FROM lot WHERE id_winner IS NULL AND end_date <= NOW()";
    if (!$query) {
        mysqli_error($con);
    }
    $lots_id = selectFromDb($con, $query);
    if (!empty($lots_id)) {
        foreach ($lots_id as $value) {
            $id = $value['id'];
            $query = "SELECT id_user FROM bet WHERE price = (SELECT MAX(price) FROM bet WHERE id_lot = $id) AND id_lot = $id";
            if (!$query) {
                mysqli_error($con);
            }
            $user = selectFromDb($con, $query)[0]['id_user'];
            if (!empty($user)) {
               $query = "UPDATE lot SET id_winner=$user WHERE id=$id";
                mysqli_query($con, $query);
                $query = "SELECT email, name FROM user WHERE id=$user";
                $result = selectFromDb($con, $query)[0];
                $body = template('templates/email.php', $result);
                $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('kalinata0799@gmail.com')
                ->setPassword('vasab1men');
                $message = new Swift_Message('Ваша ставка выиграла');
                $message->setFrom(['kalinata0799@gmail.com' => 'YetiCave']);
                $message->setTo([$result['email'] => $result['name']]);
                $message->setBody($body);
                $message->setContentType('text/html');
                $mailer = new Swift_Mailer($transport);
                $mailer->send($message);
            }

        }
    }

}
