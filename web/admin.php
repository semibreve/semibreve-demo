<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Semibreve\Manager;
use Semibreve\BaseConfiguration;

// This page is only accessible if logged in.
$semibreve = new Manager(new BaseConfiguration(__DIR__ . '/../config.yml'));
$user = $semibreve->getAuthenticatedUser();
if ($user === null) {
    header('Location: /');
    die();
}

?>

<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="icon" href="favicon.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="/bower_components/bootswatch/dist/simplex/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/styles.css"/>
    <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <title>Authenticated - Minim</title>
</head>
<body>
<div class="center-body">
    <div class="row">
        <div class="col-md-12 text-center">
            <img src="/svg/logo.svg" class="logo">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Success!</h3>
            <p>
                You can only see this page if you're logged in. If you're seeing it now, congratulations! Semibreve is
                all set up and configured. Remember there are some settings in <code>config.yml</code> that absolutely
                <i>must</i> be changed before going to production.
            </p>
            <p>
                The following information was detected in your session:
            </p>
            <ul>
                <li><b>Username:</b> <?=$user->getUsername()?></li>
                <li><b>Role:</b> <?=$user->getRole()?></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-lg btn-info btn-block margin-bottom-plus" href="logout.php">Logout</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-muted text-center small copyright">
            Semibreve | Copyright &copy; Saul Johnson
        </div>
    </div>
</div>
</body>
</html>
