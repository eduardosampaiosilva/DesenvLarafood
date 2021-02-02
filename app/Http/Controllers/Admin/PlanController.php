<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlanController extends Controller
{
    private $repository ; //Cria um repositório que vai ser alimentado com os dados do plano no __construct

    public function __construct(Plan $plan){
        $this->repository = $plan;
    }
    
    public function index(){
        $plans = $this->repository->paginate(10); // no plural plans que recupera os dados da construct ---> Paginate faz as quebras
        return view('admin.pages.plans.index' , [
            'plans' => $plans,
        ]); 
    }

    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(Request $request){

        $data = $request->all();
        $data['url'] = Str::kebab($request->name);//faz a string pra ser a url
    
        $this->repository->create($data); // repository que ele fez juncao com a model Plan no __construct ele que faz a ligação com o banco

        return redirect()->route('plans.index');             
    }

    public function show($url){
        $plan = $this->repository->where('url', $url)->first();//se url passada encontrar no repository tras somente um 

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa
        
        return view('admin.pages.plans.show',[
            'plan' => $plan
        ]); //se a pesquisa deu certo alimentar as innformações 
    }

    public function destroy($url){

        $plan = $this->repository->where('url', $url)->first();//se url passada encontrar no repository tras somente um 

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa
        
        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request){
        
        //dd($request->all());
        /*
            para deixar bem inxuto ele faz a pesquiosa na model do plans usando os filtros
        */

        $filters = $request->except('_token'); // isso vai para a view pincipal para nao dar paw nas paginações

        $plans = $this->repository->search($request->filter); //ele chama o metodo search mando o campo filter que vem o index

        if(!$plans)
           return redirect()->back();

        return view('admin.pages.plans.index' , [
            'plans' => $plans,
            'filters' => $filters,
        ]); 

    }

    public function edit($url){
        
        $plan = $this->repository->where('url', $url)->first();//se url passada encontrar no repository tras somente um 

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa     
        

        return view('admin.pages.plans.edit' , [
                    'plans' => $plan,            
        ]); 

    }

    public function update(Request $request, $url){

        $plan = $this->repository->where('url', $url)->first();//se url passada encontrar no repository tras somente um 

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa             

        //dd($request->all());

        $plan->update($request->all());

        return redirect()->route('plans.index');

    }

}
                               