        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
            
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap"><a href="{{ route('dashboard')}}">DASHBOARD</a></li>
                      @hasrole('Admin')
                        <li>
                            <a class="has-arrow " href="{{ route('members.create')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Members</span></a>
                        </li>
                     @endhasrole 
                     @hasrole('Staff')
                        <li>
                            <a class="has-arrow " href="{{ route('members.create')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Members</span></a>
                        </li>
                     @endhasrole  
                        <!--<li class="nav-devider"></li>-->
                        <li class="nav-small-cap"><a>LOANS & PAYMENTS</a></li>
                         <li>
                            <a class="has-arrow " href="{{ route('loans.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-usd"></i><span class="hide-menu">Loans</span></a>
                        </li>
                         <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><i class="glyphicon glyphicon-credit-card"></i><span class="hide-menu">Payment</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="ui-cards.html">Cards</a></li>
                            </ul>
                        </li>
                        @hasrole('Admin')
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap"><a>SETTINGS</a></li>
                         <li>
                            <a class="has-arrow " href="{{ route('users.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Users</span></a>
                        </li>
                        @endhasrole
                        <li>
                            <a class="has-arrow " href="{{ route('products.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart"></i><span class="hide-menu">Products</span></a>
                        </li>
                        <!--<li>-->
                        <!--    <a class="has-arrow " href="{{ route('permissions.index')}}" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Permissions</span></a>-->
                        <!--</li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!--<div class="sidebar-footer">-->
                <!-- item-->
            <!--    <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>-->
                <!-- item-->
            <!--    <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>-->
                <!-- item-->
            <!--    <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>-->
            <!--</div>-->
            <!-- End Bottom points-->
        </aside>