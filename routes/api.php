    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\Auth\AuthController;
    use App\Http\Controllers\Api\PostController;
    use App\Http\Controllers\Api\KomunitasController;
    use App\Http\Controllers\Api\LapanganController;

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::apiResource('posts', PostController::class);
        Route::apiResource('komunitas', KomunitasController::class);
        Route::apiResource('lapangans', LapanganController::class);
        Route::get('/user', function (Request $request) {
            return $request->user()->only(['user_id', 'username', 'email', 'nama_user', 'tanggal_lahir', 'gender', 'kota', 'role']);
        });
    });
