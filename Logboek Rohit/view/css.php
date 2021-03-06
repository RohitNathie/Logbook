<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
/* Globaal */

body {
    margin: 0;
    padding: 20px;
    font-family: 'Concert One', cursive;
    background: rgb(9,9,121);
    background: radial-gradient(circle, rgba(9,9,121,1) 35%, rgba(83,185,255,1) 100%); 
}



/* Containers */


.grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    gap: 10px;
    row-gap: 10px;

}

.Logboek {
    background:linear-gradient(336deg, rgba(0,0,255,.8), rgba(0,0,255,0) 70.71%);
    border-radius: 3px;
    border: 2px solid cyan;
    text-align: center;
    
}

/* Binnen Containers */

.id {
    font-size: 20px;
    margin-bottom: 20px;
    margin-top: -20px
    ;
    color: white;
    font-weight: 500;

    text-transform: uppercase;

    color: white;

    letter-spacing: 1.5px;
}

.datum {
    margin: 20px 0px 0px 0px;
    padding: 5px 0px 5px 0px;

    font-size: 17px;


    color: white;

    font-weight: 500;

    
}

.blok {
    display: inline-block;
    color: lightblue;
    font-style: italic;
    font-weight: 900;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    border-bottom: 2px solid rgb(32, 164, 252);
    font-size: 15px;
    padding: 10px 50px 10px 50px;

    border-radius: 5px 5px 0px 0px;
}

.gedaan {
    color: rgb(255, 255, 255);

    padding: 10px 20px 10px 20px;
    border-radius: 3px 3px 3px 3px;
    

    text-align: center;


    font-size: 20px;

}



@media screen and (max-width: 500px) {
    .grid {
        grid-template-columns: 1fr;
        row-gap: 50px;

    }

}

@media screen and (max-width: 900px) and (min-width:500px){
    .grid {
        grid-template-columns: 1fr 1fr;
        row-gap: 50px;

    }

}


</style>
<body>
    
</body>
</html>