<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;
use App\Filters\LoginFilter;
use App\Filters\UserFilter;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'Login'         => LoginFilter::class,
        'UsersFilter'          => UserFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'Login' => [
                'except' => ['login', 'login/*',  '/', 'home', 'home/*',]
            ],
            'UsersFilter' => [
                'except' => ['login', 'login/*',  '/', 'home', 'home/*',]
            ], 
        ],
        'after' => [
            
            'login' => [
                'except' => ['/', 'home', 'home/*', 'login/*', 'login', 'berita', 'berita/*', 'admin', 'admin/*', 'pengumuman', 'pengumuman/*', 'prestasi', 'prestasi/*',
                'down', 'down/*', 'gallery', 'gallery/*', 'foto', 'foto/*', 'guru', 'guru/*', 'kelas', 'kelas/*', 
                'mapel', 'mapel/*', 'sekolah', 'sekolah/*', 'siswa', 'siswa/*', 'users', 'users/*', 'slide', 'slide/*',
                ]],

            'UsersFilter' => [
                'except' =>  ['/','home', 'home/*', 'login', 'login/*', 'berita', 'berita/*', 'admin',  'admin/*', 'pengumuman',  'pengumuman/*', 
                'prestasi', 'prestasi/*', 'down',  'down/*', 'gallery',  'gallery/*'] ],
            
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
            
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}