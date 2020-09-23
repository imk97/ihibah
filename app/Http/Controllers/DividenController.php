<?php

namespace App\Http\Controllers;

use App\Dividen;
use App\Exports\DividensExport;
use App\Notifications\IDividen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

class DividenController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            
            $all = DB::table('dividens')->get();
            if(view()->exists('home')) {
                return view('home')->with('data', $all);
            } else {
                abort(404);
            }
        } else {
            abort(401);
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()) {
            if (view()->exists('dividenForm')) {
                return view('dividenForm');
            } else {
                abort(404);
            }
        } else {
            abort(401);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validate = $request->validate(
                [
                    'bank' => ['required'],
                    'account' => ['required'],
                    'startDura' => ['required'],
                    'endDura' => ['required'], 
                    'month' => ['required'], 
                    'interest' => ['required'], 
                    'lastDura' => ['required'], 
                    'valLastDura' => ['required'], 
                    'total' => [],
                    'accBill' => ['nullable']
                ]
            );
            // $validate['total'] = str_replace(",", "", $validate['total']);
            // $validate['valLastDura'] = str_replace(",", "", $validate['valLastDura']);
            $insert = DB::table('dividens')->insert([$validate]);

            if ($insert == true) {
                if (view()->exists('home')) {
                    $request->session()->flash('status', 'Data berjaya disimpan!');
                    return redirect()->action('DividenController@index');
                } else {
                    abort(404);
                }
                
            } else {
                abort(505);
            }
            
        } else {
            abort(401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $one = DB::table('dividens')->where('id',$id)->first();
            if ($one == true) {
                return response()->json(['single' => $one]);    
            } else {
                abort(500);
            }
 
        } else {
            abort(401);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $single = DB::table('dividens')->where('id', $id)->first();
            if ($single == true) {
                if (view()->exists('EditDividenForm')) {
                    return view('EditDividenForm')->with('data', $single); 
                } else {
                    abort(404);
                }

            } else {
                abort(500);
            }
            
        } else {
            abort(401);
        }

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

        if (Auth::check()) {
            $validate = $request->validate([
                'bank' => ['required'],
                'account' => ['required'],
                'startDura' => ['required'],
                'endDura' => ['required'], 
                'month' => ['required'], 
                'interest' => ['required'], 
                'lastDura' => ['required'], 
                'valLastDura' => ['required'], 
                'total' => [],
                'accBill' => []
            ]);

            $update = DB::table('dividens')->where('id', $id)->update([
                'bank' => $validate['bank'],
                'account' => $validate['account'],
                'startDura' => $validate['startDura'],
                'endDura' => $validate['endDura'],
                'month' => $validate['month'],
                'interest' => $validate['interest'],
                'lastDura' => $validate['lastDura'],
                'valLastDura' => $validate['valLastDura'],
                'total' => $validate['total'],
                'accBill' => $validate['accBill']
            ]);

            if($update == true) {
                if (view()->exists('main')) {
                    $request->session()->flash('status', 'Data berjaya diubah!');
                    return redirect()->action('DividenController@index');
                } else {
                    abort(404);
                }
            } else {
                abort(500);
            }

        } else {
            abort(401);
        }
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if (Auth::check()) {
            $del = DB::table('dividens')->where('id',$id)->delete();
            if ($del == true) {
                if (view()->exists('home')) {
                    $request->session()->flash('delete', 'Data berjaya dipadam!');
                    return redirect()->route('home');
                } else {
                    abort(404);
                }
   
            } else {
                abort(500);
            }
            
        } else {
            abort(401);
        }

    }

    /**
     * Notification the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remainder()
    {
        // $remainderDura = DB::table('dividens')->select('endDura')->get();
        // if ($remainderDura == true) {
        //     for($i = 0; $i < $remainderDura->count(); $i++) {
        //         $calDay = date_diff(date_create_from_format('Y-m-d', $remainderDura[$i]->endDura), date_create_from_format('Y-m-d', date('Y-m-d')));
        //         $diff = $calDay->format("%a");
    
        //         if($diff == '0') {
        //             $info = DB::table('dividens')->select('id','bank','account')->where('endDura', $remainderDura[$i]->endDura)->get();
        //             $id = DB::table('users')->pluck('id');
        //             echo count($info);
        //             $user = User::find($id);
        //             Notification::send($user, new IDividen($info));
        //         }
        //     }
                
        // } 

        $date = date('Y-m-d');
        $all = DB::table('dividens')->where('endDura', $date)->select('bank', 'account')->get();
        if ($all->count() > 0) {
            # code...
            $id = DB::table('users')->pluck('id');
            $user = User::find($id);
            Notification::send($user, new IDividen($all));
        }
  
    }
    
    /**
     * Export the resource to excel format
     */
    public function excel() {
        // return Excel::download(new DividensExport('2018-12-31'), 'dividens.xlsx');
        return (new DividensExport)->download('dividens.xlsx');
    }

    /**
     * Export the specific resource to pdf format
     */
    public function pdf(Request $request) 
    {
        // echo date("Y", strtotime($request->input('checkdate')));
        $data = DB::table('dividens')
                        ->whereYear('endDura', $request->input('year'))
                        ->get();
        // printf($data);
        // $data = DB::table('dividens')->whereBetween('endDura', [$request->input('first'), $request->input('last')])->orderBy('bank')->get();
        

        // if ($data == true) {
        //     $sum = DB::table('dividens')
        //             ->select('bank', DB::raw("SUM(valLastDura) as Sum"), DB::raw("SUM(total) as total"))
        //             ->whereBetween('endDura', [ $request->input('first'), $request->input('last') ])
        //             ->groupBy('bank')
        //             ->get();
        // } else {
        //     abort(500);
        // }
        
        return view('exports.dividenpdf')
                ->with('data', $data);
                // ->with('sum', $sum);
    }
}
