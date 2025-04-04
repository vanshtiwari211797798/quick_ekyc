<?php
header("Content-Type: application/json");

// ✅ Request data receive karo
$data = json_decode(file_get_contents("php://input"), true);
$rc_number = $data['id_number'] ?? null;

if (!$rc_number) {
    echo json_encode(["error" => "RC Number is required"]);
    exit;
}

// ✅ API Configuration
$apiUrl = "https://api.quickekyc.com/api/v1/rc/rc-full";
$apiKey = "06e32709-a744-4eca-8e8f-827ff418cb59";

$requestData = json_encode([
    "key" => $apiKey,
    "id_number" => $rc_number
]);

// ✅ cURL Setup
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

// ✅ API Response Debugging
file_put_contents("log.txt", "HTTP Code: $httpCode\nResponse: $response\nError: $curlError\n", FILE_APPEND);

if ($httpCode !== 200 || !$response) {
    echo json_encode([
        "error" => "Failed to fetch data from API",
        "http_code" => $httpCode,
        "curl_error" => $curlError,
        "api_response" => $response
    ]);
    exit;
}

// ✅ Success Response
echo $response;
?>
