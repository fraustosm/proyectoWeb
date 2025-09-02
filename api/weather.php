<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../includes/cache.php';

use GuzzleHttp\Client;
use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$apiKey = $_ENV['OPENWEATHER_KEY'] ?? '';
$city = $_GET['city'] ?? ($_ENV['CITY'] ?? 'Guadalajara');
$key = 'weather_' . $city;

$cached = cache_get($key);
if ($cached && cache_valid($cached)) {
    header('Content-Type: application/json');
    echo json_encode(['ok' => true, 'source' => 'cache', 'data' => $cached['data']]);
    exit;
}

$client = new Client();
try {
    $res = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather', [
        'query' => [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
            'lang' => 'es'
        ],
        'timeout' => 5
    ]);
    $data = json_decode($res->getBody()->getContents(), true);
    cache_set($key, $data, 300);
    header('Content-Type: application/json');
    echo json_encode(['ok' => true, 'source' => 'api', 'data' => $data]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => $e->getMessage()]);
}
