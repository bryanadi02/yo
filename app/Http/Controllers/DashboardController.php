<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth');
    }
    
    public function index()
    {
        $jumlah = Siswa::all()->count();
        $jumlah2 = Project::all()->count();
        return view ('dashboard', compact('jumlah', 'jumlah2'));
    }


}
