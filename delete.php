<?php

    include 'config/database.php';
    
    try
    {
        $sql = "SELECT _itemID, _itemNumber, _type, _scp, _imagePathName, _description, _created, _modified FROM item WHERE _itemID = ? LIMIT 0,1";
        $statement = $conn->prepare($sql);
                    
        $statement->bindParam(1, $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
                    
        //individual values from the record 
        $_itemNumber = $row['_itemNumber'];
        $_itemID = $row['_itemID'];
        $_type = $row['_type'];
        $_scp = $row['_scp'];
        $_imagePathName = $row['_imagePathName'];
        $_description = $row['_description'];
        $_created = $row['_created'];
        $_modified = $row['_modified'];
        
        $oldImagePath = $_imagePathName;
       
    }
    catch(PDOException $exception)
    {
        die('ERROR: ' . $exception->getMessage());
    }
    
    try
    {
        $id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record not found');
    }
    catch(PDOexception $error)
    {
        die('ERROR: ' . $error->getMessage());
    }

    $sql = "DELETE FROM item WHERE _itemID = ?";
    $statement = $conn->prepare($sql);
    $statement->bindParam(1, $id);
    
    array_map('unlink', glob("$_imagePathName"));
    
    if($statement->execute())
    {                        
        header('Location: index.php?action=deleted');
    }
    else
    {
        die('unable to delete record');
    }
    
?>