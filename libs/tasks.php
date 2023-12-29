<?php

function getTasks($folderId)
{

    global $pdo;
    $currentUserId = getCurrentUserId();
    $whereCondition = (!empty($folderId)) ? "and folder_id=$folderId" : "";
    $query = "select * from tasks where user_id=$currentUserId $whereCondition";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addNewTask($taskTitle, $folderId)
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $query = "insert into tasks (title,folder_id,user_id) values (:title,:folder_id,:user_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":title" => $taskTitle, ":folder_id" => $folderId, "user_id" => $currentUserId]);
    return $stmt->rowCount();
}
