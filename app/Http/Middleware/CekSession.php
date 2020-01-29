<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class CekSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Request::is('role/*') || \Request::is('role')) { 
            if ($request->session()->has('username')) {
                if($request->session()->get('nama_role') != "Admin") {
                    Session::flash('error','Anda tidak login sebagai admin.');
                    return redirect('/');   
                }
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('client/*') || \Request::is('client')) { 
            if ($request->session()->has('username')) {
                if($request->session()->get('nama_role') != "Admin") {
                    Session::flash('error','Anda tidak login sebagai admin.');
                    return redirect('/');   
                }
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('toko/*') || \Request::is('toko')) { 
            if ($request->session()->has('username')) {
                if($request->session()->get('nama_role') != "Admin") {
                    Session::flash('error','Anda tidak login sebagai admin.');
                    return redirect('/');   
                }
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('brand/*') || \Request::is('brand')) { 
            if ($request->session()->has('username')) {
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('smartphone/*') || \Request::is('smartphone')) { 
            if ($request->session()->has('username')) {
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('supplier/*') || \Request::is('supplier')) { 
            if ($request->session()->has('username')) {
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }

        if (\Request::is('/')) { 
            if ($request->session()->has('username')) {
            } else {
                Session::flash('error','Silahkan login terlebih dahulu.');
                return redirect('login');
            }
        }
        return $next($request);
    }
}
