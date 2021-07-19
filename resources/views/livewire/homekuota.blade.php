@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Data Kuota Vaksin</h2>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @livewire('kuotas')
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.livewire.on('userStore', () => {
        $('#exampleModal').modal('hide');
    });
</script>
@endsection