<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/login',
        '/admin/spe_add_do',
        '/admin/reg_add_do',
        '/admin/school_add_do',
        '/admin/password_add_do',
        '/admin/login_do',
        '/admin/link_reg_add',
        '/admin/school_link_reg_add',
        '/admin/upload_img'
    ];
}
