<?php
require_once('secure/connect.php');


function allLogs(): array
{
    GLOBAL $pdo;        
    $logs = $pdo->
    query('SELECT * FROM gegevens ORDER BY id DESC')   
    ->fetchAll(PDO::FETCH_ASSOC);  
    return $logs;
}

function getLog(int $id): array
{
    GLOBAL $pdo;       //een prepare statement is een statement die een template maakt en naar de database stuurt bepaalde waardes worden niet gespcifceerd parameters genoemd. (aangeduid met een "?)
    $statement = $pdo->prepare('SELECT * FROM gegevens WHERE id = ? LIMIT 1'); // Nog een SELECT query, maar dan als prepared statement
    $statement->execute(
        [
            $id         // Hier geef je je $id door voor je prepared statement hier boven
        ]
    );
    
    return $statement->fetch(PDO::FETCH_ASSOC); 
}

function saveLog() {
    $datum = filter_input(INPUT_POST, 'datum',FILTER_SANITIZE_SPECIAL_CHARS);
    $onderwerp = filter_input(INPUT_POST,'onderwerp',FILTER_SANITIZE_SPECIAL_CHARS);
    $hoe = filter_input(INPUT_POST, 'hoe',FILTER_SANITIZE_SPECIAL_CHARS);
    $stappen = filter_input(INPUT_POST, 'stappen',FILTER_SANITIZE_SPECIAL_CHARS);
    $evaluatie = filter_input(INPUT_POST, 'evaluatie',FILTER_SANITIZE_SPECIAL_CHARS);
    $vakken_id = filter_input(INPUT_POST,'vak',FILTER_VALIDATE_INT);

    if(is_string($datum)&& is_string($onderwerp) && is_string($hoe) && is_string($stappen) && is_string($evaluatie)   && is_string($datum) && is_int($vakken_id) 
    && !empty($onderwerp) && !empty($hoe) && !empty($stappen) && !empty($evaluatie) && !empty($vakken_id>0)){
        GLOBAL $pdo;
        $query="INSERT into gegevens (datum, onderwerp, hoe, stappen, evaluatie, vakken_id) VALUES(:datum, :onderwerp, :hoe, :stappen, :evaluatie, :vakken_id)";
        $statement = $pdo->prepare($query);
        try{
            $result = $statement->execute([':datum'=>$datum, ':onderwerp'=>$onderwerp, ':hoe'=>$hoe, ':stappen'=>$stappen, ':evaluatie'=>$evaluatie, 'vakken_id'=>$vakken_id]);
            if($result){
                return true;
            }
        }
        catch(Exception $e) {
            return false;
            
        }  
    }
    return false;
}   

    function deleteLog(): bool
    {
        GLOBAL $pdo;
        $id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        if($id){
            $statement=$pdo->prepare('DELETE FROM gegevens WHERE id = :id');
            $statement->bindParam(':id',$id);
            try{
                $result = $statement->execute();
                return $result;
            }
            catch(Exception $epdo){
                return false;
            }
        }
        // $query=('DELETE FROM gegevens WHERE id = :id');
        // $statement = $pdo -> prepare($query);
        // $statement -> bindParam(':id', 11);
        // $statement -> execute();
    }
    function selectSingleLog(){
        GLOBAL $pdo;
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $stmt = $pdo->prepare('SELECT * FROM gegevens WHERE id = :id');
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result)==1){
            return $result[0];
        }
        else{
            return false;
        }
    }

    function updateLog(){

        $id=filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
        $datum = filter_input(INPUT_POST,'datum',FILTER_SANITIZE_SPECIAL_CHARS);
        $onderwerp = filter_input(INPUT_POST,'onderwerp',FILTER_SANITIZE_SPECIAL_CHARS);
        $hoe = filter_input(INPUT_POST,'hoe',FILTER_SANITIZE_SPECIAL_CHARS);
        $stappen = filter_input(INPUT_POST,'stappen',FILTER_SANITIZE_SPECIAL_CHARS);
        $evaluatie = filter_input(INPUT_POST,'evaluatie',FILTER_SANITIZE_SPECIAL_CHARS);
        $vakken_id = filter_input(INPUT_POST,'vak',FILTER_VALIDATE_INT);
        if(is_string($datum) && is_string($onderwerp) && is_string($hoe) && is_string($stappen) && is_string($evaluatie) && is_string($vakken_id)
        &&(!empty($datum) && !empty($onderwerp) && !empty($hoe)  && !empty($stappen) && !empty($evaluatie) && !empty($vakken_id>0))){
        GLOBAL $pdo;
        $query='UPDATE `gegevens` SET `uitleg` = :uitleg, `datum` = :datum,`onderwerp` = :onderwerp, `hoe` = :hoe, `stappen` = :stappen, `evaluatie` = :evaluatie, `vakken_id` = :vakken_id WHERE `gegevens`.`id` = :id;';
        $statement=$pdo->prepare($query);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':datum',$datum);
        $statement->bindParam(':onderwerp',$onderwerp);
        $statement->bindParam(':hoe',$hoe);
        $statement->bindParam(':stappen',$stappen);
        $statement->bindParam(':evaluatie',$evaluatie);
        $statement->bindParam(':vak',$vakken_id);
        try{
        $result = $statement->execute();
        return $result;
        }
        catch(Exception $epdo){
        return false;
        }
    }
}

    function getVakkenDB(){
        GLOBAL $pdo;
        $stmt = $pdo->query('SELECT * FROM vakken');
        $vakken = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($vakken);DIE;
        return $vakken;
    }

?>