<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VariationTemplate;
use App\Models\VariationValueTemplate;
use Illuminate\Http\Request;

class VariationTemplateController extends Controller
{
    public function index(){
        $variationTemplate = VariationTemplate::all();
        return view('backend.variationTemplate.index',[
            'variationTemplates' => $variationTemplate,
        ]);
    }

    public function store(Request $request){

        $variationTemplate = new VariationTemplate();
        $variationTemplate->name = $request->name;
        $variationTemplate->save();
        foreach($request->input as $value){
            $variationValueTemplate = new VariationValueTemplate();
            $variationValueTemplate->name = $value;
            $variationValueTemplate->variationTemplate_id = $variationTemplate->id;
            $variationValueTemplate->save();
        }
        return back();
    }

    public function edit($id){
        $variationTemplate = VariationTemplate::find($id);

        return view('backend.variationTemplate.edit', [
            'variationTemplate' => $variationTemplate,
        ]);
    }

    public function update(Request $request,$id){

        // dd($request->all());

        $variationTemplate = VariationTemplate::find($id);
        $variationTemplate->name = $request->name;
        $variationTemplate->save();

        foreach($request->input as $key => $value){
            if($request->input_id[$key]==null){
                $variationValueTemplate = new VariationValueTemplate();
                $variationValueTemplate->name = $value;
                $variationValueTemplate->variationTemplate_id = $variationTemplate->id;
                $variationValueTemplate->save();
            } 
            else{
                $variationValueTemplate = VariationValueTemplate::find($request->input_id[$key]);
                $variationValueTemplate->name = $value;
                $variationValueTemplate->save();
            } 
        }

        return back();
    }

}
