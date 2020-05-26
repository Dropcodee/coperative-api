<div class="page-sidebar">
    <div class="page-sidebar-inner">
        <div class="page-sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="{{ Auth::user()->avatar }}" class="avatar">
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p>{{ ucfirst(Auth::user()->first_name) }} {{ ucfirst(Auth::user()->last_name)  }}</p>
                    <span>{{ Auth::user()->email }}<i class="material-icons float-right">arrow_drop_down</i></span>
                </a>
            </div>
        </div>
        <div class="page-sidebar-menu">
            <div class="page-sidebar-settings hidden">
                <ul class="sidebar-menu list-unstyled">
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">inbox</i>Inbox</a></li>
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">star_border</i>Starred</a></li>
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">done</i>Sent Mail</a></li>
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">history</i>History</a></li>
                    <li class="divider"></li>
                    <li><a href="#" class="waves-effect waves-grey"><i class="material-icons">exit_to_app</i>Sign Out</a></li>
                </ul>
            </div>
            <div class="sidebar-accordion-menu">
                <ul class="sidebar-menu list-unstyled">
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect waves-grey active">
                            <i class="material-icons">settings_input_svideo</i>Dashboard
                        </a>
                    {{-- <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">apps</i>Apps<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="app-mailbox.html">Mailbox</a></li>
                            <li><a href="app-file-manager.html">File Manager</a></li>
                            <li><a href="app-todo.html">Todo</a></li>
                        </ul>
                    </li> --}}
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">people</i>Users<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="{{ route('home') }}">Members</a></li>
                            <li><a href="{{ route('home') }}">Employee & Payroll</a></li>
                            <li><a href="{{ route('home') }}">Add Employees</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">storefront</i>Vendors & Purchases<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="{{ route('home') }}">Vendors</a></li>
                            <li><a href="{{ route('home') }}">Purchase History</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="waves-effect waves-grey">
                            <i class="material-icons">account_balance</i>Financial Reports<i class="material-icons sub-arrow">keyboard_arrow_right</i>
                        </a>
                        <ul class="accordion-submenu list-unstyled">
                            <li><a href="{{ route('home') }}">Trial Balance</a></li>
                            <li><a href="{{ route('home') }}">Income Statement</a></li>
                            <li><a href="{{ route('home') }}">Statement of Financial Position</a></li>
                            <li><a href="{{ route('home') }}">Cash Flow Statement</a></li>
                            <li><a href="{{ route('home') }}">Cash flow Projection</a></li>
                            <li><a href="{{ route('home') }}">Budget</a></li>
                            <li><a href="{{ route('home') }}">Multi-period Report</a></li>
                            <li><a href="{{ route('home') }}">Gross Margin Statement</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect waves-grey">
                            <i class="material-icons">description</i>Learning Center
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect waves-grey">
                            <i class="material-icons">report_problem</i>Maintenance
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect waves-grey">
                            <i class="material-icons">trending_up</i>Charts
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="waves-effect waves-grey">
                            <i class="material-icons">power_settings_new</i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-footer">
            <p class="copyright">Landmark University ©</p>
            <a href="#!">Privacy</a> &amp; <a href="#!">Terms</a>
            <p class="copyright">Developed By <a href="">FSTACKDEV</a></p>
        </div>
    </div>
</div>