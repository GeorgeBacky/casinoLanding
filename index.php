<?php 
    // Display Errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    // End here

    // Opening mock.json file for jackpots 
    $string = file_get_contents("mock.json");
    $json_a = json_decode($string, true);

    // Opening categories.json file for categories
    $string_categories = file_get_contents("categories.json");
    $json_categories = json_decode($string_categories, true);

    // Getting Sum for jackpots
    $sum = 0;
    foreach($json_a['data'] as $key=>$value){
        $value = $value['jackpots'];
        $sum+= $value;
    }
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
            <div class="jackpot-image-pos"><?php echo $sum ?>&euro;</div>
        </div>
        <div class="games-autoscroller js-loop" id="autoscrolling">
            <?php      
            foreach ($json_a['data'] as $value) {
                echo "<div class='bordered-box'>
                            <div class='jackpot-item'>
                                <div class='jackpot-inside-items'>
                                    <img class='images' src='$value[images]'>
                                <div>
                                    <div>$value[title]</div>
                                    <div>$value[jackpots]&euro;</div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            ?>
            <?php      
                foreach ($json_a['data'] as $value) {
                    echo "<div class='bordered-box is-clone'>
                                <div class='jackpot-item'>
                                    <div class='jackpot-inside-items'>
                                        <img class='images' src='$value[images]'>
                                    <div>
                                        <div>$value[title]</div>
                                        <div>$value[jackpots]&euro;</div>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
            ?>
    </div>
    <div class="jackpot-categories-pos">
    <p>Categories</p>
    <?php      
            foreach ($json_categories['data'] as $categories) {
                echo "<div class='bordered-box'>
                            <div class='jackpot-item'>
                                <div class='jackpot-inside-categories'>
                                    <img class='images-categories' src='$categories[images]'>
                                <div>
                                    <div> $categories[title] ($categories[value]) </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            ?>        
    </div>

</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="autoscroll.js"></script>
</html>