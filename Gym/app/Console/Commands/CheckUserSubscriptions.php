<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CheckUserSubscriptions extends Command
{
    protected $signature = 'subscriptions:check';
    protected $description = 'Deactivate expired user subscriptions';

    public function handle()
    {
        $today = Carbon::today();

        $users = User::with('Subscriptions')->get();

        foreach ($users as $user) {
            foreach ($user->Subscriptions as $subscription) {
                if (
                    $subscription->pivot->isActive &&
                    Carbon::parse($subscription->pivot->end_date)->lt($today)
                ) {
                    $user->Subscriptions()->updateExistingPivot($subscription->id, [
                        'isActive' => false,
                    ]);

                    Log::info("✅ Subscription ID {$subscription->id} for User ID {$user->id} marked as inactive.");
                }
            }
        }

        $this->info('✅ Expired subscriptions have been deactivated.');
    }
}
