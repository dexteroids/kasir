<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Project Candi Digital</title>
    <link rel="stylesheet" href="css/static_page.css">
</head>
<body>
    <div class="container">
        <h1>Kelas G: Kelompok Candi Digital</h1>
        <div class="team">
            <div class="team-member">
                <img src="assets/img/person1.jpg" alt="Person 1">
                <div class="info">
                    <h2>Daniel Pijalu</h2>
                    <p>Niel is a software engineer student with over 21 years of experience in web development (He is 20 btw!).</p>
                </div>
            </div>
            <div class="team-member">
                <img src="assets/img/person2.jpg" alt="Person 2">
                <div class="info">
                    <h2>Riky Mengko</h2>
                    <p>Iky is a talented programmer who brings creativity and passion to every project. He enjoys gaming in his free time.</p>
                </div>
            </div>
            <div class="team-member">
                <img src="assets/img/person3.jpeg" alt="Person 3">
                <div class="info">
                    <h2>Solideo Dajoh</h2>
                    <p>Deo is a project manager with a knack for organization and team collaboration. He likes reading, and playing the guitar.</p>
                </div>
            </div>
        </div>
        <a href="login.php">Login</a>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas G: Kelompok Candi Digital</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 80%;
            max-width: 800px;
        }

        h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .team-profile {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .team-member {
            width: 20%; /* adjust the width to your liking */
            margin: 20px;
            background-color: #f7f7f7;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member h2 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
        }

        .team-member p {
            color: #555;
            line-height: 1.6;
        }

        .login-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kelas G: Kelompok Candi Digital</h1>
        <div class="team-profile">    
        <div class="team-member">
            <img src="assets/img/person1.jpg" alt="Daniel Pijalu">
            <h2>Daniel Pijalu</h2>
            <p>Niel is a software engineer student with over 21 years of experience in web development (He is 20 btw!).</p>
        </div>

        <div class="team-member">
            <img src="assets/img/person2.jpg" alt="Riky Mengko">
            <h2>Riky Mengko</h2>
            <p>Iky is a talented programmer who brings creativity and passion to every project. He enjoys gaming in his free time.</p>
        </div>

        <div class="team-member">
            <img src="assets/img/person3.jpeg" alt="Solideo Dajoh">
            <h2>Solideo Dajoh</h2>
            <p>Deo is a project manager with a knack for organization and team collaboration. He likes reading, and playing the guitar.</p>
        </div>
    </div>
        <button class="login-button" onclick="location.href='login.php'">Login</button>
    </div>
</body>
</html>