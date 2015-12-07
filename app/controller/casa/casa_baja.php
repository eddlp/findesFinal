<?php
    use app\repository\CasaRepository;
    require_once('../../repository/CasaRepository.php');
    require_once('../../repository/Connection.php');
    $id = $_GET['id'];
    $casaRepository = new CasaRepository();
    $casaRepository->delete($id);
    header("location: ../../casa_list.php");
?>
