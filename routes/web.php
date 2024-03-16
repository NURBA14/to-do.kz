<?php

use App\Http\Controllers\Admin\AdminControlller;
use App\Http\Controllers\Admin\BanController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\RankController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TaskViewController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\VerifyController;
use App\Http\Controllers\Worker\HomeController as WorkerHomeController;
use App\Http\Controllers\Worker\ProfileController;
use App\Http\Controllers\Worker\StatisticController;
use App\Http\Controllers\Worker\TaskController as WorkerTaskController;
use App\Http\Controllers\Worker\TeamController as WorkerTeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/", [GuestHomeController::class, "index"])->name("guest.home");
Route::get("/about", [GuestHomeController::class, "about"])->name("guest.about");

Route::group(["middleware" => ["auth", "signed"]], function () {
    Route::get("/email/verify/{id}/{hash}", [VerifyController::class, "verify"])->name("verification.verify");
});

Route::group(["middleware" => "auth"], function () {
    Route::post("/logout", [LoginController::class, "logout"])->name("login.logout");
    Route::get("/email/verify", [VerifyController::class, "notice"])->name("verification.notice");
    Route::post("/email/verify/notification", [VerifyController::class, "send"])->name("verification.send");
});

Route::group(["middleware" => "guest"], function () {
    Route::get("/login", [LoginController::class, "index"])->name("login.index");
    Route::post("/login", [LoginController::class, "store"])->name("login.store");
    Route::get("/reg", [RegController::class, "index"])->name("reg.index");
    Route::post("/reg", [RegController::class, "store"])->name("reg.store");

    Route::get("/reset/password", [ResetPasswordController::class, "index"])->name("reset.password.index");
    Route::post("/reset/password", [ResetPasswordController::class, "store"])->name("reset.password.store");

    Route::get("/password/reset", [ResetPasswordController::class, "reset"])->name("password.reset");
    Route::post("/password/reset", [ResetPasswordController::class, "update"])->name("password.update");
});

Route::group(["middleware" => ["auth", "admin", "ban", "verified"], "prefix" => "admin"], function () {
    Route::get("/", [HomeController::class, "index"])->name("admin.home");
    Route::get("/profile", [AdminProfileController::class, "index"])->name("admin.profile.index");
    Route::post("/profile", [AdminProfileController::class, "store"])->name("admin.profile.store");
    Route::delete("/profile/destroy", [AdminProfileController::class, "destroy"])->name("admin.profile.destroy");

    Route::resource("/professions", ProfessionController::class);
    Route::resource("/ranks", RankController::class);
    Route::resource("/teams", TeamController::class);
    Route::resource("/tasks", TaskController::class);

    Route::get("/done/tasks", [TaskViewController::class, "done"])->name("done.tasks.index");
    Route::get("/notactive/tasks", [TaskViewController::class, "notActive"])->name("notactive.tasks.index");
    Route::get("/inprocess/tasks", [TaskViewController::class, "inProcess"])->name("inprocess.tasks.index");
    Route::get("/setactive/{id}/tasks", [TaskViewController::class, "setActive"])->name("setactive.tasks.index");
    Route::post("/truncate/tasks", [TaskViewController::class, "truncate"])->name("truncate.tasks");

    Route::get("/admins/list", [AdminControlller::class, "index"])->name("admins.index");
    Route::get("/admins/{id}/store", [AdminControlller::class, "store"])->name("admins.store");

    Route::get("/workers/list", [WorkerController::class, "index"])->name("workers.index");
    Route::get("/workers/{id}/store", [WorkerController::class, "store"])->name("workers.store");

    Route::get("/users/list", [UserController::class, "index"])->name("users.index");
    Route::post("/users/{id}/store", [UserController::class, "store"])->name("users.store");

    Route::get("/banned/list", [BanController::class, 'index'])->name("banned.index");
    Route::get("/banned/{id}/store", [BanController::class, 'store'])->name("banned.store");
});

Route::group(["middleware" => ["auth", "worker", "ban", "verified"], "prefix" => "worker"], function () {
    Route::get("/", [WorkerHomeController::class, "index"])->name("worker.home");
    Route::get("/profile", [ProfileController::class, "index"])->name("worker.profile.index");
    Route::post("/profile", [ProfileController::class, "store"])->name("worker.profile.store");
    Route::delete("/profile/destroy", [ProfileController::class, "destroy"])->name("worker.profile.destroy");

    Route::get("/team", [WorkerTeamController::class, "index"])->name("worker.team.index");
    Route::get("/statistic", [StatisticController::class, 'index'])->name("worker.statistic.index");

    Route::get("/task", [WorkerTaskController::class, "index"])->name("worker.task.index");
    Route::get("/task/{id}/show", [WorkerTaskController::class, "show"])->name("worker.task.show");

    Route::get("/task/done", [WorkerTaskController::class, "is_done"])->name("worker.task.done");
    Route::get("/task/{id}/done", [WorkerTaskController::class, "setIsDone"])->name("worker.task.set.done");
    Route::get("/task/process", [WorkerTaskController::class, "in_process"])->name("worker.task.process");
    Route::get("/test/{id}/process", [WorkerTaskController::class, "setInProcess"])->name("worker.task.set.process");
});