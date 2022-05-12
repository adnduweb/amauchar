<?php namespace Amauchar\Core\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class ThrottleFilter implements FilterInterface
{
		/**
		 * This is a demo implementation of using the Throttler class
		 * to implement rate limiting for your application.
		 *
		 * @param RequestInterface|\CodeIgniter\HTTP\IncomingRequest $request
		 * @param array|null                                         $arguments
		 *
		 * @return mixed
		 */
		public function before(RequestInterface $request, $arguments=null)
		{
				$throttler=Services::throttler();

				// Restrict an IP address to no more
				// than 1 request per second across the
				// entire site. 
				if ($request->getMethod() == "post") {
						
						$ip_addr = ( $request->getIPAddress() == '::1') ? '127.0.0.1' : $request->getIPAddress();

						if(service('router')->methodName() == 'loginAction'){
							if ($throttler->check('loginAction_' . $ip_addr, 4, MINUTE) === false)
							{
								if($request->isAJAX()){

									

									return Services::response()
									->setJSON(['error' => ['message' => lang('Auth.tooManyRequests', [$throttler->getTokentime() ] ) ] ] )
									->setStatusCode(ResponseInterface::HTTP_TOO_MANY_REQUESTS);
									
								
								}else{
									die(view('/errors/html/error_429', ['url' => current_url()]));
									return Services::response()->setStatusCode(429);
								}
							}
						}else{
							if ($throttler->check($ip_addr, 10, MINUTE) === false)
							{	
								if($request->isAJAX()){

									return Services::response()
									->setJSON(['error' => ['message' => lang('Auth.tooManyRequests', [$throttler->getTokentime() ] ) ] ] )
									->setStatusCode(ResponseInterface::HTTP_TOO_MANY_REQUESTS);
									
								
								}else{
									die(view('/errors/html/error_429', ['url' => current_url()]));
									return Services::response()->setStatusCode(429);
								}
							}
						}
				}
		}

		//--------------------------------------------------------------------

		/**
		 * We don't have anything to do here.
		 *
		 * @param RequestInterface|\CodeIgniter\HTTP\IncomingRequest $request
		 * @param ResponseInterface|\CodeIgniter\HTTP\Response       $response
		 * @param array|null                                         $arguments
		 *
		 * @return mixed
		 */
		public function after(RequestInterface $request, ResponseInterface $response, $arguments=null)
		{
		}
}