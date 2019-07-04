<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use DataTables;

class DataTableController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function employee()
    {
        $employees = DB::table('employees as e')
              ->leftJoin('positions as p', 'p.id', '=', 'e.position_id')
              ->select([
                  'e.name',
                  'e.phone',
                  'e.email',
                  'p.name_position as position',
                  'e.salary',
                  'e.employment_date',
                  'e.photo',
              ]);

        return DataTables::of($employees)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("e.name like ?", ["%$keyword%"]);
            })
            ->filterColumn('phone', function ($query, $keyword) {
                $query->whereRaw("e.phone like ?", ["%$keyword%"]);
            })
            ->filterColumn('email', function ($query, $keyword) {
                $query->whereRaw("e.email like ?", ["%$keyword%"]);
            })
            ->filterColumn('position', function ($query, $keyword) {
                $query->whereRaw("p.name_position like ?", ["%$keyword%"]);
            })
            ->editColumn('employment_date', function ($employee) {
                return $employee->employment_date ? with(new Carbon($employee->employment_date))->format('d.m.Y') : '';
            })
            ->filterColumn('employment_date', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(e.employment_date,'%d.%m.%Y') like ?", ["%$keyword%"]);
            })
            ->editColumn('salary', function ($employee) {
                return number_format($employee->salary, 2, ',', ' ').' руб.';
            })
            ->filterColumn('salary', function ($query, $keyword) {
                $query->whereRaw("e.salary like ?", ["%$keyword%"]);
            })
            ->editColumn('photo', function ($employee) {
                if(($employee->photo != null)&&(file_exists(public_path()."/img/photo/mini/".$employee->photo))){
                    return "../img/photo/mini/".$employee->photo;
                } else {
                    return '../img/example_mini.jpg';
                };
            })
            /*->addColumn('action', function($employee) {
                return '';
            })*/
        ->make(true);
    }

    public function position()
    {
        $positions = DB::table('positions as p')
              ->select([
                  'p.name_position as name',
                  'p.default_salary as salary',
              ]);

        return DataTables::of($positions)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereRaw("p.name_position like ?", ["%$keyword%"]);
            })
            ->editColumn('salary', function ($position) {
                return number_format($position->salary, 2, ',', ' ').' руб.';
            })
            ->filterColumn('salary', function ($query, $keyword) {
                $query->whereRaw("p.default_salary like ?", ["%$keyword%"]);
            })
            /*->addColumn('action', function($employee) {
                return '';
            })*/
        ->make(true);
    }
}
