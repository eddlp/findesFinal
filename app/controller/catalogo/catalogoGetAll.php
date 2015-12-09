<?php
    header("Content-type:application/json");
    use app\repository\CasaRepository;
    require_once('../../repository/CasaRepository.php');
    require_once('../../model/Casa.php');
    require_once('../../repository/Connection.php');

    if(isset($_SESSION['fechaDesde'])) {
        unset($_SESSION['fechaDesde']);
        unset($_SESSION['fechaHasta']);
    }

    $casaRepository = new CasaRepository();
    $coleccionCasas = $casaRepository->getAll();
    $casas = new ArrayObject();
    foreach ($coleccionCasas as $casa){
        $casas->append($casa);
    }
    echo json_encode($casas);
