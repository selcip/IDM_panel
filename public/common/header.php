<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" />
        
        <title>espero q funcione</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="public/css/gsdk.css">
        <link rel="stylesheet" href="public/css/demo.css">
        <link rel="stylesheet" href="public/css/pe-icon-7-stroke.css">
        <link rel="stylesheet" href="public/css/main.css">
        
        <link href='https://fonts.googleapis.com/css?family=Grand+Hotel|Open+Sans:400,300' rel='stylesheet' type='text/css'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <?php
    if($_SESSION['check']){
    ?>
    <nav class="navbar navbar-ct-green navbar-fixed-top" role="navigation-demo">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-default2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                IDMStory - GM PANEL
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navigation-default2">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#"><i class="fa fa-globe"></i> Discover</a>
                </li>   
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-navicon"></i> Player
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/apsp">Checar AP/SP</a></li>
                        <li><a href="/doador">Doador</a></li>
                        <li><a href="/logs">Logs</a></li>
                        <li><a href="/online">Online</a></li>
                        <li><a href="/espiar">Espiar</a></li>
                        <li class="divider"></li>
                        <li><a href="/ban">Ban</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    </nav>
    <?php
    }
    ?>