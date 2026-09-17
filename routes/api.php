<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\UploadController;
use App\Http\Controllers\Api\V1\ProjectApiController;

Route::prefix('v1')->middleware(['verify.domain'])->group(function () {
    Route::post('/upload', [UploadController::class, 'upload']);
    Route::get('/project/config', [ProjectApiController::class, 'config']);
    Route::delete('/upload/{id}', [ProjectApiController::class, 'deleteUpload']);
});
