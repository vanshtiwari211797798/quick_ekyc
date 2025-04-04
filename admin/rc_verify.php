<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RC Verification</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --accent: #8b5cf6;
            --background: #f8fafc;
            --text: #1e293b;
            --card-bg: #ffffff;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
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
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>RC Verification</h2>
        <div class="input-group">
            <input 
                type="text" 
                id="rc_number" 
                placeholder="Enter RC number"
                autocomplete="off"
                maxlength="100"
                required=""
            >
        </div>
        
          <button onclick="verifyRC()">
            Verify Identity
            <span class="button-loader hidden"></span>
        </button>
    </div>
    
    <script>
        function verifyRC() {
            let rcNumber = document.getElementById("rc_number").value.trim();
            if (rcNumber === "") {
                Swal.fire("Error", "Please enter an RC number!", "error");
                return;
            }

            fetch("verify_rc.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ id_number: rcNumber })
            })
            .then(response => response.json())
            .then(data => {
                console.log("API Response:", data); // ✅ Debugging

                if (data.error) {
                    Swal.fire("Error", data.error, "error");
                    return;
                }


                let details = data.data;
                Swal.fire({
                    title: "RC Verified",
                    html: `
                        <b>Owner:</b> ${details.owner_name || "N/A"} <br>
                        <b>Father Name:</b> ${details.father_name || "N/A"} <br>
                        <b>Vehicle Model:</b> ${details.maker_model || "N/A"} <br>
                        <b>Fuel Type:</b> ${details.fuel_type || "N/A"} <br>
                        <b>RC Status:</b> ${details.rc_status || "N/A"} <br>
                        <b>Chassis Number:</b> ${details.vehicle_chasi_number || "N/A"} <br>
                        <b>Engine Number:</b> ${details.vehicle_engine_number || "N/A"} <br>
                        <b>Puc Number:</b> ${details.vehicle_pucc_number|| "N/A"} <br>
                        <b>Color:</b> ${details.color || "N/A"} <br>
                        <b>Registered At:</b> ${details.registered_at || "N/A"} <br>
                        <b>Permanent Address:</b> ${details.permanent_address || "N/A"} <br>
                        <b>Insurance Valid Upto:</b> ${details.insurance_upto || "N/A"} <br>
                    `,
                    icon: "success"
                });
            })
            .catch(error => {
                console.error("Fetch Error:", error);
                Swal.fire("Error", "Server Error! Please try again later.", "error");
            });
        }
    </script>
</body>
</html>
