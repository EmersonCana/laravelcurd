<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use Auth;

class TestimonialsController extends Controller
{
    function viewForm () {
        $testimonials = Testimonial::all();
        $users = User::query()->get();
        $auth = Auth::user();
        return view('pages.create_testimonial', compact(['testimonials', 'users', 'auth']));
    }

    function viewEditForm ($id) {
        $testimonial = Testimonial::find($id);
        return view('pages.edit_testimonial', ['testimonial' => $testimonial]);
    }

    function submitForm (Request $request) {
        $testi = new Testimonial;
        $testi->testimonial = $request->testimonial;
        $testi->created_by = Auth::user()->id;
        if($testi->save()) {
            return redirect('/create-testimonial');
        }else{
            return false;
        }
    }

    function submitEditForm (Request $request, $id) {
        $testimonial = Testimonial::find($id);
        $testimonial->testimonial = $request->testimonial;
        if($testimonial->save()) {
            return redirect('/create-testimonial');
        }else{
            return false;
        }
    }

    function deleteTestimonial ($id) {
        $testimonial = Testimonial::find($id)->delete();
        if($testimonial) {
            return redirect('/create-testimonial');
        }
    }

    function apiGetTestimonials () {
        $testi = Testimonial::all();
        return response()->json($testi);
    }
}
