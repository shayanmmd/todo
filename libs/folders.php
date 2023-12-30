<?php

function getFolders()
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $query = "Select * From folders where user_id = $currentUserId";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(pdo::FETCH_OBJ);
}

function deleteFolder($folderId)
{
    global $pdo;
    $query = "delete From folders where id = :folderId";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['folderId' => $folderId]);
    if ($stmt->rowCount()!=0) {        
        deleteAllTasksOfFolder($folderId);
        // deleteTask()
    }
    return $stmt->rowCount();
}

function addFolder($folderName)
{
    global $pdo;
    $currentUserId = getCurrentUserId();
    $query = "insert into folders (name,user_id) values (:name,:user_id)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([":name" => $folderName, ":user_id" => $currentUserId]);
    return $stmt->rowCount();
}
