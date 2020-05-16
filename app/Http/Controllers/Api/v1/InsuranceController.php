<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use App\Insurance;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



class InsuranceController  extends Controller
{
    use ApiResponser;
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return List of Insurance
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $insurances = Insurance::all();
        
        return $this->successResponse($insurances);
      
    }

    /**
     * Create one new Insurance
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[

            'name'=>'required|string',
        
        ]);
       
        $insurance = Insurance::create($request->all());          
        return $this->successResponse($insurance,Response::HTTP_CREATED);
       
    }

    /**
     * get one Schedule
     *
     * @return Illuminate\Http\Response
     */
    public function show($insurance)
    {
        //

        $insurance = Insurance::findOrFail($insurance);
        return $this->successResponse($insurance);
        
    }

    /**
     * update an existing one Schedule
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request,$insurance)
    {

        $this->validate($request,[

            'name'=>'string',
          
        ]);
        
        $insurance = Insurance::findOrFail($insurance);
        $insurance->fill($request->all());

        
        if($insurance->isClean()){
            return $this->errorResponse("you didn't change any value",Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $insurance->save();
        return $this->successResponse($insurance);
    }

     /**
     * remove an existing one renewal
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($insurance)
    {
        $insurance = Insurance::findOrFail($insurance);
        $insurance->delete();
        return $this->successResponse($insurance);
      
    }

}
