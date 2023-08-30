<section class="pagination">
        <center>
            <ul>
                <?php
                $pages =  ceil(count($resulAll) / $porPagina);

                if (($pagina == 1)) {
                ?>
                    <li><a class="no-link" onclick="changePagination('<?php echo ($pagina - 1) ?>','<?php echo $url ?>','<?php echo $html ?>')">
                            << </a>
                    </li>

                <?php

                } else {

                ?>
                    <li><a onclick="changePagination('<?php echo ($pagina - 1) ?>','<?php echo $url ?>','<?php echo $html ?>')"><i class="icon-circle-left"></i></a></li>
                    <?php

                }

                for ($i = 1; $i <= $pages; $i++) {

                    if ($pagina == $i) {

                    ?>

                        <li><a class="active" onclick="changePagination('<?php echo $i ?>','<?php echo $url ?>','<?php echo $html ?>')"><?php echo $i ?></a></li>

                    <?php

                    } else {

                    ?>
                        <li><a onclick="changePagination('<?php echo $i ?>','contigenciaRestart','<?php echo $html ?>')"><?php echo $i ?></a></li>

                    <?php

                    }
                }

                if ($pagina == $pages) {


                    ?>
                    <li><a class="no-link" onclick="changePagination('<?php echo ($pagina + 1) ?>','<?php echo $html ?>','<?php echo $html ?>')"><i class="icon-circle-right"></i></a></li>
                <?php

                } else {


                ?>

                    <li><a onclick="changePagination('<?php echo ($pagina + 1) ?>','<?php echo $html ?>','<?php echo $html ?>')">>></a></li>
                <?php

                }

                ?>

            </ul>
        </center>
    </section>