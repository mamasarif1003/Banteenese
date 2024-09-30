@forelse($layanan as $c)

<h6>{{ $c['service'] }}</h6>
<h6>{{ $c['cost'][0]['value'] }}</h6>

@empty
<p>kosong</p>
@endforelse