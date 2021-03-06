<?php
$baseUrl = 'http://fedora-hubs.dev';

// generate fake user data
$user = [
    'id' => mt_rand(1,999999),
    'nick' => 'hubt3st',
    'firstName' => 'Hub',
    'lastName' => 'Test',
    'email' => 'hub-test@fedoraproject.org',
    'country' => 'BG',
    'badges' => array(
        1 => array(
            'name' => "fas-crypto-badge",
            'desc' => 'Crypto Badger -- You updated your SSH key with the Fedora Account System (FAS)',
            'img' => $baseUrl.'/data/static/fas-crypto-badger.png'
        )
    ),
    'slogan' => 'A goal without a plan is only a wish.',
    'isAdmin' => false,
    'fasLogged' => false,
    'hasCla' => false,
    'hasPublicKey' => false,
];

$rootPath = dirname(realpath(__FILE__));
$file = fopen($rootPath . '/data/static/user.json', 'w+');
fwrite($file, json_encode($user));
fclose($file);
?>
<!DOCTYPE html>
<html lang="en" ng-app="fedoraHubs" >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="Fedora Hubs on AngularJS / Material design">

        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" href="<?php $baseUrl; ?>/css/vendor/angular-material.css">

        <!-- Loading local styles -->
        <link rel="stylesheet" href="css/styles.css">

        <title>Fedora Hubs demo UI</title>

        <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>

        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/angular.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/angular-ui-router.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/angular-animate.min.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/angular-aria.min.js"></script>

        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/angular-material.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/underscore-min.js"></script>

        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/forge/sha256.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/libs/vendor/forge/hmac.js"></script>

        <!-- Load app-specific files -->
        <script src="<?php echo $baseUrl; ?>/js/app.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/services/Log.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/services/Auth/FAS.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/services/Auth/GitHub.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/services/Auth/Facebook.js"></script>
        <script src="<?php echo $baseUrl; ?>/js/services/User.js"></script>

        <script src="<?php echo $baseUrl; ?>/js/controllers/home.js"></script>


        <script type="text/javascript">
            // put specific app (non-sensitive!) configurations here
            window.appConfig = {
                baseUrl: '<?php echo $baseUrl; ?>'
            };
        </script>
    </head>

    <body layout="column" style="font-family: 'Comfortaa';">

        <div ui-view="navigation"></div>

        <div layout="row" flex>
            <md-sidenav layout="column" class="md-sidenav-left fixed md-whiteframe-z2" md-component-id="left" md-is-locked-open="$mdMedia('gt-sm')">
                <div ui-view="sidenav"></div>
            </md-sidenav>


            <div ui-view="content"></div>
        </div>
    </body>
</html>
