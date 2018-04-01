        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
            
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        @hasrole('Member')
                        <li class="nav-small-cap"><a href="{{ route('users.profile')}}">DASHBOARD</a></li>
                        
                        <li>
                            <a class="has-arrow " href="{{ route('members.create')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Become A Member</span></a>
                        </li>
                        @endhasrole
                        @hasanyrole('Admin|Staff')
                        <li class="nav-small-cap"><a href="{{ route('dashboard')}}">DASHBOARD</a></li>
                        
                        <li>
                            <a class="has-arrow " href="{{ route('members.create')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Members</span></a>
                        </li>
                         
                        <!--<li class="nav-devider"></li>-->
                        <!--<li class="nav-small-cap"><a>LOANS & PAYMENTS</a></li>-->
                        <!-- <li>-->
                        <!--    <a class="has-arrow " href="{{ route('loans.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-usd"></i><span class="hide-menu">Loans</span></a>-->
                        <!--</li>-->
                        <!-- <li>-->
                        <!--    <a class="has-arrow" href="#" aria-expanded="false"><i class="glyphicon glyphicon-credit-card"></i><span class="hide-menu">Payment</span></a>-->
                        <!--    <ul aria-expanded="false" class="collapse">-->
                        <!--        <li><a href="ui-cards.html">Cards</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                         @endhasanyrole
                         @hasanyrole('Admin|Staff')
                         <li class="nav-devider"></li>
                        <li class="nav-small-cap"><a>SETTINGS</a></li>
                         <li>
                            <a class="has-arrow " href="{{ route('users.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-user"></i><span class="hide-menu">Users</span></a>
                        </li>
                        <!--<li>-->
                        <!--    <a class="has-arrow " href="{{ route('products.index')}}" aria-expanded="false"><i class="glyphicon glyphicon-shopping-cart"></i><span class="hide-menu">Products</span></a>-->
                        <!--</li>-->
                        
                        @endhasanyrole
                        <!--<li>-->
                        <!--    <a class="has-arrow " href="{{ route('permissions.index')}}" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Permissions</span></a>-->
                        <!--</li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>

        </aside>