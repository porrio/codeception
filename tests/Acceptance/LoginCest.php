<?php

declare(strict_types=1);

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LoginCest
{
    public function userWorks(AcceptanceTester $I): void
    {
        $I->amOnPage('/user/login'); //go to login page
        $I->see('Inloggen of registreren'); //check if login page contains "Inloggen of registreren"
        $I->fillField('#login-emailadres', 'jellewoord2010@gmail.com'); 
        $I->fillField('#login-password', 'secret!');
        $I->click('Inloggen');
        $I->see('Hallo, Jelle!');
    }
}
