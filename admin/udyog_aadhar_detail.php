<?php
session_start();
include('config.php');
// include("includes/database.php");
// $minusRs = false;
// $userEmail = isset($_SESSION['emailid']) ? $_SESSION['emailid'] : '';
// if($minusRs){
//     $sql="UPDATE usertable SET walletamount=walletamount-10 WHERE emailid = '$userEmail'";
//     mysqli_query($conn,$sql);
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UDYOG Verification</title>
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
        <h2>UDYOG AADHAR Verification</h2>
        <div class="input-group">
            <input
                type="text"
                id="udyogAadharNumber"
                placeholder="Enter Udyog Number "
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
            let udyogAadharNumber = document.getElementById("udyogAadharNumber").value.trim();
            if (udyogAadharNumber === "") {
                Swal.fire("Error", "Please enter a Udyog Aadhar Number", "error");
                return;
            }

            fetch("verify_udyog_aadhar.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id_number: udyogAadharNumber
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log("API Response:", data); // ✅ Debugging
                    if (data.data) {

                        Swal.fire({
                            title: "UDYOG Aadhar Details",
                            html: `        
                            <p><strong>UDYAM Number:</strong> ${data.data.uan}</p>
                          <p><strong>Shop Name:</strong> ${data.data.main_details.name_of_enterprise}</p>
                          <p><strong>Building Name:</strong> ${data.data.main_details.name_of_building}</p>
                          <p><strong>Activity Name:</strong> ${data.data.main_details.major_activity}</p>
                          <p><strong>MSME:</strong> ${data.data.main_details.msme_dfo}</p>
                           <p><strong>Phone:</strong> ${data.data.main_details.mobile_number}</p>
                          <p><strong>Applied Date:</strong> ${data.data.main_details.applied_date}</p>
                          <p><strong>Address:</strong> ${data.data.main_details.village} ${data.data.main_details.dic_name} ${data.data.main_details.state}</p>
                         
                        `,
                            icon: "success",
                            width: 500
                        });
                    } else {
                        Swal.fire("Error", "Invalid UDYOG Aadhar Number", "error");
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
<!-- <p><strong>Address:</strong> ${data.data.location_of_plant_details[0].village} ${data.data.location_of_plant_details[0].district} ${data.data.location_of_plant_details[0].state} ${data.data.location_of_plant_details[0].pin}</p>                  -->