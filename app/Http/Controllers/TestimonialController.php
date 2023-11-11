<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::getAllTestimonial();
        // return $category;
        return view('backend.testimonial.index')->with('testimonials',$testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'name'=>'string|required',
            'description'=>'string|required',
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data= $request->all();
        $status=Testimonial::create($data);
        if($status){
            request()->session()->flash('success','Testimonial successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('testimonails.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        return view('backend.testimonial.edit')->with('testimonial',$testimonial);
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
        $testimonial=Testimonial::findOrFail($id);
        $this->validate($request,[
            'name'=>'string|required',
            'description'=>'string|required',
            'photo'=>'string|required',
            'status'=>'required|in:active,inactive',
        ]);
        $data= $request->all();

        $status=$testimonial->fill($data)->save();
        if($status){
            request()->session()->flash('success','Testimonial successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('testimonails.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        $status=$testimonial->delete();

        if($status){
            request()->session()->flash('success','Testimonial successfully deleted');
        }
        else{
            request()->session()->flash('error','Error while deleting testimonial');
        }
        return redirect()->route('testimonails.index');
    }
}
