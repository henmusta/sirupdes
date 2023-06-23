<?php

namespace Modules\{Module}\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\{Module}\Models\{Model};
use Yajra\DataTables\Datatables;

class {Module}Controller extends Controller{

    public function index(Request $request){
        if($request->ajax()){
            $model = {Model}::query();
            return DataTables::of($model)->toJson();
        }
        return view('{module}::pages.index');
    }

    public function create(){
        return view('{module}::pages.form');
    }

    public function store(Request $request){
        $data = $request->validate([
            'id'    => 'required|max:32|unique:{modules},id',
            'name'  => 'required|string'
        ]);
        ${model} = new {Model};
        foreach($data AS $column => $value){
            ${model}->{$column} = $value;
        }
        ${model}->save();
        if($request->ajax()){
            return response()->json([
                'status' => 'OK',
                'message' => '{Module} has been created'
            ]);
        }
        return redirect()->route('module.{modules}.index')->with([
            'status' => 'OK',
            'message' => '{Module} has been created.'
        ]);
    }

    public function show(Request $request, {Model} ${model}){
        return view('{module}::pages.show', compact('{model}'));
    }

    public function edit(Request $request, {Model} ${model}){
        return view('{module}::pages.form', compact('{model}'));
    }

    public function update(Request $request, {Model} ${model}){
        $data = $request->validate([
            'id'    => 'required|max:32|unique:{modules},id,' . ${model}->id,
            'name'  => 'required|string'
        ]);
        foreach($data AS $column => $value){
            ${model}->{$column} = $value;
        }
        ${model}->save();
        if($request->ajax()){
            return response()->json([
                'status' => 'OK',
                'message' => '{Module} has been updated'
            ]);
        }
        return redirect()->route('module.{modules}.index')->with([
            'status' => 'OK',
            'message' => '{Module} has been updated.'
        ]);
    }

    public function destroy(Request $request, {Model} ${model}){
        ${model}->delete();
        if($request->ajax()){
            return response()->json([
                'status' => 'OK',
                'message' => '{Module} has been deleted'
            ]);
        }
        return redirect()->route('module.{modules}.index')->with([
            'status' => 'OK',
            'message' => '{Module} has been deleted.'
        ]);
    }
}
