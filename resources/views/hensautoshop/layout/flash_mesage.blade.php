@if(\Illuminate\Support\Facades\Session::has('flash_message'))
    <div class="alert alert-success {{\Illuminate\Support\Facades\Session::has('penting') ?  'alert-important' : ''}}">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{\Illuminate\Support\Facades\Session::get('flash_message')}}
    </div>
 @endif
