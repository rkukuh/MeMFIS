<?php

Auth::routes();

Route::redirect('/', '/dashboard', 301);

require_once('admin.php');
require_once('frontend.php');
require_once('component.php');
require_once('datatables.php');

require_once('testing.php');
