<?php
function query($sql,$data=[],$check=false){
    global $conn;
    $result=false;
    try{$statement=$conn->prepare($sql);

        if(!empty($data)){
        $result= $statement->execute($data);
        }
        else{
            $result=$statement->execute();
        }

    }catch(Exception $exp)
    {
    echo $exp->getMessage();
    echo 'file:'.$exp->getFile();
    echo'line:'.$exp->getLine();
    die();
    }
    if($check){

        return $statement;
    }
    return $result;
}
//
function insert($table,$data){
    $key=array_keys($data);
    $truong=implode(',',$key);
    $valuetb=':'.implode(',:',$key);
    $sql='INSERT INTO '.$table.'('.$truong.')'.'VALUES('.$valuetb.')';
   $kq= query($sql,$data);
   return $kq;
}
//
function update($table,$data,$condition=''){
$update='';
foreach($data as $key=>$vaulue){
    $update.=$key.'=:'.$key.',';
}
$update= trim($update,',');
if(!empty($condition)){
$sql='UPDATE '.$table. ' SET '.$update.' WHERE '. $condition;

}
else{
    $sql='UPDATE '. $table. ' SET '.$update;
}
$kq= query($sql,$data);
return $kq;
}

//
function delete($table,$condition=''){
if(empty($condition)){
$sql= 'DELETE FROM '.$table;
}
else{
    $sql='DELETE FROM ' .$table.' WHERE '.$condition;
}
$result=query($sql);
return $result;
}

//
function getRaw($sql){
    $kq= query($sql,'',true);
    if (is_object($kq)){
        $dataFetch=$kq->fetchAll(PDO::FETCH_ASSOC);

    }
    return $dataFetch;
}
function oneRaw($sql){
    $kq= query($sql,'',true);
    if (is_object($kq)){
        $dataFetch=$kq->fetch(PDO::FETCH_ASSOC);

    }
    return $dataFetch;
}

function getRow($sql){
    $kq= query($sql,'',true);
    if (!empty($kq)){
return $kq->rowCount();
    }
}
?>
