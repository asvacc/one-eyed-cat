<?php
    /**
     * Template Name: Coming Soon
     */



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>One-Eyed Cat Brewing</title>
    <style>

        html, body{
            background: black;
        }

        @font-face {
            font-family: "Poor Richard";
            src: url("//oneeyedcatbrewing.com/wp-content/themes/one-eyed-cat-brewing/assets/fonts/poor_richard.TTF");
        }

        #wrapper{
            background: black;
            position:absolute;
            top:0;left:0;right:0;bottom:0;
        }

        #wrapper > div{
            height:100%;
            width:100%;
            display: flex;
            flex-direction: column;
            align-items:center;    
            justify-content: center;
        }

        #wrapper > div > div{
            text-align: center;
        }

        #wrapper > div img{
            max-width:70vh;
            max-height:50vh;
            transform: translateX(20px);
        }

        #wrapper h1{
            font-size: 4em;
            font-family: "Poor Richard", serif;
            color:white;
            text-align: center;
            margin-bottom:0;
            width:95%;
            line-height:.7;
        }

    </style>
</head>
<body>
    <div id="wrapper">
        <div>
            <div>
                <img src="<?php echo TEMPLATE_DIR_URI . '/images/logo.png'; ?>" alt="One Eyed Cat Brewing">
                <h1>Coming Soon</h1>
            </div>
        </div>
    </div>
</body>
</html>