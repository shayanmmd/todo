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

function deleteTask($taskId)
{
    global $pdo;
    $query = "delete from tasks where id = :taskId";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":taskId" => $taskId]);
    return $stmt->rowCount();
}

function taskDone($taskId, $taskStatus)
{
    global $pdo;
    $query = "update tasks set is_done = :taskStatus where id=:id";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":taskStatus" => $taskStatus, "id" => $taskId]);
    return $stmt->rowCount();
}

function deleteAllTasksOfFolder($folderId)
{
    $rowCount = null;
    do {
        global $pdo;
        $query = "delete from tasks where folder_id = :folderId";
        $stmt = $pdo->prepare($query);
        $stmt->execute([":folderId" => $folderId]);
        $rowCount = $stmt->rowCount();
    } while ($rowCount);
}
