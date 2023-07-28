<?php
require 'layout/navbar.php';
if (isset($success)) {
?>
    <div class="info " style="margin-left: 70%;"><b><?= $success ?></b></div>
<?php
}
?>


<div class="spanMsgInfo">
    <span> <?= $msgInfo ?> </span>
</div>


<div class="eventeServer">

    <fieldset style=" width: 60%; margin-left: 20%;">
        <legend>Proceso Batch:</legend>
        <div style="margin-left: 5%;">
            <h1 style="color: white; text-align: left; margin-bottom: 50px;"> Proceso de validación de servidores esta : <?= $msg ?></h1>
            <h2 style="color: white;margin-left:20px;">Presiona para prender o apagar el proceso</h2><br>
            <form action="/change" method="POST">
                <input style="width: 50%;" type="submit" value="<?= $msg ?>" name="status" />
            </form>
        </div>
    </fieldset>
</div>
<?php

require 'layout/footer.php';
?>