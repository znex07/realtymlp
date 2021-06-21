@extends('main.dashboard.base')

@section('content.inner')

        <div class="col-xs-12 col-sm-9 content">            
                @if(session()->get('quick.success'))
                    <div class='alert alert-success alert alert-dismissible'>
                        {{ session()->get('quick.success') }}
                    </div>
                @endif
                @if(session()->get('update.success'))
                    <div class='alert alert-success'>
                        {{ session()->get('update.success') }}
                    </div>
                @endif
                @include('main.dashboard.listings.index')


        </div>
@endsection 
@section('scripts')

<script>
$('.nav-dashboard').addClass('accented-btn');
$(':radio').on('change.radiocheck', function() {
// Do something
});
</script>


@endsection
