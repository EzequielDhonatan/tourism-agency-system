<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City\City;
use App\Models\Flight\Flight;
use App\Models\Airport\Airport;
use App\Models\Reserve\Reserve;
use App\User;
use App\Http\Requests\Panel\Reserve\StoreUpdateFormRequest;
use App\Http\Requests\Panel\User\UpdateProfileUserFormRequest;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function index()
    {
        $title = 'Home page';

        $airports = Airport::with('city')->get();

        return view('site.home.index', compact('title', 'airports'));
    }

    public function promotions(Flight $flight)
    {
        $title = 'Promoções';

        $promotions = $flight->promotions();

        return view('site.promotions.index', compact('title', 'promotions'));
    }

    public function search(Request $request, Flight $flight)
    {
        $title = 'Resultados da pesquisa';

        $origin         = getInfoAirport($request->origin);
        $destination    = getInfoAirport($request->destination);

        $flights        = $flight->searchFlights(
                                    $origin['id_airport'], 
                                    $destination['id_airport'], 
                                    $request->date
                                );

        return view('site.search.index', [
            'title'         => $title,
            'origin'        => $origin['name_city'],
            'destination'   => $destination['name_city'],
            'flights'       => $flights,
            'date'          => formatDateAndTime($request->date)
        ]);
    }

    public function detailsFlight($idFlight)
    {
        ## RECUPERA
        if (!$flight = Flight::with(['origin', 'destination'])->find($idFlight))
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## TÍTULO
        $title = "Detalhes do voo: {$flight->id}";

        return view('site.flights.details', compact('flight', 'title'));
    }

    public function reserveFligth(StoreUpdateFormRequest $request, Reserve $reserve)
    {
        if ( !$reserve->newReserve($request->flight_id) )
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao reservar!');
                            
        return redirect()
                        ->route('purchase.index')
                        ->withSuccess('Reserva realizada com sucesso!');
    }
    
    public function myPurchase()
    {
        $title = 'Minhas compras';

        $purchases = auth()
                        ->user()
                        ->reserves()
                        ->orderBy('date_reserved')
                        ->get();

        return view('site.purchases.index', compact('title', 'purchases'));
    }

    public function purchaseDetails($idReserve)
    {
        $reserve = Reserve::where('user_id', auth()->user()->id)
                            ->where('id', $idReserve)
                            ->get()
                            ->first();
        
        ## VERIFICA
        if ( !$reserve )
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## RECUPERA
        $flight = Flight::with(['origin', 'destination'])->find($reserve->flight_id);

        ## VERIFICA
        if (!$flight)
            return redirect()
                            ->back()
                            ->withError('Ops... Registro não encontrado!')
                            ->withInput();

        ## TÍTULO
        $title = "Detalhes do voo: {$flight->id}";

        return view('site.purchases.details', compact('flight', 'title'));
    }

    public function myProfile()
    {
        $title = 'Meu Perfil';

        return view('site.users.profile', compact('title'));
    }

    public function updateProfile(UpdateProfileUserFormRequest $request)
    {
        $user = auth()->user();
        $user->name = $request->name;

        if ( $request->hasFile('image') && $request->file('image')->isValid() ) {

            if ( $user->image )
                $nameFile = $user->image;
            else
                $nameFile = $user->name.'.'.$request->image->extension();

            $user->image = $nameFile;

            if ( !$request->image->storeAs('users', $nameFile) )
                return redirect()
                                ->back()
                                ->withError('Ops... Falha ao fazer upload!');
        }

        if ($request->password)
            $user->password = bcript($request->password);

        if( !$user->save() )
            return redirect()
                            ->back()
                            ->withError('Ops... Falha ao atualizar os dados do usuário!');

        return redirect()
                        ->route('my.profile')
                        ->withSuccess('Dados do usuário atualizado com sucesso!');
            
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
