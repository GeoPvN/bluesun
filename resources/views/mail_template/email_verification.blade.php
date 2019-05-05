<p>Hello, {{ $data["name"] }}</p>
<p>this is your verification link <a href="{{ route('/') }}/{{ $data["active_url"] }}" target="_blank">Click Me</a></p>
<p>{{ route('/') }}/{{ $data["active_url"] }}</p>