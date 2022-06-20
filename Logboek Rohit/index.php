<?php
require('view/css.php'); // het neemt alle code in de css.php en kopieert het naar dit bestand.
include ('secure/connect.php'); // het neemt alle code in de connect.php en kopieert het naar dit bestand.
include('model/logModel.php'); // het neemt alle code in de logModel.php en kopieert het naar dit bestand.
include("view/boven.php"); // het neemt alle code in de boven.php en kopieert het naar dit bestand.


if(isset($_GET['action'])){ //de isset functie wordt gebruikt om te bepalen of je een variable niet eerder in je code hebt gebruikt
                            // $_GET wordt hier gebruikt om uit de html formuliergegevens te verzamelen 'action'

    if($_GET['action']=="nieuwlog" ) { // als 'action' gelijk staat aan "nieuwelog" (nieuwelog is als je op de link nieuwelog(button) klikt) activeert die code
        //form ingevuld of nog niet
    

        if(isset($_POST['opslaan'])) //$_POST is ook gebruikt voor formuliergegevens te verzamelen als de formulier methode="post" is 
        {  //runt de code hier als de if klopt.
            $result = saveLog(); // de saveLog() functie, zijn waardes worden in de variable $result gezet.
            allLogs(); // allLogs() zit in mij logModel.php het wordt opgeroepen uit dat document.
            $_POST=null; // $_POST = null,  betekent dat de post 0 (niks) wordt.

        }
        else // als de if false is runt de else.    
        {
            $vakken = getVakkenDB(); // de functie getVakkenDB() wordt hier opgeroepen uit het document logModel.php en in de variable vakken gezet.
            include('view/form.php'); // vanaf hier wordt de form.php geinclude, wat inhoudt dat de code van dat bestand hier "inlaadt".
        

        }
    }
    elseif($_GET['action']=='update' && isset($_GET['id'])){ // als de 'action' aangeklikt wordt uit de form
        if(isset($_POST['update'])){ // als de er op  de update wordt geklikt runt de code in de if statement
            $result=updateLog();
            allLogs(); // een functie die terug leidt naar logModel, het doet wat er staat in die functie.
            $_POST = null; // $_POST = null,  betekent dat de post 0 (niks) wordt.
        }
        else{
            $log = selectSingleLog(); // de selectSingleLog() functie(wat er in de functie staat) gaat in de variable $log
            // $formfunction='update';
            if($log){ // if statement met de variable $log erin(parameter)
                include("view/formUpdate.php"); // het include de formupdate.php als het waar is. het laadt de logs in.
            } else{ // als de statement niet waar is runt dit.
                echo("Log niet gevonden."); // dit laat zien als de if statement niet waar is.
                allLogs(); //allLogs() is een functie die terug leidt naar logModel, het doet wat er staat in die functie.
            }
        }
    }


    elseif($_GET['action']=='delete' && isset($_GET['id'])){ // als je op de action klikt in de form op de delete knop delete het ook de id
        $result = deleteLog(); // deleteLog() functie gaat in de $result variable

        if($result == true){ // runt als $result gelijk is aan true
            echo("Log is verwijderd"); // runt als de if else statement waar is
        }
        else{
            echo("Log kon niet worden verwijderd"); // runt als de if statement niet waar is
        }
    }
}


//     echo'<!-- geen info in de url, laat alle logs zien -->
//     <h2>multidimensionale array</h2>';
$logs = allLogs();// de functie allLogs() gaat in de variable $logs.
include("view/fronted.php"); // het laadt als het ware in de code die in de fronted.php in hier.
include("view/tabel.php"); // het laadt als het ware de code in de tabel.php hier in.
echo '<a href="?action=nieuwlog">Nieuwe Log</a>';// het laat de link zien voor een nieuwe log


?>