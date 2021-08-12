<?php

try {
    $mail = $container->getNotification();
    $supportRequests = $container->getSupportLoader();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$mail->getUserinfo($session->get("id"), "from", $logger);

$strings = $GLOBALS["strings"];

$requestDetail = $supportRequests->getSupportRequestById($request->query->get('id'));

$userDetail = $members->getMemberById($requestDetail["sr_user"]);

$mail->partSubject = $strings["support"] . " " . $strings["support_id"];
$mail->partMessage = $strings["noti_support_status2"];
$subject = $mail->partSubject . ": " . $requestDetail["sr_id"];
$body = $mail->partMessage . "";

$body .= "\n\n" . $strings["id"] . " : " . $requestDetail["sr_id"] . "\n" . $strings["subject"] . " : " . $requestDetail["sr_subject"] . "\n" . $strings["status"] . " : " . $requestStatus[$requestDetail["sr_status"]] . "\n" . $strings["details"] . " : ";
if ($listTeam->tea_mem_profil[$i] == 3) {
    $body .= "$root/general/login.php?url=projects_site/home.php%3Fproject=" . $requestDetail["sr_project"] . "\n\n";
} else {
    $body .= "$root/general/login.php?url=support/viewrequest.php%3Fid={$request->query->get('num')}\n\n";
}

$mail->Subject = $subject;
$mail->Priority = "3";
$mail->Body = $body;
try {
    $mail->AddAddress($userDetail["mem_email_work"], $userDetail["mem_name"]);
    $mail->Send();
    $mail->ClearAddresses();
} catch (\PHPMailer\PHPMailer\Exception $e) {
    $logger->critical('PHPMailer: ' . $e->getMessage());
}
