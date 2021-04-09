<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css ">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Montserrat:wght@200&family=Prata&family=Roboto+Slab&display=swap" rel="stylesheet">
    <title>Welcome</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 20px;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            position: absolute;
            display: flex;
            align-items: center;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            height: 60px;
            margin-bottom: 20px;
            background-color: #333;
        }

        .header_inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header_logo{
            color: #ffffff;
            margin-left: 50px;
            font-family: 'Dela Gothic One', cursive;
            font-size: 40px;
            text-transform: uppercase;
        }

        .nav {
            font-size: 20px;
            text-transform: uppercase;
        }

        .nav_link {
            display: inline-block;
            vert-align: top;
            margin: 0 10px;
            color: #ffffff;
            text-decoration: none;
            transition: color .2s linear;
        }

        .nav_link:hover {
            color: #FF7300;
        }

        h1 {
            color: #FF7300;
            font-size: 30px;
            text-transform: uppercase;
            font-weight: bold;
        }

        .content {
            display: flex;
            padding: 50px;
        }

        .footer {
            position: absolute;
            display: flex;
            justify-content: space-between;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            padding-top: 20px;
            padding-bottom: 20px;
            background-color: #333;
        }

        .footer_inner {
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .footer_info {
            color: #ffffff;
            font-size: 15px;
            flex-basis: 30%;
        }

    </style>
</head>
<body>
<!-- HEADER -->
<div class="header">
    <div class="container">
        <div class="header_inner">
        <div class="header_logo">News</div>
        <nav class="nav">
            <a  class="nav_link" href="">Категория 1</a>
            <a  class="nav_link" href="">Категория 2</a>
            <a  class="nav_link" href="">Категория 3</a>
            <a  class="nav_link" href="">Категория 4</a>
        </nav>
    </div>
    </div>
</div>
</div>
<!-- HEADER -->

<!-- CONTENT -->
<div class="content">
    <div class="container">
        <h1>Hello message</h1>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus id officiis perspiciatis qui veniam. Adipisci error laudantium neque nulla obcaecati officiis praesentium quis quod sapiente. A enim et magnam voluptas voluptatum? Odit pariatur quaerat quia quisquam. A accusamus ad aliquam atque culpa deserunt distinctio dolorum ea eos ex explicabo, facere fugiat, harum incidunt inventore iure laboriosam magni maxime neque nisi officiis porro provident quam quia repudiandae saepe sapiente sit, tempora veniam vero! A, accusamus aspernatur at aut commodi culpa, cum deserunt doloribus ea earum eligendi, eos facilis magnam maxime modi natus nihil nulla quia recusandae rem reprehenderit tenetur unde. Laudantium?</p>
    </div>
</div>
<!-- CONTENT -->

<!-- FOOTER -->
<div class="footer">
    <div class="footer_inner">
<nav class="footer_nav">
        <a  class="nav_link" href="">Категория 1</a> <br>
        <a  class="nav_link" href="">Категория 2</a><br>
        <a  class="nav_link" href="">Категория 3</a><br>
        <a  class="nav_link" href="">Категория 4</a>
</nav>
        <div class="footer_info">
            Новостной сайт — это интернет-издание, специализация которого заключается в сборе и выдаче общетематических новостей или новостных материалов на одну тему.
        </div>
</div>
</div>
<!-- FOOTER -->
</body>
</html>
