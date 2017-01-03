<?php

namespace App\Http\Controllers;


use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Bestelling;
use App\User;
use App\Drinks;

use Mail;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        return view('home');
    }

    public function people()
    {   
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }     
        $users = DB::table('users')->where('admin_user', '>', '0')->get();
        return view('people', ['people' => $users]);

    }

    public function drinks(User $user)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $drinks = DB::table('drinks')->get();
        return view('drinks', ['drinks' => $drinks, 'user' => $user]);
    }

    public function areyousure(User $user, Drinks $drinks)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        return view('areyousure', ['drinks' => $drinks, 'user' => $user]);
    }

    public function makenewbetalling(User $user, Drinks $drinks)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $a_user = Auth::user();     
        DB::table('bestelling')->insert(array( 
            'u_id' => $user->id,
            'username' => $user->name,
            'd_id' => $drinks->id,
            'drinkname' => $drinks->name,
            'fullfiledby' => $a_user->id,
            'fbname' => $a_user->name,
            'created_at' => (\DB::raw('CURRENT_TIMESTAMP'))
        ));

        $productprice = DB::table('drinks')->where('id', $drinks->id)->value('verkoop_prijs');
        DB::table('users')->where('id', $user->id)->increment('bill', $productprice);

        DB::commit();

        if(($user->bill) > '15')
        {
            Mail::send('emails.limietmail', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, 'Het Tuinhuis')->subject('Betalings Melding'.$user->updated_at);
            });
        }

        return $this->people();
    }

    public function lastmakenewbetalling(User $user, Drinks $drinks)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $a_user = Auth::user();     
        DB::table('bestelling')->insert(array( 
            'u_id' => $user->id,
            'username' => $user->name,
            'd_id' => $drinks->id,
            'drinkname' => $drinks->name,
            'fullfiledby' => $a_user->id,
            'fbname' => $a_user->name,
            'created_at' => (\DB::raw('CURRENT_TIMESTAMP'))
        ));

        $productprice = DB::table('drinks')->where('id', $drinks->id)->value('verkoop_prijs');
        DB::table('users')->where('id', $user->id)->increment('bill', $productprice);

        DB::commit();

        if(($user->bill) > '15')
        {
            Mail::send('emails.limietmail', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, 'Het Tuinhuis')->subject('Betalings Melding '.$user->updated_at);
            });
        }

        return redirect()->to('totziens');
    }

    public function history()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $bestelling = DB::table('bestelling')->get();
        $sorted = $bestelling->sortByDesc('created_at');

        return view('history', ['order' => $sorted]);

        
    }

    public function dashboard()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $bestelling = DB::table('bestelling')->get();
        $sorted = $bestelling->sortByDesc('created_at');

        return view('dashboard', ['order' => $sorted, 'auth_user' => $a_user]);
    }

    public function bill()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $users = DB::table('users')->where('admin_user', '>', '0')->get();
        return view('bill', ['people' => $users]);
    }

    public function balance()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $users = DB::table('users')->where('admin_user', '>', '0')->get();
        $company = DB::table('company')->where('name', 'tuinhuis')->first();

        $total_bill = 0;

        foreach ($users as $user) {
            $total_bill = $total_bill + $user->bill;
        }

        $total_bill = $total_bill + $company->balance;

        return view('balance', ['bill' => $total_bill, 'people' => $users, 'company' => $company]);
    }


    public function balanceupdate(Request $request)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('company')->where('name', 'tuinhuis')->update(['balance' => $request->newvalue]); 
        return $this->balance();
    }

    public function paybill()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $users = DB::table('users')->where('admin_user', '>', '0')->get();
        return view('paybill', ['people' => $users]);
    }

    public function paybillupdate(Request $request)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('users')->where('id', $request->u_id)->decrement('bill', $request->newvalue);
        $time = \DB::raw('CURRENT_TIMESTAMP');
        DB::table('users')->where('id', $request->u_id)->update(['lastpayed' => $time]);       

        $user = DB::table('users')->where('id', $request->u_id)->first();

        Mail::send('emails.betalingmail', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, 'Het Tuinhuis')->subject('Bestelling '.$user->lastpayed);
        });

        return $this->paybill();
    }

    public function adddrinks()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        return view('adddrink');
    }

    public function adddrinksupdate(Request $request)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('drinks')->insert(array( 
            'name' => $request->name,
            'inkoop_prijs' => $request->store_price,
            'verkoop_prijs' => $request->our_price,
            'aantal_in_stock' => '0',
            'created_at' => (\DB::raw('CURRENT_TIMESTAMP'))
        ));

        DB::commit();
        return view('addconfirm', ['drinks' => $request]);
    }

    public function updatedrinks()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $drinks = DB::table('drinks')->get();
        return view('updatedrinks', ['drinks' => $drinks]);
    }

    public function updatedrinksupdate(Request $request)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('drinks')->where('id', $request->d_id)->update([
            'inkoop_prijs' => $request->new_store_price,
            'verkoop_prijs' => $request->new_sell_price
        ]);
        return $this->updatedrinks();
    }

    public function manageusers()
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        $users = DB::table('users')->get();
        return view('manageusers', ['people' => $users]);
    }

    public function manageusersupgrade(User $user)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('users')->where('id', $user->id)->increment('admin_user', '1');
        return $this->manageusers();
    }

    public function manageusersdowngrade(User $user)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('users')->where('id', $user->id)->decrement('admin_user', '1');
        return $this->manageusers();
    }

    public function manageusersdisable(User $user)
    {
        $a_user = Auth::user();    
        if(($a_user->admin_user) == '0')
        {
            return view('confirmregistration');
        }
        DB::table('users')->where('id', $user->id)->update(['admin_user' => '0']); 
        return $this->manageusers();
    }

}
