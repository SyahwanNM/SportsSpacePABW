    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Api\Auth\AuthController;
    use App\Http\Controllers\Api\PostController;
    use App\Http\Controllers\Api\KomunitasController;
    use App\Http\Controllers\Api\LapanganController;
    use App\Http\Controllers\Api\UserProfileController;
    use App\Http\Controllers\Api\SportsGroupController;

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::apiResource('posts', PostController::class);
        Route::apiResource('komunitas', KomunitasController::class);
        Route::apiResource('lapangans', LapanganController::class);
        Route::apiResource('sports-groups', SportsGroupController::class);
        Route::get('/user', function (Request $request) {
            $user = $request->user();
            $userData = $user->only(['user_id', 'username', 'email', 'nama_user', 'tanggal_lahir', 'gender', 'kota', 'role', 'photo']);
            
            // Generate full URL for photo if it exists
            if ($userData['photo'] && $userData['photo'] !== 'null' && $userData['photo'] !== '') {
                if (!str_starts_with($userData['photo'], 'http')) {
                    $userData['photo'] = asset($userData['photo']);
                }
            }
            
            return $userData;
        });
        Route::get('/profile', [UserProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
    });
