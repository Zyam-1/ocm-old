<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class listbiochemistry extends Controller
{
    
    public function addnewanalyte() {
        return view('addnewanalyte');
    }


    public function plausibleranges() {
        
        return view('plausibleranges');
    }


    
    public function activereq() {
        
        return view('activereq');
    }


    public function normalranges() {
        
        return view('normalranges');
    }


    public function barcodes() {
        
        return view('barcodes');
    }
}
