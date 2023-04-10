<?php

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

                <td><?php echo $v['id_user']  ?></td>
                <td><?php echo $v['username']  ?></td>
                <td><?php echo $v['first_name'] . '  ' . $v['last_name']  ?></td>
                <td><?php echo $v['user_corporate'] ?></td>
                <td><?php echo $v['email'] ?></td>
                <td><?php echo $v['phone']  ?></td>
                <td><a class="button" href="#modal1" onclick="asigID(<?php echo $v['id_user'] ?>,'deleteUser')">eliminar</a></td>
            <?php

        }
            ?>


            </tr>

    </tbody>
</table>