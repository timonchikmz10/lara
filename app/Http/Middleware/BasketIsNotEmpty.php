<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasketIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $orderId = session('orderId');
        if (!is_null($orderId) && Order::fullSum() > 0) {
            return $next($request);
        }
        session()->flash('warning', 'Ваш кошик порожній. Додайте нові товари.');
        return redirect()->route('shop');
    }
}
