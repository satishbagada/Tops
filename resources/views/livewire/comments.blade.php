<div>
    <div style="text-align:center;">
        <h1>Counter Example</h1>
        <button type="button" style="font-size:20px;" wire:click="increment">+</button>
        <span>{{ $count }}</span>
        <button type="button" style="font-size:20px;" wire:click="decrement()">-</button>
    </div>
    {{-- ========================================================================================================================================     --}}
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-10">

              
                <form action="">
                    <div class="row">
                        <div class="col-md-11">
                            
                            <label for="">Commets</label>
                            <input type="text" placeholder="What's in your mind." class="form-control"  wire:model.lazy="commitname">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-primary mt-4" wire:click="add_commit()">Add</button>
                        </div>
                    </div>

                </form>
                <div class="card mt-5 shadow p-2">
                    @foreach ($commets as $commet)
                        <div class="card-title">
                            <h3 class="d-inline">{{$commet['creaters']}}</h3>
                            <p class="ms-2 d-inline">{{$commet['create_at']}}</p>
                        </div>
                        <div class="card-body">
                            <p class="fs-5">{{$commet['body']}}</p>
                        </div>
                    @endforeach
                    
                    

                </div>
            </div>
        </div>
    </div>

</div>
