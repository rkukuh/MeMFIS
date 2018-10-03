<?php

Route::get('update-button', function(){
    return View::make('frontend.common.buttons.update')
    ->render();

});

Route::get('submit-button', function(){
    return View::make('frontend.common.buttons.submit')
    ->render();

});

