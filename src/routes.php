<?php

use Faanigee\LaravelSpyhole\Http\Controllers\EntryController;

Route::post('/spyhole-api/record', [EntryController::class, 'store'])->name('spyhole.store-entry');
