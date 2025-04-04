<?php
header("Content-Type: application/json");
$data = json_decode(file_get_contents("php://input"), true);
$upiId = $data['upi_id'];

$apiUrl = "https://api.quickekyc.com/api/v1/bank-verification/upi-verification";
$apiKey = "06e32709-a744-4eca-8e8f-827ff418cb59";

$requestData = json_encode(["key" => $apiKey, "upi_id" => $upiId]);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $requestData);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Agar API response nahi mil raha ya error hai
if ($httpCode !== 200 || !$response) {
    echo json_encode(["error" => "Failed to fetch data from API"]);
    exit;
}

echo $response;
?>
