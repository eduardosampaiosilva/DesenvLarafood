<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon; //Faz essa chamada aqui pra tratar a Data 

class Plan extends Model
{ 
    /*public function fromDateTime($value)
    {
        return Carbon::parse(parent::fromDateTime($value))->format('d-m-Y H:i:s'); // Cria esta Função para tratar a data em todos os Models com data
    } 
    */
    
    protected $dateFormat = 'd-m-Y H:i:s';

    protected $fillable = ['name','url','price','description'];    

    public function search($filter = null){
        $results = $this->Where('name', 'like',"%{$filter}%")
                        ->orWhere('description', 'like',"%{$filter}%")
                        ->paginate(10);
        return $results;
    }
}