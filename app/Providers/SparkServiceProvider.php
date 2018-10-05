<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'business4you AG',
        'product' => 'PowerPlay',
        'street' => 'Grenchenstrasse 5a',
        'location' => 'CH-2504 Biel-Bienne',
        'phone' => '+41 32 376 00 76',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'linus.rudolph@business4you.ch'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::collectBillingAddress();
        Spark::promotion('coupon-code');
        //Laravel\Cashier\Cashier::useCurrency('eur', '€');
        
        Spark::useStripe()->noCardUpFront()->trialDays(10);

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Professional Monthly', 'pro-month')
            ->price(19)
            ->features([
                'First', 'Second', 'Third'
            ]);
        Spark::plan('Professional Yearly', 'pro-year')
            ->price(199)
            ->yearly()
            ->features([
                'First', 'Second', 'Third'
            ]);
    }
}
