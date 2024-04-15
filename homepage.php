<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AptiTrainer</title>
    <link rel="stylesheet" href="resources/CSS/homepage.css">
</head>

<style>

    /* Dropdown styling */
    .dropdown {
            margin-top: 20px;
            position: relative;
        }

        .dropdown select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
            width: 100%;
            text-align: center;
            text-align-last: center;
            margin-bottom: 10px; /* Add vertical spacing between options */
        }

        .dropdown select:hover {
            background-color: #2980b9;
        }

        .dropdown select:focus {
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
        }

    .dropdown{
    opacity: 0;
    position: absolute;
    top: 70%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 80%;
    transition: all 0.5s ease-in-out;
    display: flex;
    flex-direction: column;
    gap: 10px; /* Add vertical spacing between options */
}

.card:hover .about,.card:hover .dropdown{
    opacity: 1;
    transition: all 0.5s ease-in-out;
}

</style>

<script>
    function resetDropdown(event) {
        event.stopPropagation();
        document.getElementById('userTypeDropdown').selectedIndex = 0;
    }
</script>

<body class="center">

<div class="card-container"onmouseover="resetDropdown(event)">
    <div class="card">

        <img src="resources/images/study.png" class="card-image ce" alt="logo">

        <h2>Welcome To Apti Trainer</h2>

        <p class="about">
            Explore a wide range of high-quality products, unbeatable deals, and a seamless shopping experience that brings convenience and
            style right to your doorstep.
        </p>

        <div class="dropdown">
                <select onchange="location = this.value;">
                    <option value="#" selected disabled>Select User Type</option>
                    <option value="index.php">Student</option>
                    <option value="admin.html">Admin</option>
                    <option value="expert.html">Expert</option>
                </select>
        </div>


        

</div>

</body>

</html>