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
        Spark::useStripe()->noCardUpFront()->trialDays(30);

        Spark::freePlan()
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::plan('Advanced', 'prod_DiyDh5l2XwRObC')
            ->price(19)
            ->features([
                'First', 'Second', 'Third'
            ]);
        Spark::plan('Professional', 'prod_DiyFLYjx9AVK0w')
            ->price(29)
            ->features([
                'First', 'Second', 'Third'
            ]);
    }
}
