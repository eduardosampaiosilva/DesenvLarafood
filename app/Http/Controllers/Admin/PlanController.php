<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;


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

    public function store(StoreUpdatePlan $request){ //passa StoreUpdatePlan ao inves de request para validar os itens

        $this->repository->create($request->all()); // repository que ele fez juncao com a model Plan no __construct ele que faz a ligação com o banco

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

        $plan = $this->repository
                     ->with('details')
                     ->where('url', $url)
                     ->first();//se url passada encontrar no repository tras somente um 
        
        //dd($plan->details->count());

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa
        
        if($plan->details->count() > 0){
            return redirect()
                   ->back()
                   ->with('error','Já existe detalhes vinculados à este plano, caso queira realmente excluir este plano, favor deletar primeiramento do detalhes');
        }

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

    public function update(StoreUpdatePlan $request, $url){

        $plan = $this->repository->where('url', $url)->first();//se url passada encontrar no repository tras somente um 

        if(!$plan)
           return redirect()->back(); // se nao encontrar o plano volta para a pesquisa                     

        $plan->update($request->all());

        return redirect()->route('plans.index');

    }

}
                               