<?php

namespace App\Traits;
use App\User;
use App\Notifications\RequestSmsNotification;
use App\Notifications\smsNotification;
trait SmsTrait
{
    /**
     * @param Rider riquest $request
     * @return $this
     */
    protected function SendRequestSms(User $user) {
        /**
         * Sends a new activation email.
         *
         * @param \App\Models\User $user  The user
         * @param string           $token The token
         */
        $requestRider = request::where('application_id',$review->application_id)->first();
        $loanType = LoanTypes::where('application_id',$review->application_id)->first();
        $applicant = User::where('membership_number',$application->membership_number)->first();
        $data['phone_number'] = $user['phone_number'];
        $user->notify(new RequestSmsNotification($user));
        return $this;
    }

 

}
