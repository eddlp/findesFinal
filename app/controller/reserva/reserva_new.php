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
$usuario = $usuarioRepository->getOne($_SESSION['id']);
$idPersonaReserva = $usuario->getIdPersona();
//Busco el estado "confirmada"
$estadoRepository = new EstadoRepository();
$estado = $estadoRepository->getOneByName("Confirmada");
$idEstado = $estado->getId();
$fechaDesde = $_POST['fechaDesde'];
$fechaHasta = $_POST['fechaHasta'];
//Calculo el valor
$casaRepository = new CasaRepository();
$casa = $casaRepository->getOne($idCasa);
$precio = $casa->getValor();
$fechaHasta = new DateTime();
$intervalo = $fechaHasta->diff($fechaDesde,true);
$dias = $intervalo->d;
$valor = $dias * $precio;
$observacion = $_POST['observacion'];
//Creo la reserva
$reserva = new Reserva();
$reserva->setIdCasa($idCasa);
$reserva->setIdPersonaReserva($idPersonaReserva);
$reserva->setIdEstado($idEstado);
$reserva->setFechaDesde($fechaDesde);
$reserva->setFechaHasta($fechaHasta);
$reserva->setValor($valor);
$reserva->setObservacion($observacion);
//Guardo la reserva
$reservaRepository = new ReservaRepository();
$reservaRepository->insert($reserva);
header("location: ../../catalogo.php");
?>
