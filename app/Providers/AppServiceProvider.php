<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Session;
use App\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
          view()->composer('giohang',function($view){
            if(Session('cart')){
              $cart =Session::get('cart');
               $view->with(['product_cart'=>$cart->items]);
          }
      });   
        view()->composer('thanhtoan',function($view){
            if(Session('cart')){
              $cart =Session::get('cart');
               $view->with(['cart'=>$cart,
                        'product_cart'=>$cart->items]);

          }
      });  
      view()->composer('donhang',function($view){
            if(Session('tracuu')){
              $tracuu =Session::get('tracuu');
             
               $view->with(['tracuu'=> $tracuu
                        ]);

          }
      }); 
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
