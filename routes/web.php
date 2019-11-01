<?php

Auth::routes();

Route::redirect('/', '/dashboard', 301);

require('admin.php');
require('print.php');
require('component.php');
require('datatables.php');

require('frontend.php');
require('frontend/aircraft.php');
require('frontend/customer.php');
require('frontend/position.php');
require('frontend/defectcard.php');
require('frontend/discrepancy-found.php');
require('frontend/employee.php');
require('frontend/grn.php');
require('frontend/gse.php');
require('frontend/htcrr.php');
require('frontend/facility.php');
require('frontend/item.php');
require('frontend/interchange.php');
require('frontend/jobcard.php');
require('frontend/manhour.php');
require('frontend/project.php');
require('frontend/purchase-order.php');
require('frontend/purchase-request.php');
require('frontend/quotation.php');
require('frontend/rii.php');
require('frontend/rir.php');
require('frontend/rts.php');
require('frontend/task-release.php');
require('frontend/taskcard.php');
require('frontend/view-only.php');
require('frontend/workpackage.php');
require('frontend/work-progress-report.php');
require('frontend/inventory-in.php');
require('frontend/inventory-out.php');
require('frontend/item-request.php');
require('testing.php');
