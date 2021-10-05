<?php 
    $string = file_get_contents("mock.json");
    $json_a = json_decode($string, true);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing</title>
</head>
<body>
<?php 
// echo "<pre>";
// print_r($json_a);
// echo "</pre>";
// foreach ($json_a['data'] as $value) {
//     print_r($value);

//     echo "<div>" . $value['title'] . "</div>";
// }
?>
    <div class='grid-area-jackpots'>
        <div class="jackpot-sums">
            <div class="jackpot-image-pos"><img class="jackpot-img" src="images/16x9.png"></div>
            <div class="jackpot-image-pos">Total Jackpots</div>
            <div class="jackpot-image-pos">50000&euro;</div>
        </div>
        <div class="games-autoscroller js-loop" id="autoscrolling">
            <?php      
            foreach ($json_a['data'] as $value) {
                echo '<div class="bordered-box">
                            <div class="jackpot-item">
                                <div class="jackpot-inside-items">
                                    <img class="images" src='.$value['images'].'>
                                <div>
                                    <div>'.$value['title'].'</div>
                                    <div>'.$value['jackpots'].'&euro;</div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
            <?php      
                foreach ($json_a['data'] as $value) {
                    echo '<div class="bordered-box is-clone">
                                <div class="jackpot-item">
                                    <div class="jackpot-inside-items">
                                        <img class="images" src='.$value['images'].'>
                                    <div>
                                        <div>'.$value['title'].'</div>
                                        <div>'.$value['jackpots'].'&euro;</div>
                                    </div>
                                </div>
                            </div>
                        </div>';
                }
            ?>
    </div>
    <div class="jackpot-image-pos">
    <p>Categories</p>        
    </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="autoscroll.js"></script>
</html>