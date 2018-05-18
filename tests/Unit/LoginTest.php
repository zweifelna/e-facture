<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function a_user_can_log_in()
    {
        $user = factory(App\Models\User::class)->create([
             'username' => 'alfredo', 
             'password' => bcrypt('testpass123')
        ]);

        $this->visit(route('login'))
            ->type($user->username, 'username')
            ->type('testpass123', 'password')
            ->press('Login')
            ->see('Gestion des clients')
            ->onPage('/customers');
    }
}
