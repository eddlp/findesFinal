<?php
use app\model\Reserva;
use app\repository\CasaRepository;
use app\repository\EstadoRepository;
use app\repository\ReservaRepository;
use app\repository\UsuarioRepository;

require_once('../../repository/ReservaRepository.php');
require_once('../../repository/UsuarioRepository.php');
require_once('../../repository/EstadoRepository.php');
require_once('../../repository/CasaRepository.php');
require_once('../../repository/Connection.php');
require_once('../../model/Reserva.php');
require_once('../../model/Usuario.php');
require_once('../../model/Estado.php');
require_once('../../model/Casa.php');

$idCasa = $_POST['idCasa'];
//Busco la persona logueada
$usuarioRepository = new UsuarioRepository();
$usuario = $usuarioRepository->getOne($_POST['idUsuario']);
$idPersonaReserva = $usuario->getIdPersona();
//Busco el estado "confirmada"
$estadoRepository = new EstadoRepository();
$estado = $estadoRepository->getOneByName("Confirmada");
$idEstado = $estado->getId();
//Calculo el valor
$casaRepository = new CasaRepository();
$casa = $casaRepository->getOne($idCasa);
$precio = $casa->getValor();
//Calculo los dias de la reserva
$fechaDesde = $_POST['fechaDesde'];
$fechaHasta = $_POST['fechaHasta'];
$fechaDesde=strtotime($fechaDesde);
$fechaHasta=strtotime($fechaHasta);
$segundos = $fechaHasta - $fechaDesde;
$horas = $segundos / 3600;
$dias = $horas / 24;
$valor = $dias * $precio;
//Creo la reserva
$reserva = new Reserva();
$reserva->setIdCasa($idCasa);
$reserva->setIdPersonaReserva($idPersonaReserva);
$reserva->setIdEstado($idEstado);
$reserva->setFechaDesde($fechaDesde);
$reserva->setFechaHasta($fechaHasta);
$reserva->setValor($valor);
$reserva->setObservacion(null);
////Guardo la reserva
$reservaRepository = new ReservaRepository();
$reservaRepository->insert($reserva);

$test=$reserva->getFechaDesde();
header("Content-type:application/json");

echo json_encode($test);
