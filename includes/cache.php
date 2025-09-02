<?php
function cache_get($key) {
    $file = __DIR__ . '/../cache/' . md5($key) . '.json';
    if (!file_exists($file)) return null;
    $json = file_get_contents($file);
    return json_decode($json, true);
}

function cache_set($key, $value, $ttl = 300) {
    $file = __DIR__ . '/../cache/' . md5($key) . '.json';
    $payload = ['ts' => time(), 'ttl' => $ttl, 'data' => $value];
    file_put_contents($file, json_encode($payload));
}

function cache_valid($payload) {
    if (!$payload) return false;
    return (time() - $payload['ts']) < $payload['ttl'];
}
