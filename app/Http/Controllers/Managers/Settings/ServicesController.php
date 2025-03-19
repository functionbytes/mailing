<?php

namespace App\Http\Controllers\Managers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class ServicesController extends Controller
{

    public function index(Request $request){

        $searchKey = null ?? $request->search;
        $available = null ?? $request->available;

        $services = Service::descending();

        if ($searchKey) {
            $services = $services->where('title', 'like', '%' . $searchKey . '%');
        }

        if ($request->available != null) {
            $services = $services->where('available', $available);
        }

        $services = $services->paginate(paginationNumber());

        return view('managers.views.settings.services.index')->with([
            'services' => $services,
            'available' => $available,
            'searchKey' => $searchKey,
        ]);

    }

    public function create(){

        return view('managers.views.settings.services.create')->with([

        ]);

    }

    public function view($uid){

        $service = Service::uid($uid);

        return view('managers.views.settings.services.view')->with([
            'categorie' => $service
        ]);

    }

    public function edit($uid){

        $service = Service::uid($uid);

        return view('managers.views.settings.services.edit')->with([
            'categorie' => $service,
        ]);

    }

    public function store(Request $request){

        $service = new Service;
        $service->uid = $this->generate_uid('services');
        $service->title = $request->title;
        $service->available = $request->available;
        $service->save();

        return response()->json([
            'success' => true,
            'message' => 'Se ha creado correctamente',
        ]);

    }

    public function update(Request $request){

        $service = Service::uid($request->uid);
        $service->title = $request->title;
        $service->available = $request->available;
        $service->update();

        return response()->json([
            'success' => true,
            'message' => 'Se ha actualizo correctamente',
        ]);

    }

    public function destroy($uid){

        $service = Service::uid($uid);
        $service->delete();

        return redirect()->back();

    }





}
