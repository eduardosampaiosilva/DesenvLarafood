<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use Illuminate\Http\Request;
use App\Models\Profile;


class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile){
        $this->repository = $profile;
    }

    public function index()
    {
        $profiles = $this->repository->paginate();
        return view('admin.pages.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.pages.profiles.create');
    }
    
    public function store(StoreUpdateProfile $request)
    {
        $this->repository->create($request->all()); // repository que ele fez juncao com a model Plan no __construct ele que faz a ligação com o banco

        return redirect()->route('profiles.index');
    }
    
    public function show($id)
    {
        $profile = $this->repository->where('id', $id)->first();//se url passada encontrar no repository tras somente um 

        if(!$profile)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa
        
        return view('admin.pages.profiles.show',[
            'profiles' => $profile
        ]); //se a pesquisa deu certo alimentar as innformações     
    }

    public function edit($id)
    {
        //dd($id);        
        $profile = $this->repository->where('id', $id)->first();//se url passada encontrar no repository tras somente um 

        if(!$profile)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa            

        return view('admin.pages.profiles.edit' , [
                    'profiles' => $profile,            
        ]); 
    }

    public function update(StoreUpdateProfile $request, $id)
    {
        //dd($id);        
        $profile = $this->repository->where('id', $id)->first();//se url passada encontrar no repository tras somente um 

        if(!$profile)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa                     

        $profile->update($request->all());
        return redirect()->route('profiles.index');        
    }

    public function destroy($id)
    {
        $profile = $this->repository->where('id', $id)->first();//se url passada encontrar no repository tras somente um 

        if(!$profile)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa                     
           
        $profile->delete();
        
        return redirect()->route('profiles.index');  
    }
}
