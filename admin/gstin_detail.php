<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GSTIN Verification</title>
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
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
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
            transition: transform 0.3s ease;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            line-height: 1.3;
            word-break: keep-all;
            padding: 0 1rem;
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
            transition: all 0.3s ease;
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
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        button:hover {
            opacity: 0.9;
        }

        @media (max-width: 480px) {
            .container {
                padding: 1.5rem;
            }

            h2 {
                font-size: 1.25rem;
                padding: 0 0.5rem;
            }
        }

        .button-loader {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 2px solid #fff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.8s linear infinite;
            margin-left: 8px;
        }

        .hidden {
            display: none;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>GSTIN Verification</h2>
        <div class="input-group">
            <input
                type="text"
                id="gstNumber"
                placeholder="Enter GSTIN Number "
                autocomplete="off"
                required="">
        </div>
        <button id="verifyButton">
            Verify Identity
            <span class="button-loader hidden"></span>
        </button>
    </div>


    <script>
        document.getElementById("verifyButton").addEventListener("click", function() {
            let gstNumber = document.getElementById("gstNumber").value.trim();
            if (gstNumber === "") {
                Swal.fire("Error", "Please enter a GSTIN Number", "error");
                return;
            }

            fetch("verify_gstin.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id_number: gstNumber,
                        filing_status_get: true
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data); // ✅ Debugging
                    if (data.data) {

                        Swal.fire({
                            title: "GSTIN Details",
                            html: `
                                  <p><strong>GSTIN:</strong> ${data.data.gstin}</p>
                          <p><strong>Business Name:</strong> ${data.data.business_name}</p>
                          <p><strong>Pan Number:</strong> ${data.data.pan_number}</p>
                          <p><strong>Registration:</strong> ${data.data.date_of_registration}</p>
                          <p><strong>Business Type:</strong> ${data.data.nature_of_core_business_activity_description}</p>
                          <p><strong>Tax-Payer Type:</strong> ${data.data.taxpayer_type}</p>
                          <p><strong>Company Type:</strong> ${data.data.constitution_of_business}</p>
                          <p><strong>Address:</strong> ${data.data.address}</p>
                          
                        `,
                            icon: "success",
                            width: 500
                        });
                    } else {
                        Swal.fire("Error", "Invalid GSTIN Number", "error");
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