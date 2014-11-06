@if (Auth::check())
  @include('layouts.partials.nav.advisor-authed')
@else
  @include('layouts.partials.nav.advisor-login')
@endif