<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>POMO Kids App</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="css/reset.css"> -->
</head>
<body style="background-color:pink;">


<?php
 require_once "connect.php";

 if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;

          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();

        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;

        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }

    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: ./');
    }

    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=id,name,first_name,last_name,email,link,gender,locale,picture');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
        $UserPicture = $fb->get('/me/picture?redirect=false&height=100');
        $response = $fb->get('me?fields=email,name');
        $picture = $UserPicture->getGraphUser();
        $userNode = $response->getGraphUser();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if ($conn->connect_error) {
                die("connection failed : ".$conn -> connect_error);
            }else{
                //variable FB Data
                $fb_id = $fbUserProfile["id"];
                $fb_fname = $fbUserProfile["first_name"];
                $fb_lname = $fbUserProfile["last_name"];
                $fb_email = $fbUserProfile["email"];
                $fb_link = $fbUserProfile["link"];
                $fb_gender = $fbUserProfile["gender"];
                $fb_local = $fbUserProfile["locale"];



                $sql = "SELECT * FROM facebook_user WHERE id_user = ".$fb_id."";
                $result = $conn->query($sql);
                //echo ".$fb_id.";


                if ($result -> num_rows == 0){
                    $sql_insert = "INSERT INTO facebook_user(`id_user`, `first_name`, `last_name`, `email`, `link`, `gender`, `locale`, `fb_createtime`) VALUES ('".$fb_id."', '".$fb_fname."', '".$fb_lname."', '".$fb_email."', '".$fb_link."', '".$fb_gender."', '".$fb_local."',Now())";

                    $conn->query($sql_insert);
                    // echo $sql_insert;
                    // echo "INSERT COMPLETE";
                    //echo $fb_fname;


                   $sql = " SELECT `id_user`, `first_name`, `last_name`, `email`, `link`, `gender`, `locale`, `fb_createtime` FROM `facebook_user` WHERE 1";

                   $result = $conn->query($sql);

                        while ($row = $result -> fetch_assoc()) {

                          ?>

                          <div class="iphone_5s">
                          	<div class="head-menu">
                          			<div class="username">

                          				<?php

                          					echo "Welcome"."  ".$row['first_name']."  ".$row['last_name'];

                          				?>
                          			</div>
                          			<!-- <div class="nameapp">
                          				<p>POMO Kids</p>
                          			</div> -->
                          			<?php
                                  echo "<a href='logout.php'>Logout</a>";
                          			?>
                          	</div> <!-- head-menu -->

                          	<div class="banner-img">
                              <div class="imgpro">


                              <?php echo "<img src='".$picture['url']."'/>";
                              ?>
                              </div>
                              <div class="facebook">


                              <?php

                              echo "<b>ID USER</b> = ".$row['id_user'];
                              echo "<br>";
                              echo "<b>First name</b> = ".$row['first_name'].$row['last_name'];
                              echo "<br>";
                              echo "<b>Email</b> = ".$row['email'];
                              echo "<br>";

                              echo "<b>Gender</b> = ".$row['gender'];
                              echo "<br>";
                              echo "<b>Time</b> = ".$row['fb_createtime'];
                              echo "<br>";


                              ?>
                                  </div>
                          	</div> <!-- banner-img -->

                          	<div class="smart-watch">
                              </p>
                          			<div class="cartoon">

                          			</div>
                          			<p>
                          			<div class="img-watch">

                          			</div>
                          			<div class="bt-add">

                          			</div>
                          	</div> <!-- smart-watch -->

                          	<div class="bt-function-1">
                          			<a href="smartlocator.php"><div class="sub-menu-1">

                          			</div></a>
                          			<div class="sub-menu-2">

                          			</div>
                          			<div class="sub-menu-3">

                          			</div>
                          	</div>

                          	<div class="bt-function-2">
                          		<div class="sub-menu-4">

                          		</div>
                          		<div class="sub-menu-5">

                          		</div>
                          		<a href="voicemessage.php"><div class="sub-menu-6">

                          		</div></a>
                          	</div>

                          	<div class="bt-function-3">
                          		<div class="sub-menu-7">

                          		</div>
                          		<div class="sub-menu-8">

                          		</div>
                          		<div class="sub-menu-9">

                          		</div>
                          	</div>
                          	<div class="bt-function-4">
                          		<div class="sub-menu-10">

                          		</div>
                          		<div class="sub-menu-11">

                          		</div>
                          		<div class="sub-menu-12">

                          		</div>
                          	</div>

                          	<div class="bt-function-5">
                          		<div class="sub-menu-13">

                          		</div>
                          		<div class="sub-menu-14">

                          		</div>
                          		<div class="sub-menu-15">

                          		</div>

                          	</div>

                          	<div class="menubar">
                          			<div class="menu_home">
                          				<div class="tabbar">

                          				</div>
                          				<p>Home</p>
                          			</div>
                          			<div class="menu_my">
                          				<div class="tabbar2">

                          				</div>
                          				<p>My</p>
                          			</div>

                          	</div> <!-- menubar -->


                          </div><!-- iphone_5s -->
                          <?php
                        }
                    $conn->close();
                }
              }

}else{

    ?>


        <div class="iphone_5s" style="height: 568px; top: 10px;">
          <div class="head-menu">
              <a href="index.php" style="float:left; margin-top:-12px; margin-left:10px;"><img src="image/back.jpg" alt="" ></a>
              <div class="nameapp" style="margin-top:-22px;">
                <p>Login</p>
              </div>

          </div> <!-- head-menu -->

          <form action="login_api.php" method="POST">
            <div class="login_container">
            <div class="input">
              <div class="inputleft">
                <i class="fa fa-user"></i>
              </div>
              <div class="inputright">
                <input class="style-input" type="text" name="username" placeholder="Please enter 2-20 character">
              </div>
            </div>

            <div class="input">
              <div class="inputleft">
                <i class="fa fa-lock"></i>
              </div>
              <div class="inputright">
                <input class="style-input" type="password" name="password" placeholder="Please enter 6-16 characters">
              </div>
            </div>

            <?php
            $fbloginUrl = $helper->getLoginUrl($fbRedirectURL, $fbPermissions);
            echo '<a href="'.$fbloginUrl.'" class="myButton">Login with Facebook</a>';
            ?>

          	<input class="btn-login" type="submit" value="Login" name="submit">

            <div class="wrap-forgot">
              <div style="float:left;">
                <a href="#">Forgot Password?</a>
              </div>
              <div style="float:right">
                <a href="#" class="">Register</a>
              </div>
            </div> <!-- wrap-forgot -->

          </div> <!-- login_container -->
          </form>



        </div><!-- iphone_5s -->


    <?php

}


?>

</body>
</html>
