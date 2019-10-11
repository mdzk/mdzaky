<?php 
    include 'db.php'; 
    mysqli_query($db, "UPDATE home SET view=view+1");
    $query = mysqli_query($db, "SELECT * FROM home");
    $data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="author" content="Muhammad Dzaky">
    <title><?php echo $data['title']; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <!-- META SEO -->
    <meta name="keywords" content="<?php echo $data['keywords'] ?>" />
    <meta name="description" content="<?php echo $data['deskripsi'] ?>" />

    <!-- PLUGIN CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/fonts.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .bgimg {
            background-image: url('assets/images/bg-login.jpg');
            height: 100%;
            background-position: center;
            background-size: cover;
            position: relative;
            color: white;
            font-family: "Courier New", Courier, monospace;
            font-size: 25px;
        }

        .topleft {
            position: absolute;
            top: 0;
            left: 16px;
        }

        .bottomleft {
            position: absolute;
            bottom: 0;
            right: 16px;
        }

        .middle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        hr {
            margin: auto;
            width: 40%;
        }
    </style>    
</head>
<body>
    <div class="bgimg">
        <div class="topleft">
            <p style="font-family: 'Mina';"><?php echo $data['title']; ?></p>
        </div>
        <div class="middle">
            <h1>COMING SOON</h1>
            <hr>
            <p id="demo" style="font-size:30px"></p>
        </div>
        <div class="bottomleft">
            <p style="font-family: 'Mina';">Mainten</p>
        </div>
    </div>
    
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("<?php echo $data['maintenance'] ?>").getTime();

        // Update the count down every 1 second
        var countdownfunction = setInterval(function() {

            // Get todays date and time
            var now = new Date().getTime();
            
            // Find the distance between now an the count down date
            var distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
            + minutes + "m " + seconds + "s ";
            
            // If the count down is over, write some text 
            if (distance < 0) {
                clearInterval(countdownfunction);
                document.getElementById("demo").innerHTML = "EXPIRED";
                location.href="index.php";
            }
        }, 1000);
    </script>
</body>
</html>
