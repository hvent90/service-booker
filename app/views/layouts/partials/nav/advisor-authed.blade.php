<div class="advisor-login">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <span class="caret"></span></a>
      <!-- Login Dropdown Form -->
      <ul class="dropdown-menu nav-login" role="menu">
        <li>
      <li>{{ link_to_route('home', 'Home') }}</li>
      <li>{{ link_to_route('dashboard.index', 'Dashboard') }}</li>
			<li class="divider"></li>
			<li>{{ link_to_route('advisors.logout', 'Log Out', null,['id' => 'nav-log-out']) }}</li>
        </li>
      </ul>
    </li>
</div>