<?php

namespace App\Http\Controllers;

use App\Nahrim;
use App\Coordinate;

class RainfallsController extends Controller
{
    public function location()
    {
        // $city = [];
        // $location = Nahrim::all();
        // foreach ($location as $l) {
        //     $city[] = $l->location;
        // }

        // return response()->json(array_unique($city), 200);
        $location = Coordinate::all();
        return $location;
        return response()->json($location, 200);
    }

    public function calculation()
    {
        $tank_size = request()->tanksizes;
        $loc = request()->location;
        $area = request()->area;
        $flush = request()->flush;
        $coefficient = request()->coefficient;
        $demand = (request()->demand / 1000);
        $location = request()->average;
        $alldata = Nahrim::where('location', $loc)->get();
        $test = [];
        $number_of_day = 0;
        $daycount = 0;
        $i = 0;
        $day_col = [];
        $day = [];
        $total_day = 0;
        $total_rainfalls = 0;
        $tank_volume = 0;
        $tankvol_1 = 0;
        $overflow = 0;
        $total_overflow = 0;
        $total_delivered = 0;
        $total_day_volume_not_meet = 0;
        $total_no_rain_day = 0;
        $total_no_rain_tank_empty = 0;
        $counter = 0;
        $currentyear=0;
        $endyear=0;
       // $monthlyaveragedelivered=[];
        //$users = nahrimapp::table('users')->where('votes', '=', 100)->get();
        foreach ($alldata as $data) {
            $currentyear=$data->year;
            if ($currentyear>$endyear) {
                $counter = $counter+1;
            }
            $endyear=$data->year;
            if ($data->month == '1') {
                // $a[$i] = $data->year.$data->month;
                $number_of_day = 31;
            //$i = $i +1;
            } elseif ($data->month == '2') {
                if ($data->year == '1988' || $data->year == '1992' || $data->year == '1996' || $data->year == '2000' || $data->year == '2004' || $data->year == '2008' || $data->year == '2012') {
                    $number_of_day = 29;
                } else {
                    $number_of_day = 28;
                }
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
            } elseif ($data->month == '3') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } elseif ($data->month == '4') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 30;
            } elseif ($data->month == '5') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } elseif ($data->month == '6') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 30;
            } elseif ($data->month == '7') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } elseif ($data->month == '8') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } elseif ($data->month == '9') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 30;
            } elseif ($data->month == '10') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } elseif ($data->month == '11') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 30;
            } elseif ($data->month == '12') {
                // $a[$i] = $data->year.$data->month;
                // $i = $i +1;
                $number_of_day = 31;
            } else {
                // code...
            }
            //rain captured
            for ($j = 1; $j <= $number_of_day; ++$j) {
                $day = 'day_'.$j;
                $total_day = $total_day + 1;
                $rainfall[$i][$j] = ($data->$day / 1000) * $area * $coefficient;
                $total_rainfalls = $total_rainfalls + $rainfall[$i][$j];
            }
            //rain delivered
            for ($k = 1; $k < $number_of_day; ++$k) {
                $day = 'day_'.$k;
                $rainfall[$i][$k] = ($data->$day / 1000) * $area * $coefficient;
                if (($rainfall[$i][$k] + $tank_volume) > $tank_size) {
                    $overflow = ($rainfall[$i][$k] + $tank_volume) - $tank_size;
                    $tank_volume = $tank_size - $demand;
                    $total_delivered = $total_delivered + $demand;
                    //$monthlyaveragedelivered[$data->month] = $monthlyaveragedelivered[$data->month] + $dailydemand;
                    // $monthlytotaldelivered[$counter][$x] = $monthlytotaldelivered[$counter][$x] + $dailydemand;
                    $tankvol_1 = $tank_volume;
                    $total_overflow = $total_overflow + $overflow;
                } else {
                    if (($rainfall[$i][$k] + $tank_volume) > $demand) {
                        $tank_volume = ($rainfall[$i][$k] + $tank_volume) - $demand;
                        //$monthlyaveragedelivered[$data->month] = $monthlyaveragedelivered[$data->month] + $demand;
                        // $monthlytotaldelivered[$counter][$x] = $monthlytotaldelivered[$counter][$x] + $dailydemand;
                        $total_delivered = $total_delivered + $demand;
                        $tankvol_1 = $tank_volume;
                    } else {
                        $not_meet = $demand - ($rainfall[$i][$k] + $tank_volume);
                        $total_delivered = $total_delivered + ($rainfall[$i][$k] + $tank_volume);
                        //$monthlyaveragedelivered[$data->month] = $monthlyaveragedelivered[$data->month] + ($rainfall + $tank_volume);
                        // $monthlytotaldelivered[$counter][$x] = $monthlytotaldelivered[$counter][$x] + ($dailyraincaptured + $tankvol);
                        $tankvol_1 = $tank_volume;
                        $tank_volume = 0;
                        $total_day_volume_not_meet = $total_day_volume_not_meet + 1;
                    }
                }
                $deliverd_average_per_day = number_format($total_delivered / $total_day, 2);
            }
            //no rain day
            for ($l = 1; $l <= $number_of_day; ++$l) {
                $day = 'day_'.$l;
                if ($data->$day == 0) {
                    $total_no_rain_day = $total_no_rain_day + 1;
                }
            }
            //No rain and tank empty
            for ($l = 1; $l <= $number_of_day; ++$l) {
                $day = 'day_'.$l;
                if ($data->$day == 0 && $tankvol_1 == 0) {
                    $total_no_rain_tank_empty = $total_no_rain_tank_empty + 1;
                }
            }
            $i = $i + 1;
        }
        $reliabilityratio = number_format(($total_delivered / ($demand * $total_day)) * 100, 2);
        $coefficient = number_format(($total_delivered / $total_rainfalls) * 100, 2);
        $storageefficiency = number_format((1 - ($total_overflow / $total_rainfalls)) * 100, 2);
        $percenttankempty = number_format(($total_day_volume_not_meet / $total_day) * 100, 2);



        $test = ['location' => $data->location,
                    'total_day' => $total_day,
                    'total_captured' => number_format($total_rainfalls, 2),
                    'total_delivered' => number_format($total_delivered, 2),
                    'daily_average_delivered' => $deliverd_average_per_day,
                    'volume_not_meet' => $total_day_volume_not_meet,
                    'total_no_rain_day' => $total_no_rain_day,
                    'norain_tankempty' => $total_no_rain_tank_empty,
                    'reliability' => $reliabilityratio,
                    'coefficient' => $coefficient,
                    'storage_efficient' => $storageefficiency,
                    'percent_tank_empty' => $percenttankempty,
                    'counter'=> $counter
                   // 'monthly_delivered' => $monthlyaveragedelivered
                ];

        //return $test;
        return response()->json($test);
        // return request()->all();
    }

    public function simulation(){
        
        return request()->all();
    }

    public function average()
    {
        $loc = request()->location;
        $location = $loc;

        $alldata = Nahrim::where('location', $location)->get();
        $year = [];
        foreach ($alldata as $data) {
           $year[]= $data->year;
        }
        $totalyears = count(array_unique($year));
        $yearname=[];
        foreach(array_unique($year) as $y){
            $yearname[]=$y;
        }
        //$index = $data->first()->year;

        $totalbyyear=[0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
        $currentyear=0;
        $endyear=0;
        $counter=-1;
        $day= 1;
        $total= [0,0,0,0,0,0,0,0,0,0,0,0];

        // for(){

            foreach ($alldata as $data) {

                                                $currentyear=$data->year;
                                                if ($currentyear>$endyear) {
                                                    $counter = $counter+1;
                                                }
                                                $endyear=$data->year;


                // if ($currentyear>$endyear) {
                //     $counter = $counter+1;
                // }
                // $endyear=$data->year;
                if ($data->month == '1') {
                    // $a[$i] = $data->year.$data->month;
                    $number_of_day = 31;
                    $i=1;
                //$i = $i +1;
                } elseif ($data->month == '2') {
                    if ($data->year == '1988' || $data->year == '1992' || $data->year == '1996' || $data->year == '2000' || $data->year == '2004' || $data->year == '2008' || $data->year == '2012') {
                        $number_of_day = 29;
                        $i=2;
                    } else {
                        $number_of_day = 28;
                        $i=2;
                    }
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                } elseif ($data->month == '3') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=3;
                } elseif ($data->month == '4') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 30;
                    $i=4;
                } elseif ($data->month == '5') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=5;
                } elseif ($data->month == '6') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 30;
                    $i=6;
                } elseif ($data->month == '7') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=7;
                } elseif ($data->month == '8') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=8;
                } elseif ($data->month == '9') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 30;
                    $i=9;
                } elseif ($data->month == '10') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=10;
                } elseif ($data->month == '11') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 30;
                    $i=11;
                } elseif ($data->month == '12') {
                    // $a[$i] = $data->year.$data->month;
                    // $i = $i +1;
                    $number_of_day = 31;
                    $i=12;
                } else {
                    // code...
                }
                    for ($j = 1; $j <= $number_of_day; ++$j) {
                        $k = $data->month;
                        $day = 'day_'.$j;

                        $total[$i-1] = $total[$i-1] + $data->$day;
                        $totalbyyear[$counter] = $totalbyyear[$counter] + $data->$day;

                    }
            }
        // }
        $data = [
            'years'=>$yearname,
            'byyear' => $totalbyyear,
            'monthlyTotal' => $total,
            'totalYears' => $totalyears
        ];
       return response()->json($data) ;
        //$average =  array_unique($year);

        //return response()->json($average);
    }
}
