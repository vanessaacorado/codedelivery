<?php

namespace CodeDelivery\Http\Middleware;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use CodeDelivery\Repositories\UserRepository;
use Closure;

class OauthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
	private $user;
		public function __construct(UserRepository $user){
			$this->user= $user;
			
		}
    public function handle($request, Closure $next, $role)
    {
		
        $id=Authorizer::getResourceOwnerId();
		$users = $this->user->find($id);
		
		if($users->rules != $role){
			abort(403,'Access Forbidden');
			
		}
        return $next($request);
    }
}