<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page with Form</title>
    <style>/* Reset some basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Basic body styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
        }
        
        /* Navbar styling */
        .navbar {
            background-color: #333;
            color: #fff;
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            align-items: center;
        }
        
        .navbar .logo a {
            color: #fff;
            text-decoration: none;
            font-size: 1.5em;
            font-weight: bold;
        }
        
        .navbar .nav-links {
            list-style: none;
        }
        
        .navbar .nav-links li {
            display: inline;
            margin: 0 15px;
        }
        
        .navbar .nav-links li a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            transition: background 0.3s ease;
        }
        
        .navbar .nav-links li a:hover {
            background-color: #555;
            border-radius: 4px;
        }
        
        /* Hero Section */
        .hero {
            background: url('your-image.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
        }
        
        .hero-content h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }
        
        .hero-content p {
            font-size: 1.2em;
        }
        
        /* Form Section */
        .form-section {
            display: flex;
            justify-content: center;
            padding: 50px 20px;
        }
        
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        
        /* Form group styling */
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        .form-group input[type="file"] {
            border: none;
        }
        
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        
        .form-group button:hover {
            background-color: #555;
        }
        </style>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#">YourLogo</a>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

  
    <!-- Form Section -->
    <section class="form-section">
        <div class="form-container">
            <h2>Submit Your Information</h2>
            <form action="{{route('insert.information')}}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Name Field -->
                <input type="hidden" id="name" name="id" value="{{$person->id}}">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name"  value="{{$person->name}}" required>
                </div>

                <!-- Email Field -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email"  value="{{$person->email}}" required>
                </div>

                <!-- Description Field -->
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="text" rows="4"  value="{{$person->text}}" required></textarea>
                </div>

                <!-- Image Upload Field -->
                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input type="file" id="image" name="image" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
      
    </section>
</body>
</html>
