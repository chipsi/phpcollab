<?php
#Application name: PhpCollab
#Status page: 3
#Path by root: ../includes/messages.php

switch ($msg) {
    case "demo":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["demo_mode"] . " " . $blockPage->buildLink($urlContact,
                $strings["sourceforge_link"], "out");
        break;

    case "permissiondenied":
        $msgLabel = $strings["no_permissions"];
        break;

    case "logout":
        $msgLabel = $strings["success_logout"];
        break;

    case "noteOwner":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["note_owner"];
        break;

    case "taskOwner":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["task_owner"];
        break;

    case "projectOwner":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["project_owner"];
        break;

    case "email_pwd":
        $msgLabel = $strings["send_password_phrase"];
        break;

    case "deleteTopic":
        $msgLabel = "<b>" . $strings["success"] . "</b> : $num of $num discussions were deleted.";
        break;

    case "closeTopic":
        $msgLabel = "<b>" . $strings["success"] . "</b> : $num of $num discussions were closed.";
        break;

    case "createProjectSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : The project site \"" . $projectDetail["pro_name"] . "\" was successfully created.";
        break;

    case "removeProjectSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["project_site_deleted"];
        break;

    case "addClientToSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["add_user_project_site"];
        break;

    case "removeClientToSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["remove_user_project_site"];
        break;

    case "deleteTeamOwnerMix":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["delete_teamownermix"];
        break;

    case "deleteTeamOwner":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["delete_teamowner"];
        break;

    case "addToSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["add_project_site_success"];
        break;

    case "removeToSite":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["remove_project_site_success"];
        break;

    case "updateFile":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["update_comment_file"];
        break;

    case "addFile":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["add_file_success"];
        break;

    case "deleteFile":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["delete_file_success"];
        break;

    case "add":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["addition_succeeded"];
        break;

    case "delete":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["deletion_succeeded"];
        break;

    case "addReport":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["report_created"];
        break;

    case "deleteReport":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["deleted_reports"];
        break;

    case "addAssignment":
        $assignmentId = $assignments->getLastEntryId();
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["addition_succeeded"] . " | " . $strings["add_optional"] . " " . $blockPage->buildLink("assignmentcomment.php?task=" . $taskDetail["tas_id"] . "&id=$assignmentId",
                "<b>" . $strings["assignment_comment"] . "</b>", "in");
        break;

    case "updateAssignment":
        $assignmentId = $assignments->getLastEntryId();
        unset($lastId);
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["modification_succeeded"] . " " . $strings["add_optional"] . " " . $blockPage->buildLink("assignmentcomment.php?task=" . $taskDetail["tas_id"] . "&id=$assignmentId",
                "<b>" . $strings["assignment_comment"] . "</b>", "in");
        break;

    case "update":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["modification_succeeded"];
        break;

    case "blankUser":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["blank_user"];
        break;

    case "blankClient":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["blank_organization"];
        break;

    case "blankProject":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["blank_project"];
        break;

    case "settingsNotwritable":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["settings_notwritable"];
        break;

    case "updateComment":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["newsdesk_comment_updated"];
        break;


//BEGIN email project users mod
    case "email":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["email_sent"];
        break;
//END email project users mod

    case "postDeleted":
        $msgLabel = "<b>" . $strings["success"] . "</b> : " . $strings["delete_post"];
        break;

    case "clientAddError":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["client_error_add"];
        break;

    case "clientEditError":
        $msgLabel = "<b>" . $strings["attention"] . "</b> : " . $strings["client_error_edit"];
        break;

    case "genericError":
        $msgLabel = "<strong>{$strings["attention"]}</strong> : {$strings["genericError"]}";
        break;

    case "taskNotFoundError":
        $msgLabel = "<strong>{$strings["attention"]}</strong> : {$strings["task_not_found"]}";
        break;

}
