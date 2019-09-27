<?php
session_start();
require 'config.php';
// require 'util/Auth.php';

// Use an autoloader!
require 'libs/MVCmanage.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/PintoModel.php' ;
require 'libs/View.php';

// Mail
require 'libs/phpmailer/phpmailer/class.phpmailer.php';

// Library
require 'libs/database2.php';
require 'libs/Database.php';
require 'libs/Session.php';
require 'libs/Hash.php';
require 'libs/format_date.php';
require 'libs/changeData_genome.php';


$bootstrap = new MVCmanage();
$bootstrap->init();
