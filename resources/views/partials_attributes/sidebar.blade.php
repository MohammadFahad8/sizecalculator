<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Side Bar') }}</div>
        <div class="card-body">
            <li>
                <a href="{{ route('attributes.home') }}" class="btn-sidebar"> {{ __('Dashboard') }} </a>
            </li>
         
         

            <li>
                <a href="{{ route('attributes.create') }}" class="btn-sidebar"> {{ __('Add Attribute') }} </a>
            </li>          
              <li>
                <a href="{{ route('sizes.home') }}" class="btn-sidebar"> {{ __('Sizes') }} </a>
            </li>
             <li>
                <a href="{{ route('attributes.products') }}" class="btn-sidebar"> {{ __('Products') }} </a>
            </li>
           
        {{-- <li>
                <a href=""> {{ __('Attribute List') }} </a>
            </li> --}}
        </div>
    </div>
</div>
<style>
    li{
        list-style-type: none !important;
    }
  
    
</style>