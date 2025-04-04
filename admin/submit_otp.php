<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['request_id']) || !isset($data['otp'])) {
    echo json_encode(["error" => "Request ID and OTP are required"]);
    exit;
}

$requestId = $data['request_id'];
$otp = $data['otp'];

$apiUrl = "https://api.quickekyc.com/api/v1/aadhaar-v2/submit-otp";
$apiKey = "06e32709-a744-4eca-8e8f-827ff418cb59";

$requestData = json_encode([
    "key" => $apiKey,
    "request_id" => $requestId,
    "otp" => $otp
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
    echo $response;
} else {
    echo json_encode(["error" => "Failed to verify OTP"]);
}
?>
