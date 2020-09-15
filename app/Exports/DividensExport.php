<?php

namespace App\Exports;

use App\Dividen;
use DateTime;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DividensExport implements FromView, ShouldAutoSize
{
    use Exportable;
    // public function __construct(String $lastDate)
    // {
    //     $this->lastdate = $lastDate;
    // }

    public function view(): \Illuminate\Contracts\View\View
    {
        return view('exports.dividens', [
            'dividens' => DB::table('dividens')->orderBy('bank')->get()
        ]);
    }
    

}
