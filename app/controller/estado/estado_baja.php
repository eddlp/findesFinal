<?php
    use app\repository\EstadoRepository;
    require_once('../../repository/EstadoRepository.php');
    require_once('../../repository/Connection.php');
    $id = $_GET['id'];
    $estadoRepository = new EstadoRepository();
    $estadoRepository->delete($id);
    header("location: ../../est_list.php");
?>
