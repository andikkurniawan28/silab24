@extends("layouts.app")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    @if($message = Session::get("error"))
        @include("components.alert", ["message"=>$message, "color"=>"danger"])
    @elseif($message = Session::get("success"))
        @include("components.alert", ["message"=>$message, "color"=>"success"])
    @endif

     <!-- Content Row -->
     <div class="row">

        <div class="col-lg-4 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    <div class="font-weight-bold text-light text-uppercase mb-1">
                        Adjust ARI per Tanggal
                    </div>
                    <hr>
                    <form action="{{ route("adjust_ari.process") }}" method="POST" target="">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <div class="input-group">
                                <input id="date" name="date" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="addition" name="addition" type="number" class="form-control" step="any" placeholder="Enter addition..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="process" value="process" class="btn btn-warning text-dark">Process <i class="fas fa-flash"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

     </div>

</div>

@endsection
