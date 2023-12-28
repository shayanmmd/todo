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
