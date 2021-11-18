<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/cb68c99cf8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>User Page</title>
</head>

<?php 
header('X-Frame-Options: GOFORIT'); 
session_start(); 
$username = $_SESSION['username'];
$json_data = json_decode(file_get_contents($_SESSION['url']), true);
$following = $json_data['graphql']['user']['edge_follow']['count'];
$follower =  $json_data['graphql']['user']['edge_followed_by']['count'];
$post = $json_data['graphql']['user']['edge_owner_to_timeline_media']['count'];
$private = $json_data['graphql']['user']['is_private'];
$digitonusername = preg_match_all("/[0-9]/",$username);
$FperFPoints;
$digitonusernamepoints;
$postcountpoints;
$ifprivatepoints;
$highlightpoints;
$externalURLpoints;

if($private==true){
    if($follower==0){
        $FperF = $following/1;
    }else {
        $FperF = $following/$follower;
    }
    if($FperF <= 1){
        $FperFPoints = 0;
    }elseif($FperF <=2 ){
        $FperFPoints = 1;
    }elseif($FperF <=4 ){
        $FperFPoints = 2;
    }elseif($FperF >4){
        $FperFPoints = 3;
    }

    if($digitonusername == 0){
        $digitonusernamepoints = 0;
    }elseif($digitonusername == 1){
        $digitonusernamepoints = 1;
    }elseif($digitonusername == 2){
        $digitonusernamepoints = 2;
    }elseif($digitonusername == 3){
        $digitonusernamepoints = 3;
    }elseif($digitonusername == 4){
        $digitonusernamepoints = 4;
    }

    if($private == true){
        $ifprivatepoints = 2;
    }elseif($private == false){
        $ifprivatepoints = 1;
    }

    if($post <= 5){
        $postcountpoints = 3;
    }elseif ($post > 5 && $post<=20) {
        $postcountpoints = 1;
    }elseif ($post > 20) {
        $postcountpoints = 0;
    }

    $FperFPoints = ($FperFPoints/3)*55;
    $digitonusernamepoints = ($digitonusernamepoints/4)*20;
    $postcountpoints = ($postcountpoints/3)*15;
    $ifprivatepoints = ($ifprivatepoints/3)*10;

    $finalfakepercentage = $FperFPoints + $digitonusernamepoints + $postcountpoints + $ifprivatepoints;
}else {
    if($follower==0){
        $FperF = $following/1;
    }else {
        $FperF = $following/$follower;
    }
    if($FperF <= 1){
        $FperFPoints = 0;
    }elseif($FperF <=2 ){
        $FperFPoints = 1;
    }elseif($FperF <=4 ){
        $FperFPoints = 2;
    }elseif($FperF >4){
        $FperFPoints = 3;
    }

    if($digitonusername == 0){
        $digitonusernamepoints = 0;
    }elseif($digitonusername == 1){
        $digitonusernamepoints = 1;
    }elseif($digitonusername == 2){
        $digitonusernamepoints = 2;
    }elseif($digitonusername == 3){
        $digitonusernamepoints = 3;
    }elseif($digitonusername == 4){
        $digitonusernamepoints = 4;
    }

    if($private == true){
        $ifprivatepoints = 2;
    }elseif($private == false){
        $ifprivatepoints = 1;
    }

    if($post <= 5){
        $postcountpoints = 3;
    }elseif ($post > 5 && $post<=20) {
        $postcountpoints = 1;
    }elseif ($post > 20) {
        $postcountpoints = 0;
    }

    $highlightcount = $json_data['graphql']['user']['highlight_reel_count'];
    $externalURL = $json_data['graphql']['user']['external_url'];

    if($highlightcount == 0){
        $highlightpoints = 1;
    }elseif($highlightcount > 0) {
        $highlightpoints = 0;
    }

    if($externalURL == null){
        $externalURLpoints = 0.6;
    }elseif($externalURL != null) {
        $externalURLpoints = 0.4;
    }

    $FperFPoints = ($FperFPoints/3)*40;
    $digitonusernamepoints = ($digitonusernamepoints/4)*10;
    $postcountpoints = ($postcountpoints/3)*15;
    $ifprivatepoints = ($ifprivatepoints/3)*10;
    $highlightpoints = ($highlightpoints)*15;
    $externalURLpoints = ($externalURLpoints)*10;

    $finalfakepercentage = $FperFPoints + $digitonusernamepoints + $postcountpoints + $ifprivatepoints + $highlightpoints + $externalURLpoints;

}
?>
<body></body>
    <div class="container" id="background">
        <div class="row">
            <!-- <div class="col-md-12"> -->
                <div class="col-md-8" id="left-side">
                    <!-- <div class="col-md-12"> -->
                        <h2><?php  echo $username;  ?></h2>
                        <h3 class="hasil">Biography</h3>
                        <p><?php echo $json_data['graphql']['user']['biography']; ?></p>
                        <div class="rounded-circle ling text-center">
                            <div class="col-md-12 text-ling">
                                <h4><?php echo number_format($finalfakepercentage,2);?> % </h4>
                                <p style="color: #FF9191; font-weight: bold; font-size: 20px;">Fake</p>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex text-center" id="ket">
                            <div class="col-md-4" id="desc">
                                <h2><?php echo $follower; ?></h2>
                                <h5>Followers</h5>
                            </div>
                            <div class="col-md-4" id="desc">
                                <h2><?php echo $following; ?></h2>
                                <h5>Following</h5>
                            </div>
                            <div class="col-md-4" id="desc">
                                <h2><?php echo $post; ?></h2>
                                <h5>Posts</h5>
                            </div>
                        </div>
                        <div class="col-md- d-flex justify-content-center">
                            <div class="col-md-6">
                                <?php 
                                if($private){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Private Account</h4>
                                        </div>
                                        </div>';
                                }elseif(!$private){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Not a Private Account</h4>
                                        </div>
                                        </div>';
                                        if($externalURL==null){
                                         echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Have no External URL</h4>
                                        </div>
                                        </div>';
                                        }elseif($externalURL==null){
                                            echo '<div class="col-md-6 detail">
                                            <div class="d-flex flex-row">
                                                <div class="kotak"></div>
                                                <h4 style="margin-left: 2%;">Have External URL</h4>
                                                </div>
                                                </div>';
                                        }

                                        if($highlightcount == 0){
                                            echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Have no Highlight</h4>
                                        </div>
                                        </div>';
                                        }elseif($highlightcount > 0) {
                                            echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Have Highlight</h4>
                                        </div>
                                        </div>';
                                        }
                                }

                                if($follower==0){
                                    $FperF = $following/1;
                                }else {
                                    $FperF = $following/$follower;
                                }
                                if($FperF <= 1){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Small F/F ratio</h4>
                                        </div>
                                        </div>';
                                }elseif($FperF <=2){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Medium F/F ratio</h4>
                                        </div>
                                        </div>';
                                }elseif($FperF > 2 ){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Large F/F ratio</h4>
                                        </div>
                                        </div>';
                                }
                                ?>
                            </div>
                            
                            <div class="col-md-6">
                                <?php 
                                if($post<5){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Small post count</h4>
                                    </div>
                                </div>';
                                }elseif($post>5 && $post <=20){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Medium post count</h4>
                                    </div>
                                </div>';
                                }elseif($post>20){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Large post count</h4>
                                    </div>
                                </div>';
                                }?>
                                <?php 
                                if($digitonusername == 0){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">No digit on Username</h4>
                                    </div>
                                </div>';
                                }elseif($digitonusername > 1){
                                    echo '<div class="col-md-6 detail">
                                    <div class="d-flex flex-row">
                                        <div class="kotak"></div>
                                        <h4 style="margin-left: 2%;">Digit on Username</h4>
                                    </div>
                                </div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 5%;">
                            <div class="d-flex flex-row">
                                <div class="kotak-border"></div>
                                
                                <h2 class="hasil"> <?php if($finalfakepercentage <=40){
                                    echo "Trusted Account";
                                    }elseif($finalfakepercentage>40&&$finalfakepercentage<=59){
                                    echo "So-so trusted Account";
                                    }elseif($finalfakepercentage>59){
                                    echo "Untrusted Account";}?>
                                    </h2>
                                <?php if($private==true){
                                    echo "<p class='alert'>This is a private account, please note that there could be a calculation error due to limited data that can be taken from a private account</p>";
                                    }?>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="col-md-4" id="right-side">
                    <!-- <div class="col-md-12"> -->
                        <h3>Profile Picture</h3>
                        <?php $imageUrl = $json_data['graphql']['user']['profile_pic_url_hd']; ?>
                        
                        <img target="_parent" src="<?php echo $imageUrl;?>" alt="<?= $username; ?>" class="picture"/>
                        <div class="col align-self-end float-end">
                            <a href="../frontend/home.php" class="btn btn-another">Check Another Account <span class="fas fa-arrow-right"></span></a>
                        </div>
                    <!-- </div> -->
                </div>
            <!-- </div> -->
        </div>
    </div>
</body>
</html>

<style>
    .alert{
        color:red;
    }
    .hasil{
        color:#FF9191;
    }
</style>