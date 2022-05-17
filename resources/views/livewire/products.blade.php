<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="search-button" style="width: 50%;
            margin: 3% auto">
                <input type="text" style="    width: 100%;
                padding: 2%;" wire:model.debounce.300ms="searchWord" placeholder="Search By Name and Author Name" id="">
            </div>
            <div class="search-date" style="display: flex;
            justify-content: center;
            margin: 2% auto">
                <input type="date" wire:model.debounce.500ms="date" data-date-format="YYYY-MM-DD" name="date" id="">
                @if(!$searchDate)
                <button wire:click='searchDate()'>Search</button>
                @else
                <button wire:click='resetSearch()'>Reset</button>
                @endif
            </div>
            <div class="col-md-10" style="display: flex;
            flex-wrap: wrap; justify-content: center;">
            @if(count($products)>0)
                
            
                @foreach ($products as $p)
                <div class="card" style="    background-color: #f1f1f1;
                width: 40%;
                margin: 10px;
                text-align: center;">
                    <div class="card-header">{{$p->name}}</div>
    
                    <div class="card-body" style="text-align: left;
                    padding: 9%;">
                        <div class="name-auther" >
                            <span>Created By : {{$p->author_name}}</span>
                            
                        </div>
                        <div class="created-date">
                            <span>Created At :  {{$p->created_date}}</span>
                           
    
                        </div>
                        <div class="price">
                            <span>Price:  {{$p->price}}</span>
                        </div>
                       
                    </div>
                </div>   
                @endforeach
                @else
                Nodata
                @endif
            </div>
        </div>
    </div>
    
</div>
