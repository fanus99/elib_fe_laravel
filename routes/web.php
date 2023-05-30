<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('authcustom.login');
})->name('loginview');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('authcustom.register');
})->name('registerview');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
/**hanya untuk development nanti akan dihapus
Route::get('/get-session', [App\Http\Controllers\AuthController::class, 'getallsession'])->name('get-session');
**/
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'Logout'])->name('logout');

Route::middleware('AuthAccess')->group(function(){
    // Dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => 'master', 'as' => 'master.'], function () {
        Route::group(['prefix' => 'siswa', 'as' => 'siswa.'], function () {
            Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
                Route::get('/get-all', [App\Http\Controllers\SiswaController::class, 'getAll'])->name('getAll');
                Route::get('/get-by-id/{id}', [App\Http\Controllers\SiswaController::class, 'getById'])->name('getById');
                Route::post('/create', [App\Http\Controllers\SiswaController::class, 'create'])->name('create');
                Route::post('/update/{id}', [App\Http\Controllers\SiswaController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [App\Http\Controllers\SiswaController::class, 'delete'])->name('delete');
            });
        });
        Route::group(['prefix' => 'kelas', 'as' => 'kelas.'], function () {
            Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
                Route::get('/get-all', [App\Http\Controllers\KelasController::class, 'getAll'])->name('getAll');
                Route::get('/get-by-id/{id}', [App\Http\Controllers\KelasController::class, 'getById'])->name('getById');
                Route::post('/create', [App\Http\Controllers\KelasController::class, 'create'])->name('create');
                Route::post('/update/{id}', [App\Http\Controllers\KelasController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [App\Http\Controllers\KelasController::class, 'delete'])->name('delete');
            });
        });
        Route::group(['prefix' => 'semester', 'as' => 'semester.'], function () {
            Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
                Route::get('/get-all', [App\Http\Controllers\SemesterController::class, 'getAll'])->name('getAll');
                Route::get('/get-by-id/{id}', [App\Http\Controllers\SemesterController::class, 'getById'])->name('getById');
                Route::post('/create', [App\Http\Controllers\SemesterController::class, 'create'])->name('create');
                Route::post('/update/{id}', [App\Http\Controllers\SemesterController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [App\Http\Controllers\SemesterController::class, 'delete'])->name('delete');
            });
        });
        Route::group(['prefix' => 'buku', 'as' => 'buku.'], function () {
            Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
                Route::get('/get-all', [App\Http\Controllers\BukuController::class, 'getAll'])->name('getAll');
                Route::get('/get-by-id/{id}', [App\Http\Controllers\BukuController::class, 'getById'])->name('getById');
                Route::post('/create', [App\Http\Controllers\BukuController::class, 'create'])->name('create');
                Route::post('/update/{id}', [App\Http\Controllers\BukuController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [App\Http\Controllers\BukuController::class, 'delete'])->name('delete');
                Route::post('/store', [BukuController::class, 'dropzoneStore'])->name('dropzone.store');
            });
        });
        Route::group(['prefix' => 'peminjaman', 'as' => 'peminjaman.'], function () {
            Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
                Route::get('/get-all', [App\Http\Controllers\PeminjamanController::class, 'getAll'])->name('getAll');
                Route::get('/get-by-id/{id}', [App\Http\Controllers\PeminjamanController::class, 'getById'])->name('getById');
                Route::post('/create', [App\Http\Controllers\PeminjamanController::class, 'create'])->name('create');
                Route::post('/update/{id}', [App\Http\Controllers\PeminjamanController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [App\Http\Controllers\PeminjamanController::class, 'delete'])->name('delete');
            });
        });
    });

    // master
    Route::get('/new', function () {
        return view('new');
    })->name('new');
    Route::get('/siswa', function () {
        return view('master_siswa');
    })->name('siswa');
    Route::get('/kelas', function () {
        return view('master_kelas');
    })->name('kelas');
    Route::get('/semester', function () {
        return view('master_semester');
    })->name('semester');
    Route::get('/Rakbuku', function () {
        return view('master_Rakbuku');
    })->name('Rakbuku');
    Route::get('/bahasa', function () {
        return view('master_bahasa');
    })->name('bahasa');
    Route::get('/buku', function () {
        return view('master_buku');
    })->name('buku');
    Route::get('/gmd', function () {
        return view('gmd');
    })->name('gmd');
    Route::get('/tipekoleksi', function () {
        return view('tipekoleksi');
    })->name('tipekoleksi');
    Route::get('/peminjaman', function () {
        return view('peminjaman');
    })->name('peminjaman');
    Route::get('/ddc', function () {
        return view('master_ddc');
    })->name('ddc');
    Route::get('/eksemplar', function () {
        return view('eksemplar');
    })->name('eksemplar');

    // edit dan tambah data
    Route::get('/create_bahasa', function () {
        return view('bahasa/create');
    })->name('create_bahasa');
    Route::get('/update_bahasa', function () {
        return view('bahasa/update');
    })->name('update_bahasa');

    Route::get('/create_buku', function () {
        return view('buku/create');
    })->name('create_buku');
    Route::get('/update_buku', function () {
        return view('buku/update');
    })->name('update_buku');

    Route::get('/create_gmd', function () {
        return view('gmd/create');
    })->name('create_gmd');
    Route::get('/update_gmd', function () {
        return view('gmd/update');
    })->name('update_gmd');

    Route::get('/create_kelas', function () {
        return view('kelas/create');
    })->name('create_kelas');
    Route::get('/update_kelas', function () {
        return view('kelas/update');
    })->name('update_kelas');

    Route::get('/create_rakbuku', function () {
        return view('rakbuku/create');
    })->name('create_rakbuku');
    Route::get('/update_rakbuku', function () {
        return view('rakbuku/update');
    })->name('update_rakbuku');

    Route::get('/create_siswa', function () {
        return view('siswa/create');
    })->name('create_siswa');
    Route::get('/update_siswa', function () {
        return view('siswa/update');
    })->name('update_siswa');

    Route::get('/create_semester', function () {
        return view('semester/create');
    })->name('create_semester');
    Route::get('/update_semester', function () {
        return view('semester/update');
    })->name('update_semester');

    Route::get('/create_siswa', function () {
        return view('siswa/create');
    })->name('create_siswa');
    Route::get('/update_siswa', function () {
        return view('siswa/update');
    })->name('update_siswa');


    // daftar pustaka
    Route::get('/kelassiswa', function () {
        return view('kelassiswa');
    })->name('kelassiswa');
    Route::get('/stokopname', function () {
        return view('stokopname');
    })->name('stokopname');
    Route::get('/bukustok', function () {
        return view('bukustok');
    })->name('bukustok');



    // edit dan tambah daftar pustaka

    Route::get('/create_kelassiswa', function () {
        return view('kelassiswa/create');
    })->name('create_kelassiswa');
    Route::get('/update_kelassiswa', function () {
        return view('kelassiswa/update');
    })->name('update_kelassiswa');

    Route::get('/create_eksemplar', function () {
        return view('eksemplar/create');
    })->name('create_eksemplar');
    Route::get('/update_eksemplar', function () {
        return view('eksemplar/update');
    })->name('update_eksemplar');

    Route::get('/create_bukustok', function () {
        return view('bukustok/create');
    })->name('create_bukustok');
    Route::get('/update_bukustok', function () {
        return view('bukustok/update');
    })->name('update_bukustok');

    Route::get('/create_tipekoleksi', function () {
        return view('tipekoleksi/create');
    })->name('create_tipekoleksi');
    Route::get('/update_tipekoleksi', function () {
        return view('tipekoleksi/update');
    })->name('update_tipekoleksi');

    Route::get('/create_peminjaman', function () {
        return view('peminjaman/create');
    })->name('create_peminjaman');
    Route::get('/update_peminjaman', function () {
        return view('peminjaman/update');
    })->name('update_peminjaman');

});



