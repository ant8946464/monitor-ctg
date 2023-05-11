<?php
require_once dirname( __DIR__ ) . '/app/Models/User.php';

use App\Models\User;

$userModel = new User();



?>


<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Usuario Generico</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

        $resul = $userModel->getallColumn();

        foreach ($resul as $k => $v) {

        ?>
            <tr>

                <td data-titulo="Id"><?php echo $v['id_user']  ?></td>
                <td data-titulo="Nombre"><?php echo $v['username']  ?></td>
                <td data-titulo="Apellidos"><?php echo $v['first_name'] . '  ' . $v['last_name']  ?></td>
                <td data-titulo="Usuario Generico"><?php echo $v['user_corporate'] ?></td>
                <td data-titulo="Correo"><?php echo $v['email'] ?></td>
                <td data-titulo="Teléfon"><?php echo $v['phone']  ?></td>
                <td ><a class="button" href="#modal1" onclick="asigID(<?php echo $v['id_user'] ?>,'deleteUser')">eliminar</a></td>
            <?php

        }
            ?>


            </tr>

    </tbody>
</table>