<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id_number'])) {
    echo json_encode(["error" => "Aadhaar number is required"]);
    exit;
}

$aadhaarNumber = $data['id_number'];
$apiUrl = "https://api.quickekyc.com/api/v1/aadhaar-v2/generate-otp";
$apiKey = "06e32709-a744-4eca-8e8f-827ff418cb59";

$requestData = json_encode([
    "key" => $apiKey,
    "id_number" => $aadhaarNumber
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode === 200) {
    $responseData = json_decode($response, true);
    if (isset($responseData['request_id'])) {
        echo json_encode(["success" => true, "request_id" => $responseData['request_id']]);
    } else {
        echo json_encode(["error" => "Failed to generate OTP"]);
    }
} else {
    echo json_encode(["error" => "API request failed"]);
}
