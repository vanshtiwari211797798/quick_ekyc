<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aadhaar OTP Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --accent: #8b5cf6;
            --background: #f8fafc;
            --text: #1e293b;
            --card-bg: #ffffff;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --radius: 12px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 1rem;
        }

        .container {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 420px;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            color: var(--primary);
        }

        .input-group {
            margin-bottom: 1.5rem;
        }

        input {
            width: 100%;
            padding: 0.875rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            background: var(--background);
        }

        input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        button {
            width: 100%;
            padding: 0.875rem;
            border: none;
            border-radius: 8px;
            background: var(--primary);
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            opacity: 0.9;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Aadhaar OTP Verification</h2>
        <div class="input-group">
            <input type="text" id="aadhaarNumber" placeholder="Enter Aadhaar Number" required>
        </div>
        <button id="generateOtpButton">Generate OTP</button>

        <div class="input-group hidden" id="otpSection">
            <input type="text" id="otp" placeholder="Enter OTP" required>
        </div>
        <button id="submitOtpButton" class="hidden">Submit OTP</button>
    </div>

    <script>
        let requestId = null; // Store request_id globally

        document.getElementById("generateOtpButton").addEventListener("click", function() {
            let aadhaarNumber = document.getElementById("aadhaarNumber").value.trim();
            if (aadhaarNumber === "") {
                Swal.fire("Error", "Please enter Aadhaar Number", "error");
                return;
            }

            fetch("generate_otp.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id_number: aadhaarNumber
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Generate OTP Response:", data);

                    if (data.success && data.request_id) {
                        requestId = data.request_id; // Store request_id for later use
                        Swal.fire("Success", "OTP Sent Successfully", "success");
                        document.getElementById("otpSection").classList.remove("hidden");
                        document.getElementById("submitOtpButton").classList.remove("hidden");
                    } else {
                        Swal.fire("Error", "Failed to generate OTP", "error");
                    }
                })
                .catch(error => {
                    Swal.fire("Error", "Something went wrong", "error");
                    console.error("Error:", error);
                });
        });

        document.getElementById("submitOtpButton").addEventListener("click", function() {
            let otp = document.getElementById("otp").value.trim();

            if (otp === "" || !requestId) {
                Swal.fire("Error", "OTP and Request ID are required", "error");
                return;
            }

            fetch("submit_otp.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        request_id: requestId,
                        otp: otp
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Submit OTP Response:", data); // Response log करें

                    if (data.data) {
                        Swal.fire({
                            title: "Aadhar Details",
                            html: `
                           <p><strong>Aadhar Number:</strong> ${data.data.aadhaar_number}</p>
                          <p><strong>Name:</strong> ${data.data.full_name}</p>
                          <p><strong>Gender:</strong> ${data.data.gender}</p>
                            <p><strong>DOB:</strong> ${data.data.dob}</p>
                            <p><strong>Father:</strong> ${data.data.care_of}</p>
                            <p><strong>Address:</strong> ${data.data.address.house} ${data.data.address.dist} ${data.data.address.state}</p>
                           <p><strong>Pin Code:</strong>  ${data.data.zip}</p>


                        `,
                            icon: "success",
                            width: 500
                        });
                    } else {
                        Swal.fire("Error", data.message || "Invalid OTP", "error"); // Error मैसेज API से दिखाएं
                    }
                })
                .catch(error => {
                    Swal.fire("Error", "Something went wrong", "error");
                    console.error("Error:", error);
                });
        });
    </script>
</body>

</html>