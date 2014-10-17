<li>{{ link_to_route('advisors.show', 'Profile', $currentUser->id) }}</li>
<li>{{ link_to_route('dashboard.index', 'Dashboard') }}</li>
<li class="divider"></li>
<li>{{ link_to_route('advisors.logout', 'Log Out', null,['id' => 'nav-log-out']) }}</li>