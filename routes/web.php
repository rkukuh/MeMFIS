<?php

Auth::routes();

Route::redirect('/', '/dashboard', 301);

require('admin.php');
require('print.php');
require('frontend.php');
require('component.php');
require('datatables.php');

require('testing.php');
