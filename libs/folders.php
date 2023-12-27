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
    $stmt->execute(['folderId'=>$folderId]);    
    return $stmt->rowCount();
}
