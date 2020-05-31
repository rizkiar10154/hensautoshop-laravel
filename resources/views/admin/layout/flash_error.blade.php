@if(\Illuminate\Support\Facades\Session::has('flash_error'))
    <div class="alert alert-danger {{\Illuminate\Support\Facades\Session::has('penting') ?  'alert-important' : ''}}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{\Illuminate\Support\Facades\Session::get('flash_error')}}
    </div>
@endif