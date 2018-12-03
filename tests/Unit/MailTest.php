<?php


namespace Tests\Unit;



use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class MailTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function send_email()
    {

        $user = factory(User::class)->create();

        Mail::to($user())->send(new TestEmail());
    }
}