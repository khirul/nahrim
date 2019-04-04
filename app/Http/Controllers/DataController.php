<?php

namespace App\Http\Controllers;

use Exporter;
use Importer;
use App\Nahrim;
use App\Coordinate;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function export()
    {
        $yourCollection = Nahrim::all();
        // return $yourCollection;
        $excel = Exporter::make('Excel');
        $excel->load($yourCollection);
        return $excel->stream('rains.xlsx');
    }
    public function station_upload()
    {
    
        $excel = Importer::make('Excel');
        $excel->load(request()->file('file'));
        $collection = $excel->getCollection();
        for($i=1; $i < $collection->count(); $i++) { 
    
            
        Coordinate::firstOrCreate(['stn_name'=>$collection[$i][1]],[
            'stn_no'=>$collection[$i][0],
            'stn_name'=>$collection[$i][1],
            'state'=>$collection[$i][2],
            'district'=>$collection[$i][3],
            'longitude'=>$collection[$i][4],
            'latitude'=>  $collection[$i][5]
        ]);

        }
        return response()->json('Done');
    }

    public function rain_upload()
    {
        Nahrim::truncate();
        $excel = Importer::make('Excel');
        $excel->load(request()->file('file'));
        $collection = $excel->getCollection();
        for($i=1; $i < $collection->count(); $i++) { 
    
            
        Nahrim::firstOrCreate([
            'location'=>$collection[$i][0],
            'year'=>$collection[$i][1],
            'month'=>$collection[$i][2],
            'day_1'=>$collection[$i][3],
            'day_2'=>$collection[$i][4],
            'day_3'=>$collection[$i][5],
            'day_4'=>$collection[$i][6],
            'day_5'=>$collection[$i][7],
            'day_6'=>$collection[$i][8],
            'day_7'=>$collection[$i][9],
            'day_8'=>$collection[$i][10],
            'day_9'=>$collection[$i][11],
            'day_10'=>$collection[$i][12],
            'day_11'=>$collection[$i][13],
            'day_12'=>$collection[$i][14],
            'day_13'=>$collection[$i][15],
            'day_14'=>$collection[$i][16],
            'day_15'=>$collection[$i][17],
            'day_16'=>$collection[$i][18],
            'day_17'=>$collection[$i][19],
            'day_18'=>$collection[$i][20],
            'day_19'=>$collection[$i][21],
            'day_20'=>$collection[$i][22],
            'day_21'=>$collection[$i][23],
            'day_22'=>$collection[$i][24],
            'day_23'=>$collection[$i][25],
            'day_24'=>$collection[$i][26],
            'day_25'=>$collection[$i][27],
            'day_26'=>$collection[$i][28],
            'day_27'=>$collection[$i][29],
            'day_28'=>$collection[$i][30],
            'day_29'=>$collection[$i][31],
            'day_30'=>$collection[$i][32],
            'day_31'=>$collection[$i][33],
        ]);

        }
        return response()->json('Done');
    }
}
