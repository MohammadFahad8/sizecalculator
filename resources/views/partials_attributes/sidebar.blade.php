<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Side Bar') }}</div>
        <div class="card-body">
            <li  style="list-style-type: none !important;">
                <a href="{{ route('attributes.home') }}" class="btn-sidebar"> {{ __('Dashboard') }} </a>
            </li>
         
         

            <li style="list-style-type: none !important;">
                <a href="{{ route('attributes.create') }}" class="btn-sidebar"> {{ __('Add Attribute') }} </a>
            </li>          
              <li style="list-style-type: none !important;">
                <a href="{{ route('sizes.home') }}" class="btn-sidebar"> {{ __('Sizes') }} </a>
            </li>
             <li style="list-style-type: none !important;">
                <a href="{{ route('attributes.products') }}" class="btn-sidebar"> {{ __('Products') }} </a>
            </li>
            {{-- <li style="list-style-type: none !important;">
                <a href="{{ route('sizechart.home') }}" class="btn-sidebar"> {{ __('Size Chart') }} </a>
            </li> --}}
           
        {{-- <li>
                <a href=""> {{ __('Attribute List') }} </a>
            </li> --}}
        </div>
    </div>
</div>
