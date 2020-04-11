<?php

namespace App\Http\Middleware;

use Closure;
use Domain\Application\Contract\Uuid\UuidGeneratable;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthUserDosentHaveGivenUuid
{
    private UuidGeneratable $uuidGen;

    public function __construct(UuidGeneratable $uuidGen)
    {
        $this->uuidGen = $uuidGen;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userUuid = Auth::id();
        $uuid = $request->uuid;

        if (! $this->uuidGen->isUuid($uuid)) {
            return redirect()->route('frontend.user.home');
        } elseif ($userUuid !== $request->uuid) {
            abort(403);
        }

        return $next($request);
    }
}
