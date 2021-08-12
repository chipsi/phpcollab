<?php

try {
    $supportRequests = $container->getSupportLoader();
    $teams = $container->getTeams();
} catch (Exception $exception) {
    $logger->error('Exception', ['Error' => $exception->getMessage()]);
}

$mail = $container->getNotification();

$mail->getUserinfo($session->get("id"), "from", $logger);
$num = $request->query->get('num');

$strings = $GLOBALS["strings"];

$requestDetail = $supportRequests->getSupportRequestById($num);

if ($supportType == "team") {


    $listTeam = $teams->getTeamByProjectId($requestDetail["sr_project"]);

    foreach ($listTeam as $teamMember) {
        $mail->partSubject = $strings["support"] . " " . $strings["support_id"];
        if ($session->get("id") == $teamMember["tea_mem_id"]) {
            $mail->partMessage = $strings["noti_support_request_new2"];
            $subject = $mail->partSubject . ": " . $requestDetail["sr_id"];
            $body = $mail->partMessage . "";
            $body .= "" . $requestDetail["sr_subject"] . "";
        } else {
            $mail->partMessage = $strings["noti_support_team_new2"];
            $subject = $mail->partSubject . ": " . $requestDetail["sr_id"];
            $body = $mail->partMessage . "";
            $body .= "" . $requestDetail["sr_pro_name"] . "";
        }

        $body .= "\n\n" . $strings["id"] . " : " . $requestDetail["sr_id"] . "\n" . $strings["subject"] . " : " . $requestDetail["sr_subject"] . "\n" . $strings["status"] . " : " . $requestStatus[$requestDetail["sr_status"]] . "\n" . $strings["details"] . " : ";
        if ($teamMember["tea_mem_profil"] == 3) {
            $body .= "$root/general/login.php?url=projects_site/home.php%3Fproject=" . $requestDetail["sr_project"] . "\n\n";
        } else {
            $body .= "$root/general/login.php?url=support/viewrequest.php%3Fid=$num \n\n";
        }
        if ($teamMember["tea_mem_email_work"] != "") {
            $mail->Subject = $subject;
            $mail->Priority = "3";
            $mail->Body = $body;
            try {
                $mail->AddAddress($teamMember["tea_mem_email_work"], $teamMember["tea_mem_name"]);
                $mail->Send();
                $mail->ClearAddresses();
            } catch (\PHPMailer\PHPMailer\Exception $e) {
                $logger->critical('PHPMailer: ' . $e->getMessage());
            }
        }
    }
} else {
    $userDetail = $members->getMemberById(1);

    if ($userDetail["mem_email_work"] != "") {
        $mail->partSubject = $strings["support"] . " " . $strings["support_id"];
        $mail->partMessage = $strings["noti_support_request_new2"];
        $subject = $mail->partSubject . ": " . $requestDetail["sr_id"];
        $body = $mail->partMessage . "";
        $body .= "" . $requestDetail["sr_subject"] . "";

        $body .= "\n\n" . $strings["id"] . " : " . $requestDetail["sr_id"] . "\n" . $strings["subject"] . " : " . $requestDetail["sr_subject"] . "\n" . $strings["status"] . " : " . $requestStatus[$requestDetail["sr_status"]] . "\n" . $strings["details"] . " : ";
        $body .= "$root/general/login.php?url=support/viewrequest.php%3Fid=$num \n\n";

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
    }
}
