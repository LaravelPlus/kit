<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Navbar;
use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Middleware;

final class HandleInertiaRequests extends Middleware
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
            'auth'   => $this->getAuthenticatedUser($request),
            'teams'  => $this->getUserTeams(),
            'navbar' => $this->getNavbar(),
        ];
    }

    /**
     * Get the authenticated user.
     */
    private function getAuthenticatedUser(Request $request): array
    {
        return [
            'user' => $request->user(),
        ];
    }

    /**
     * Get teams for the authenticated user.
     */
    private function getUserTeams(): array
    {
        $user = auth()->user();

        if (!$user) {
            return [];
        }

        return Team::where('user_id', $user->id)
            ->select('id', 'name', 'slug')
            ->get()->toArray();
    }

    private function getNavbar(): array|object
    {
        return Navbar::with('children')
//            ->where('is_active', true)
            ->whereNull('parent_id') // Fetch top-level menu items
            ->orderBy('order')
            ->get();
    }
}
