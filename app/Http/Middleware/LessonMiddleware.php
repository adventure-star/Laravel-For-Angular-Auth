<?php

namespace App\Http\Middleware;

use App\Model\Lesson;
use Closure;
use Illuminate\Support\Facades\Auth;

class LessonMiddleware
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
        if (Lesson::find($request->id)->user_id != Auth::user()->id) {
            $response = ["errors" => "Auth Error"];
            return response($response, 200);
        }
        return $next($request);
    }
}
