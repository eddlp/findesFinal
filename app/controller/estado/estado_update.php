<?php
    use app\repository\EstadoRepository;
    use app\model\estado;
    require_once('../../repository/EstadoRepository.php');
    require_once('../../model/Estado.php');
    $estado = new Estado();
    $estado->setNombre($_POST['nombre']);
    $estadoRepository = new EstadoRepository();
    if(isset($_POST['id'])) {
        $estado->setId($_POST['id']);
        $estadoRepository->update($estado);
    } else {
        $estadoRepository->insert($estado);
    }
    header("location: ../../est_list.php");
?>
