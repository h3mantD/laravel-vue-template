<?php

use App\Models\User;

test('two factor login renders and accepts a recovery code in the browser', function (): void {
    $user = User::factory()->create([
        'two_factor_secret' => encrypt('JBSWY3DPEHPK3PXP'),
        'two_factor_recovery_codes' => encrypt(json_encode(['browser-test-recovery'])),
        'two_factor_confirmed_at' => now(),
    ]);

    $page = visit(route('login'))
        ->fill('email', $user->email)
        ->fill('password', 'password')
        ->click('Log in')
        ->assertPathIs('/two-factor-challenge')
        ->assertSee('Authentication code')
        ->assertNoJavaScriptErrors()
        ->assertNoConsoleLogs();

    $page->click('login using a recovery code')
        ->assertSee('Recovery code')
        ->click('login using an authentication code')
        ->assertSee('Authentication code')
        ->click('login using a recovery code')
        ->fill('recovery_code', 'browser-test-recovery')
        ->click('Continue')
        ->assertPathIs('/dashboard')
        ->assertSee('Dashboard')
        ->assertNoJavaScriptErrors()
        ->assertNoConsoleLogs();

    $this->assertAuthenticatedAs($user);
});
