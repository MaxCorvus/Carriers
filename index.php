<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
require_once 'Autoloader.php';

use Repositories\CarrierRepository;
use Models\TransportServiceCalculator;
use Models\PackGroup;
use Models\TransCompany;

$payload = file_get_contents('php://input');
$requestData = json_decode($payload, true);

$weight = $requestData['weight'];
$carrierSlug = $requestData['slug'];

$carrierRepository = new CarrierRepository();
$packGroup = new PackGroup();
$transCompany = new TransCompany();
$carrierRepository->registerCarrier('transCompany', $transCompany);
$carrierRepository->registerCarrier('packGroup', $packGroup);

$calculator = new TransportServiceCalculator($carrierRepository);
try {
    $result = $calculator->calculatePrice($weight, $carrierSlug);
    header('Content-Type: application/json');
    echo json_encode(['result' => $result]);
} catch (Exception $e) {
    header('Content-Type: application/json', true, 400);
    echo json_encode(['error' => $e->getMessage()]);
}