<!DOCTYPE html>
<html lang="en">

<head>
    <title>Is It Fake?</title>
    <link rel="icon" href="simbol.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <a href="../AboutUs/index.php" class="button">About Us</a>

    <div class="gambarcenter">
        <div><img src="simbol.png" style="width:150px;"></div>
    </div>
    <div class="center">
        <div class="Judul">IsItFake?</div>
    </div><br>

    <div id="searchBarWrap">
        <form method="POST" action="">
            <input id="searchBar" type="text" class="search-query" name="searchbar" placeholder="" />
            <button id="searchBtn" type="submit" name="submit" value="Submit"><i class="fa fa-search"></i></button>
        </form>
    </div>


    <div class="center"><br>
        <div class="Judul1">That account is fake or not? We can Help</div>
        <div class="Judul2">Input dan dapatkan hasil persenan kepalsuan akun instagram</div>
    </div>
    <div class="pattern">
        <div>
            <div class="container">
                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h4></h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h4></h4>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <div class="content">
                            <h4></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="coba"></div>
<?php
    if ($_POST)
	{
        $username = $_POST['searchbar'];
        $url = "https://www.instagram.com/".$_POST['searchbar']."/?__a=1";
        $data = /*htmlspecialchars*/(file_get_contents($url));
        $json_data = json_decode($data, true );
        if($json_data==null){
            session_start();
            $_SESSION['username'] = $_POST['searchbar'];
            header('Location: ../NotFound/index.php');
        }else{
            session_start();
            $_SESSION['username'] = $_POST['searchbar'];
            $_SESSION['url'] = $url;
            header('Location: ../User/user.php');
        }
	}
    ?>



</body>

</html>

<style>
    .button {
        background-color:  #FACDCD;
        border: none;
        color: black;
        padding: 10px 27px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    input.search-query {
        background-color: #f47443;
        color: white;
    }

    #searchBarWrap {
        display: flex;
        justify-content: center;
    }


    #searchBar {
        border: white solid;
        border-width: .1em;
        padding: .2em .2em .2em .5em;
        width: 700px;
        background-color: black;
    }

    #searchBtn {
        background: transparent;
        color: white;
        height : 24px;
        border : solid white;
        border-width: .1em;

    }

    .pattern {
        position: relative;
        background-color: black;


    }

    .pattern:before {
        content: "";
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        height: 500px;
        background: url('wave1.png');
        ;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .gambarcenter {
        text-align: center;
        width: 100%;
        margin-top: 100px;
    }

    .center {
        text-align: center;
        width: 100%;
    }

    .Judul {
        color: white;
        font-size: 35px;
    }

    .Judul1 {
        color: #FACDCD;
        font-size: 25px;
    }

    .Judul2 {
        color: white;
        font-size: 18px;
    }

    body {
        background-color: black;
        font-family: 'Roboto Slab', serif;

    }

    body .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 40px 0;
    }

    body .container .card {
        position: relative;
        min-width: 300px;
        height: 270px;
        box-shadow: inset 5px 5px 5px rgba(0, 0, 0, 0.2),
            inset -5px -5px 15px rgba(255, 255, 255, 0.1),
            5px 5px 15px rgba(0, 0, 0, 0.3), -5px -5px 15px rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        margin: 30px;
        transition: 0.5s;
    }

    body .container .card:nth-child(1) .box .content a {
        background: #2196f3;
    }

    body .container .card:nth-child(2) .box .content a {
        background: #e91e63;
    }

    body .container .card:nth-child(3) .box .content a {
        background: #23c186;
    }

    body .container .card:nth-child(1) .box {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background-image: url('div1.png');
        background-size: 280px;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transition: 0.5s;
    }

    body .container .card:nth-child(2) .box {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background-image: url('div2.png');
        background-size: 280px;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transition: 0.5s;
    }

    body .container .card:nth-child(3) .box {
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
        bottom: 10px;
        background-image: url('div3.png');
        background-size: 280px;
        border-radius: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        transition: 0.5s;
    }

    body .container .card .box:hover {
        transform: translateY(-50px);
    }

    body .container .card .box:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 100%;
        background: rgba(255, 255, 255, 0.03);
    }

    body .container .card .box .content {
        padding: 20px;
        text-align: center;
    }

    body .container .card .box .content h4 {
        font-size: 1.8rem;
        color: #873e23;
        z-index: 1;
        transition: 0.5s;
        margin-bottom: 15px;
    }

    body .container .card .box .content p {
        font-size: 1rem;
        font-weight: 300;
        color: rgba(255, 255, 255, 0.9);
        z-index: 1;
        transition: 0.5s;
    }

    body .container .card .box .content a {
        position: relative;
        display: inline-block;
        padding: 8px 20px;
        background: black;
        border-radius: 5px;
        text-decoration: none;
        color: white;
        margin-top: 20px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        transition: 0.5s;
    }

    body .container .card .box .content a:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
        background: #fff;
        color: #000;
    }
</style>