<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-{{ $color }} shadow h-100 py-2 bg-dark">
        <div class="card-body bg-dark">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        {{ $title }}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-warning">
                        Rata<sup>2</sup> Brix : {{ number_format($brix, 2) }}
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-warning">
                        {{ $rit }} Rit Masuk
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-warning">
                        {{ $ditolak }} Rit < 15
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-percent fa-2x text-warning"></i>
                </div>
            </div>
        </div>
    </div>
</div>
