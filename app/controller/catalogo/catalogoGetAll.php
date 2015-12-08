<?php
    header("Content-type:application/json");
    use app\repository\CasaRepository;
    require_once('../../repository/CasaRepository.php');
    require_once('../../model/Casa.php');
    require_once('../../repository/Connection.php');
    $casaRepository = new CasaRepository();
    $coleccionCasas = $casaRepository->getAll();
    $casas = new ArrayObject();
    foreach ($coleccionCasas as $casa){
        $casas->append($casa);
    }


$tennisArray = array('direccion' => 1, 'direccion' => 2,
    'direccion' => 3, 'direccion' => 4);

echo json_encode($casas);
