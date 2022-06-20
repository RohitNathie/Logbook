<div class="form">

    <form action="" method="post">
        <label for="datum">datum:</label>
        <input type="date" name="datum" id="datum"><br />
        <label for="onderwerp">onderwerp:</label>
        <input type="text" name="onderwerp" id="onderwerp"><br />
        <label for="hoe">hoe:</label>
        <input type="text" name="hoe" id="hoe" ><br />
        <label for="stappen">stappen:</label>
        <input type="text" name="stappen" id="stappen" ><br />
        <label for="evaluatie">evaluatie:</label>
        <input type="text" name="evaluatie" id="evaluatie"><br />
        <label for="vakken">vak:</label>
        <select name = "vak" id="select">
            <?php foreach($vakken as $vak): ?>
                <option value=<?=$vak['id']?>><?=$vak['naam']?></option>
            <?php endforeach ?>
            </select> <br />

        <input type="submit" value="opslaan" name="opslaan">


</form>
</div>