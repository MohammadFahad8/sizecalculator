<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Side Bar') }}</div>
        <div class="card-body">
            <li class="sidebar_icon">
                 <a  href="{{ route('attributes.home') }}" class="btn-sidebar">   {{ __('Dashboard') }} </a>
            </li>
            

            <li>
                <a href="{{ route('sizes.create') }}" class="btn-sidebar"> {{ __('Add Sizes') }} </a>
            </li>
              <li style="list-style-type: none !important;">
                    <a href="{{ route('sizes.home') }}" class="btn-sidebar"> {{ __('Sizes List') }} </a>
            </li>
        {{-- <li>
                <a href=""> {{ __('Attribute List') }} </a>
            </li> --}}
        </div>
    </div>
</div>
