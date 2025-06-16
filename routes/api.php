<?php
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\API\FrontendResourceController;
use Illuminate\Support\Facades\Route;

// All event API's
Route::get('/entrepreneurships',[FrontendResourceController::class, 'entrepreneurships']);
Route::get('/events',[FrontendResourceController::class, 'events']);
Route::get('/hackathons',[FrontendResourceController::class, 'hackathons']);
Route::get('/jobs',[FrontendResourceController::class, 'jobs']);
Route::get('media-categories',[FrontendResourceController::class, 'mediaCategories']);
Route::get('/media-items',[FrontendResourceController::class, 'mediaItems']);
Route::get('/news',[FrontendResourceController::class, 'news']);
Route::get('/sliders',[FrontendResourceController::class, 'sliders']);
Route::get('/workshops',[FrontendResourceController::class, 'workshops']);

// Course registration handling API
Route::post('/course-registrations',[CourseRegistrationController::class, 'store']);