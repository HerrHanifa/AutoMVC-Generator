<?php

namespace App\Http\Controllers\Backend\frontEndController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Article;
use App\Models\UserWebsite;

class GetSearchedController extends Controller
{
    public function searchValid(){
        
        return view('Frontend.valid');
    }
    public function search(){
        return view('Frontend.SearchDB_page');
        
    }
    public function DoSearchDB(Request $request){
        
        $GetRequestName   = $request->input('name');
        $GetRequestWork   = $request->input('job');
        $GetRequestCert   = $request->input('lastCertification');
        
        if($GetRequestName != ' ' || $GetRequestWork != ' ' || $GetRequestCert != ' '){
            if(isset($GetRequestName) || isset($GetRequestWork) || isset($GetRequestCert) || isset($GetRequestIsWork)){
                if(isset($GetRequestName)){
                    $getAllResults = UserWebsite::where('name' , 'LIKE' , $GetRequestName . '%')->paginate(12)->withQueryString();
                    // dd($userSearcheByname);
                    if(count($getAllResults) > 0){
                    return view('Frontend.getDataBySearched' , compact('getAllResults'));
                        
                    }
                    return view('Frontend.getDataBySearched' , compact('getAllResults'));
                }
                else if(isset($GetRequestWork)){
                    
                    $getAllResults = UserWebsite::where('job' , 'LIKE' , $GetRequestWork . '%')->paginate(12)->withQueryString();
                    // dd($userSearcheByname);
                    if(count($getAllResults) > 0){
                        return view('Frontend.getDataBySearched' , compact('getAllResults'));
                    }
                    // return view('Frontend.getDataBySearched' , compact('getAllResults'));
                }
                else if(isset($GetRequestCert)){
                    $getAllResults = UserWebsite::where('lastCertification' , 'LIKE' , $GetRequestCert . '%')->paginate(12)->withQueryString();
                    // dd($userSearcheByname);
                    if(count($getAllResults) > 0){
                        return view('Frontend.getDataBySearched' , compact('getAllResults'));
                    }
                    
                    // return view('Frontend.getDataBySearched' , compact('getAllResults'));
                }
                else{
                    return redirect('page/search/');
                }
                
            }
            else{
            return redirect('page/search/');
            }
        }
        
}



    public function validating(Request $request){
        $req_check = $request->validd;
        // dd($req_check);
        
            if($req_check == 1)
                return redirect()->route('search');
            else
                return redirect('/');
        
    }
       
}    
        
        

