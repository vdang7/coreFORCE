<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Inertia\Inertia;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'cart' => $this->getCart()
        ];
    }

    private function getCart()
    {
        $sessionId = session()->getId();

        $cartItems = null;

        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())->get();
        } else {
            $cartItems = Cart::where('session_id', $sessionId)->get();
        }

        return $cartItems->map(function ($cartItem) {
            return [
                'id' => $cartItem->id,
                'product' => $cartItem->product,
            ];
        });
    }
}
