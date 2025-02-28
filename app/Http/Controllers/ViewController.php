<?php
namespace App\Http\Controllers;
use App\Models\BuyVehicle;
use App\Models\Lead;
use App\Models\Master;
use App\Models\Vehicle;
use App\Models\Customer;
use App\Models\SliderImages;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ViewController extends Controller
{
    public function dashboard()
    {
        $vehiclescount = Vehicle::count();
        $vehiclelist = Vehicle::get();
        $masterdata = Master::where('type','=','Vehicle')->get();
        $arrnew = array();
        foreach ($masterdata as $master) {
            $vehicletypecount = Vehicle::where('type', '=', $master->value)->count();
            $arrnew[] = [
                'value' => $master->value,
                'count' => $vehicletypecount,
            ];
        }
        $vehilecounttotal = json_encode($arrnew);
        $arraytwo = array();
        foreach ($vehiclelist as $vehicles) {
            $vehicletypecount = BuyVehicle::where('vehicle_id', '=', $vehicles->id)->count();
            $arraytwo[] = [
                'value' => $vehicles->name,
                'count' => $vehicletypecount,
            ];
        }
        $vechiletypecount = json_encode($arraytwo);
        // dd($jsonData);

        $BuyVehiclescount = BuyVehicle::count();
        $Customerscount = Customer::count();
        $leadcount = Lead::count();
        $allleads = Lead::orderByDesc('created_at')->get();
        // dd($vehiclescount);
        return view('dashboard', compact('allleads','vehilecounttotal','vechiletypecount','vehiclescount','BuyVehiclescount','Customerscount','leadcount'));
    }
    public function viewmaster()
    {
        $modelInstance = new User();
        $res = $modelInstance->checkID();
        $masterdata = Master::where('parent_id', '=', $res)->where('type', '=', 'Master')->get();
        return view('addmaster', compact('masterdata'));
    }

    public function viewsubmaster()
    {
        $modelInstance = new User();
        $res = $modelInstance->checkID();
        $masterdata = Master::where('parent_id', '=', $res)->where('type', '=', 'Master')->get();
        return view('submaster', compact('masterdata'));
    }

    public function viewaddvehicle()
    {
        $masterdata = Master::where('type', '=', 'Vehicle')->get();
        $masterdatacolor = Master::where('type', '=', 'color')->get();
        return view('addvehicle', compact('masterdata', 'masterdatacolor'));
    }

    public function viewvehicles()
    {
        $allvehicles = Vehicle::paginate(10);
        return view('allvehicles', compact('allvehicles'));
    }

    public function viewaddcustomer()
    {
        return view('addcustomer');
    }

    public function viewallcustomers()
    {
        $allcustomers = Customer::paginate(10);
        return view('allcustomers', compact('allcustomers'));
    }

    public function viewbuyvehicles(Request $request, $id)
    {
        $customerid = $id;
        $masterdata = Master::where('type', '=', 'vehicle')->get();
        $mastercolor = Master::where('type', '=', 'color')->get();
        $vehicleid = Vehicle::pluck('id');
        // dd($vehicleid);
        return view('buyvehicle', compact('masterdata', 'mastercolor', 'customerid', 'vehicleid'));
    }

    public function viewuservehicles($id)
    {
        $buyvehiclesdata = BuyVehicle::join('vehicles', 'vehicles.id', '=', 'buy_vehicles.vehicle_id')
            ->select('buy_vehicles.*', 'vehicles.image as vehicleImage', 'vehicles.name as vehicleName', 'vehicles.discription as vehicleDis', 'vehicles.modelno as vehicleModel')
            ->where('buy_vehicles.customer_id', $id)
            ->get();

        if ($buyvehiclesdata->isEmpty()) {
            return back()->with('error', 'no records found..!!!!');
        } else {
            // Process the retrieved records
            return view('uservehicles', compact('buyvehiclesdata'));
        }

    }

    public function viewvehicledetailpage($id)
    {
        $buyvehiclesdata = BuyVehicle::join('vehicles', 'buy_vehicles.vehicle_id', '=', 'vehicles.id')
            ->select('buy_vehicles.*', 'vehicles.*')
            ->where('buy_vehicles.id', $id)
            ->get();
        return view('vehicledetailpage', compact('buyvehiclesdata'));
    }

    //WEBSITE VIEWS

    public function frontendhomepage()
    {
        return view('home');
    }
    public function frontendaboutpage()
    {
        return view('about');
    }
    public function frontendcontactpage()
    {
        return view('contact');
    }
    public function frontendvehiclespage()
    {
        $allvehicles = Vehicle::paginate(4);
        return view('vehicles', compact('allvehicles'));
    }

    //WEBSITE VIEWS ENDS


    //USER PANEL VIEWS
    public function viewuserpanelhome()
    {
        $user = Auth::guard('customer')->user();
        $sliderimages = SliderImages::where('type', 'userhomeslider')->get();
        $vehiclesdata = Vehicle::get();
        //dd($sliderimages);
        return view('userpanelviews.home', compact('sliderimages', 'vehiclesdata', 'user'));
    }

    public function viewloginpage()
    {
        return view('auth.userauth.login');
    }
}
