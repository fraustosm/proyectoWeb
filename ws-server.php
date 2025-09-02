<?php
require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use GuzzleHttp\Client;

class WeatherServer implements MessageComponentInterface {
    protected $clients;
    protected $apiKey;

    public function __construct($apiKey) {
        $this->clients = new \SplObjectStorage;
        $this->apiKey = $apiKey;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        $this->sendWeather($conn, 'Culiacán,MX');
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        if (isset($data['city']) && !empty($data['city'])) {
            $city = $data['city'];
            $this->sendWeather($from, $city);
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }

    private function sendWeather(ConnectionInterface $conn, $city) {
        $client = new Client();
        $cacheFile = __DIR__ . "/cache/weather_" . md5(strtolower($city)) . ".json";

        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < 300)) {
            $payload = json_decode(file_get_contents($cacheFile), true);
        } else {
            try {
                $res = $client->get('http://api.weatherapi.com/v1/current.json', [
                    'query' => [
                        'key' => $this->apiKey,
                        'q' => $city,
                        'aqi' => 'no'
                    ],
                    'timeout' => 5
                ]);

                $data = json_decode($res->getBody(), true);

                $payload = [
                    'temp' => $data['current']['temp_c'],
                    'description' => $data['current']['condition']['text'],
                    'humidity' => $data['current']['humidity'],
                    'icon' => $data['current']['condition']['icon']
                ];

                if (!is_dir(__DIR__ . '/cache')) mkdir(__DIR__ . '/cache');
                file_put_contents($cacheFile, json_encode($payload));
            } catch (\Exception $e) {
                $payload = [
                    'temp' => 0,
                    'description' => 'Error',
                    'humidity' => 0,
                    'icon' => ''
                ];
            }
        }

        $conn->send(json_encode($payload));
    }
}

// Configuración
$apiKey = getenv('WEATHERAPI_KEY') ?: 'ca40ef69d0f54a8f96a02432250707';
$port = getenv('WS_PORT') ?: 8080;

$server = IoServer::factory(
    new HttpServer(
        new WsServer(new WeatherServer($apiKey))
    ),
    $port
);

echo "🌐 Servidor WebSocket corriendo en puerto $port\n";
$server->run();
