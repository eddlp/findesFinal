<?php

use app\repository\CasaRepository;
require_once('repository/CasaRepository.php');
require_once('repository/Connection.php');
require_once('model/Casa.php');

$casaRepository = new CasaRepository();
$casas = $casaRepository->getAll();
?>

<div class="container principal containerindex">
    <div class="row bienvenida">
        <div class="col-md-5 izq">
            <h1 class="findes">Findes</h1>
            <hr>
            <p class="slogan">Donde vas a encontrar tu casa de fin de semana</p>
        </div>
        <div class="col-md-7 der">
            <h1>Bienvenido a Findes</h1>
            <p>Gracias por visitarnos, en este fantastico sitio web vas a poder encontrar la casa perfecta para vos y pasar un gran momento de descanso.</p>
            <p>Solo queremos darte una calida bienvenida, no te robamos mas tiempo, encontra tu casa ahora!</p>
        </div>
    </div>
    <div class="row destacadas">
        <hr>
        <h2 class="encabezado">Algunas de nuestras casas</h2>
        <hr>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail casas">
                <img class="casa"  src='imagenesCasas/<?php echo($casas[0]->getImg1());?>' alt="imagendecasa">
                <h4 class="detalle">
                    Direcci&oacute;n: <span style="font-size:18px; font-weight: normal;"><?php echo($casas[0]->getDireccion());?></span><br>
                    Capacidad:<span class="item">&nbsp;&nbsp;<?php echo($casas[0]->getCapacidad());?></span><br>
                    Dormitorios:<span class="item">&nbsp;&nbsp;<?php echo($casas[0]->getDormitorios());?></span><br>
                    Ambientes:<span class="item">&nbsp;&nbsp;<?php echo($casas[0]->getAmbientes());?></span><br>
                    Ba&#241;os: <span class="item">&nbsp;&nbsp;<?php echo($casas[0]->getBanios());?></span><br>
                    Superficie:<span class="item">&nbsp;&nbsp;<?php echo($casas[0]->getSuperficie());?> m2</span><br>
                </h4>
                <hr>
                <div class="ver-detalle"><a href="casa_detail.php?idCasa=<?php echo($casas[0]->getId());?>" class="btn btn-primary" role="button">Ver detalle</a></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail casas">
                <img class="casa"  src='imagenesCasas/<?php echo($casas[1]->getImg1());?>' alt="imagendecasa">
                <h4 class="detalle">
                    Direcci&oacute;n: <span style="font-size:18px; font-weight: normal;"><?php echo($casas[1]->getDireccion());?></span><br>
                    Capacidad:<span class="item">&nbsp;&nbsp;<?php echo($casas[1]->getCapacidad());?></span><br>
                    Dormitorios:<span class="item">&nbsp;&nbsp;<?php echo($casas[1]->getDormitorios());?></span><br>
                    Ambientes:<span class="item">&nbsp;&nbsp;<?php echo($casas[1]->getAmbientes());?></span><br>
                    Ba&#241;os: <span class="item">&nbsp;&nbsp;<?php echo($casas[1]->getBanios());?></span><br>
                    Superficie:<span class="item">&nbsp;&nbsp;<?php echo($casas[1]->getSuperficie());?> m2</span><br>
                </h4>
                <hr>
                <div class="ver-detalle"><a href="casa_detail.php?idCasa=<?php echo($casas[1]->getId());?>" class="btn btn-primary" role="button">Ver detalle</a></div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail casas">
                <img class="casa"  src='imagenesCasas/<?php echo($casas[2]->getImg1());?>' alt="imagendecasa">
                <h4 class="detalle">
                    Direcci&oacute;n: <span style="font-size:18px; font-weight: normal;"><?php echo($casas[2]->getDireccion());?></span><br>
                    Capacidad:<span class="item">&nbsp;&nbsp;<?php echo($casas[2]->getCapacidad());?></span><br>
                    Dormitorios:<span class="item">&nbsp;&nbsp;<?php echo($casas[2]->getDormitorios());?></span><br>
                    Ambientes:<span class="item">&nbsp;&nbsp;<?php echo($casas[2]->getAmbientes());?></span><br>
                    Ba&#241;os: <span class="item">&nbsp;&nbsp;<?php echo($casas[2]->getBanios());?></span><br>
                    Superficie:<span class="item">&nbsp;&nbsp;<?php echo($casas[2]->getSuperficie());?> m2</span><br>
                </h4>
                <hr>
                <div class="ver-detalle"><a href="casa_detail.php?idCasa=<?php echo($casas[2]->getId());?>" class="btn btn-primary" role="button">Ver detalle</a></div>
            </div>
        </div>
    </div>
</div>
