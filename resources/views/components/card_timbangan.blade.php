
<div class="col-lg-4 mb-4">
    <div class="card bg-{{ $bgcolor }} text-white shadow">
        <div class="card-body">
            <div class="h5 mb-0 font-weight-bold text-white">
                {{ strtoupper($title) }}<sub>({{ $unit }})</sub>
            </div>
            <table class="table table-sm text-white">
                <tr>
                    <th>Pagi</th>
                    <th>{{ number_format($pagi, 2) }}</th>
                </tr>
                <tr>
                    <th>Sore</th>
                    <th>{{ number_format($siang, 2) }}</th>
                </tr>
                <tr>
                    <th>Malam</th>
                    <th>{{ number_format($malam, 2) }}</th>
                </tr>
            </table>
        </div>
    </div>
</div>
