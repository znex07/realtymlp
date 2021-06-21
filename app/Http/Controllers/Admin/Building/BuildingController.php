<?php

namespace App\Http\Controllers\Admin\Building;

use App\Building_Tables;
use App\Location;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Validator;
use Response;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locProvince = Location::where('type', '=', 1)
            ->select('id','name')
            ->orderByRaw("case when name = 'Metro Manila' then id else name end asc")
            ->get();
        $bldg = Building_Tables::orderBy('bldg_name','DESC')->get();
        return view('main.admin.buildings.index',compact('locProvince','bldg'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bldg_name' => 'required|max:255',
            'province' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database

            return \Illuminate\Support\Facades\Response::json(['success' => '1']);

        }

        return \Illuminate\Support\Facades\Response::json(['errors' => $validator->errors()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'bldg_name' => 'required|max:255',
            'province' => 'required|max:255',
            'city' => 'required|max:255',
            'brgy' => 'required|max:255',
            'street_address' => 'required|max:255',
        ]);
        if ($validator->passes()) {
                Building_Tables::create([
                    'bldg_name' => $request['bldg_name'],
                    'province_id' => $request['province'],
                    'province_name' => $request['province_name'],
                    'city_id' => $request['city'],
                    'city_name' => $request['city_name'],
                    'brgy' => $request['brgy'],
                    'street_address' => $request['street_address'],
                ]);
            return Response::json(['success' => '1']);
        }
        return Response::json(['errors' => $validator->errors()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showData(Input $input)
    {
        //
        $city = Location::where('parent_id',$input->get('province'))->get();
        return $city;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
