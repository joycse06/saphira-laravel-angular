<!DOCTYPE html>
<html ng-app="Saphira">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Saphira</title>
    <link href="favicon.png" rel="shortcut icon">
    <link href="//fonts.googleapis.com/css?family=Roboto|Montserrat:400,700|Open+Sans:400,300,600" rel="stylesheet">
    <link href="dist/css/main.min.css" rel="stylesheet">
</head>
<body>
<div ng-controller="NavbarCtrl" class="navbar navbar-default navbar-static-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="/"><i class="ion-ios7-pulse-strong"></i> Saphira</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li ng-if="isAuthenticated()"><a href="/#/profile">Profile</a></li>
    </ul>
    <ul ng-if="!isAuthenticated()" class="nav navbar-nav pull-right">
        <li><a href="/#!/user/signin">Login</a></li>
        <li><a href="/#!/user/register">Sign up</a></li>
    </ul>
    <ul ng-if="isAuthenticated()" class="nav navbar-nav pull-right">
        <li><a href="/#!/user/signout">Logout</a></li>
    </ul>
</div>

<div ui-view class="fadeZoom"></div>

<!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular-messages.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular-resource.js"></script>-->
<!--<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.0/angular-animate.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.11/angular-ui-router.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.1/angular-strap.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/angular-strap/2.1.1/angular-strap.tpl.js"></script>-->
<!--<script src="vendor/satellizer.js"></script>-->

<script src="dist/js/main.min.js"></script>

<!--<script src="src/js/app.js"></script>-->
<!--<script src="directives/passwordStrength.js"></script>-->
<!--<script src="controllers/login.js"></script>-->
<!--<script src="controllers/signup.js"></script>-->
<!--<script src="controllers/logout.js"></script>-->
<!--<script src="controllers/profile.js"></script>-->
<!--<script src="controllers/navbar.js"></script>-->
<!--<script src="services/account.js"></script>-->
</body>
</html>
