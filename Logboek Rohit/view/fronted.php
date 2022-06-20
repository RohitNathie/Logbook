
<body>
 <div class="grid"> <!--Je grid container -->

    <?php

    foreach ($logs as $log) {  
        ?>

        <div class="Logboek">
            <div class="datum"><p><?= htmlentities($log["datum"]) ?></p></div> <!-- Hier zet je dus neer dat je uit $log je $datum wilt halen, zo doe je dit dus ook bij andere dingen   -->
            <div class="id"><p>Log #<?= $log["id"] ?> : <?= htmlentities($log["onderwerp"]) ?></p></div>

            <div class="blok"><p>hoe:</p></div>
            <div class="gedaan"><p> <?= $log["hoe"]?> </p></div>

            <div class="blok"><p>stappen:</p></div>
            <div class="gedaan"><p> <?= $log["stappen"]?> </p></div>

            <div class="blok"><p>Evaluatie:</p></div>
            <div class="gedaan"><p><?= htmlentities($log["evaluatie"]) ?></div>

            <div class="blok"><p>Vak:</p></div>
            <div class="gedaan"><p><?= htmlentities($log["vakken_id"]) ?></div>

        </div> 

        <?php
    }
    
        ?>
        </div>
</div>
</body>
</html>