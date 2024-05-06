<?php

namespace App\Providers;

use App\Actions\Webshop\MigrateSessioncart;
use App\Factories\CartFactory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
     
            if ($user && Hash::check($request->password, $user->password)) {
                (new MigrateSessioncart())->migrate(CartFactory::make(), $user->cart()->firstOrCreate());

                return $user;
            }
        });

        Blade::stringable(function (Money $money){
            $currencies = new ISOCurrencies();
            $numberFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
            $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

            return $moneyFormatter->format($money);
        });
    }
}
