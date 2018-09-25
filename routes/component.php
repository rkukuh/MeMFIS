<?php

Route::get('update-button', function(){
    return View::make('frontend.common.buttons.update')
    ->render();

});

// Route::get('update-button/{id}', function($id){
//     return View::make('frontend.common.buttons.submit')
//         ->with("", "")
//         ->render();

// });

