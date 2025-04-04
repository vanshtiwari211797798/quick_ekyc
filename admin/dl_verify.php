<?php
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DL Verification</title>
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
            text-align: center;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .input-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 0.875rem;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: var(--background);
            margin-bottom: 10px;
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
            position: relative;
        }

        button:hover {
            opacity: 0.9;
        }

        .button-loader {
            display: inline-block;
            width: 14px;
            height: 14px;
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
        <h2>DL Verification</h2>
        <div class="input-group">
            <input
                type="text"
                id="dl_number"
                placeholder="Enter DL number"
                autocomplete="off"
                maxlength="100"
                required>
            <input
                type="date"
                id="dob"
                placeholder="Enter DOB"
                autocomplete="off"
                required>
        </div>
        <button onclick="verifyDL()">
            Verify Identity
            <span class="button-loader hidden" id="loader"></span>
        </button>
    </div>

    <script>
        function verifyDL() {
            let dlNumber = document.getElementById("dl_number").value.trim();
            let dob = document.getElementById("dob").value.trim();
            let loader = document.getElementById("loader");

            if (!dlNumber || !dob) {
                Swal.fire("Error", "Please enter both DL Number and DOB", "error");
                return;
            }

            // Show loader inside button
            loader.classList.remove("hidden");

            fetch("verify_dl.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id_number: dlNumber,
                        dob: dob
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("Response from verify_dl.php:", data); // Debugging ke liye

                    loader.classList.add("hidden");

                    if (data.error) {
                        Swal.fire("Error", data.error, "error");
                    } else {

                        Swal.fire({
                            title: "DL Verified",
                            html: `
                            <b>License Number:</b> ${data.data?.license_number || 'N/A'}<br>
                <b>Name:</b> ${data.data?.name || 'N/A'}<br>
                <b>Father:</b> ${data.data?.father_or_husband_name || 'N/A'}<br>
                <b>State:</b> ${data.data?.state || 'N/A'}<br>
                <b>Gender:</b> ${data.data?.gender || 'N/A'}<br>
                <b>DOB:</b> ${data.data?.dob || 'N/A'}<br>
                <b>Permanent Address:</b> ${data.data?.permanent_address || 'N/A'}<br>
                <b>RTO Office:</b> ${data.data?.ola_name || 'N/A'}<br>
                <b>Issue Date:</b> ${data.data?.doi || 'N/A'}<br>
                <b>Expiry Date:</b> ${data.data?.doe || 'N/A'}
            `,
                            icon: "success"
                        });
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                    Swal.fire("Error", "Something went wrong!", "error");
                });


        }
    </script>
</body>

</html>