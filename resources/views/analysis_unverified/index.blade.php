@extends('layouts.app')

@section('content')
<div class="container-fluid">

    @include("components.alert_block")

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Verifikasi Mandor</li>
        </ol>
    </nav>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Verifikasi Mandor</h5>
        </div>
        <div class="card-body">
            <form action={{ route("verifikasi_mandor.process") }} method="POST">
            @csrf
            <div class="btn-group-toggle" data-toggle="buttons">
                <button type="submit" class="btn btn-outline-primary btn-sm text-right">
                    @include('components.icon', ['icon' => 'check '])
                    Setuju
                </button>
                <label class="btn btn-outline-secondary btn-sm text-right">
                    <input type="checkbox" id="select_all">
                    @include('components.icon', ['icon' => 'list '])
                    Pilih Semua
                </label>
            </div>
            <div class="table-responsive">
                <br>
                <table class="table table-bordered text-dark table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</td>
                            <th>Timestamp</td>
                            <th>Material</td>
                            <th>Analisa</th>
                            <th>User</td>
                            <th>Check</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($analyses as $analysis)
                        <tr>
                            <td>{{ $analysis->id }}</td>
                            <td>{{ $analysis->created_at }}</td>
                            <td>{{ $analysis->material->name }}</td>
                            <td>
                                @foreach ($indicators as $indicator)
                                @if($analysis->{$indicator->name} != NULL)
                                <li>{{ $indicator->name }} : {{ $analysis->{$indicator->name} }}</li>
                                @endif
                                @endforeach
                            </td>
                            <td>{{ $analysis->user->name }}</td>
                            <td><input type="checkbox" name="id[]" class="checkbox" value="{{ $analysis->id }}" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                </form>
                </table>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });

    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
        });
    });
</script>
@endsection

