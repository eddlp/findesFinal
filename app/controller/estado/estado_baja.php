<?php
    use app\repository\EstadoRepository;
    require_once('../../repository/EstadoRepository.php');
    $id = $_GET['id'];
    $estadoRepository = new EstadoRepository();
    $estadoRepository->delete($id);
    header("location: ../../est_list.php");
?>
