<?php

namespace App\Http\Livewire;
use App\Models\Comment;

use Carbon\Carbon;
use Livewire\Component;

class Counter extends Component
{
    public $count=5;
    
    public $commets=[
        [
            'creaters'=>'sachin tendulkar',
            'create_at'=>'5s ago',
            'body'=>'the sachin tedulkar is indian cricketer'
        ]
    ];
    public $commitname;
    public function render()
    {
        return view('livewire.comments');
    }
    public function increment()
    {
        return $this->count=$this->count+1;
    }
    public function decrement(){
        if(!$this->count==0){
            return $this->count=$this->count-1;    
        }
        
    }
    public function add_commit(){
        $this->commets[]= [
            'creaters'=>'Test',
            'create_at'=>Carbon::now()->diffForHumans(),
            'body'=>$this->commitname,
        ];
        $data=new Comment();
        $data->com_creater='Test';
        $data->com_date=Carbon::now()->diffForHumans();
        $data->com_comments=$this->commitname;
        $data->save();
        

        
    }
}
