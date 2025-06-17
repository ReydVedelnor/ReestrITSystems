<?php
include "config.php";

//Выбираем из таблицы все группы 
$sql="SELECT * FROM groupes";
$run_sql = $pdo->query($sql);
$groups=[];
if($run_sql->rowCount() > 0){
    $groups = $run_sql->fetchAll(PDO::FETCH_ASSOC);
}else{
    echo "empty";
}

//Находим атрибуты каждой группы
$theList=[];
$sql1="SELECT * FROM atributesAndGroupes";
$run_sql1=$pdo->query($sql1);
if($run_sql1->rowCount() > 0){
    $theList=$run_sql1->fetchAll(PDO::FETCH_ASSOC);
}else{
    echo "empty";
}

$atributes=[];
$oneGroupe=array();
$array=array();
foreach($groups as $grp){
    $oneGroupe["groupeID"]=$grp["id"];
    $oneGroupe["groupeName"]=$grp["groupe_name"];
    foreach($theList as $el){
        if($el['groupe_id']==$grp['id']){
            $id=$el["atribute_id"];
            $sql2="SELECT * FROM atributes WHERE id=$id";
            $run_sql2=$pdo->query($sql2);
            if($run_sql2->rowCount() > 0){
                $atributes[]=$run_sql2->fetch(PDO::FETCH_ASSOC);
            }else{
                echo 'empty';
            }
        }
    }
    $oneGroupe["atributes"]=$atributes;
    $atributes=[];
    $array[]=$oneGroupe;
    $oneGroupe=array();
}
/*if(mysqli_num_rows($run_sql2) > 0){
    while($row=mysqli_fetch_assoc($run_sql2)){
        $atributes[]=$row;
    }
}else{
    echo 'empty';
}*/

header('Content-Type: application/json');
echo json_encode($array,JSON_UNESCAPED_UNICODE);
?>