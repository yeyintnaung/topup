<!--\\\\\\\\\\\\\\\\\\\ Start left side nav\\\\\\\\\\\\\\\\\\\\\\\\\\\\-->
<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="nav-title">Main Navigation</li>
            <li class="no-padding">
                <a href="{{url('/')}}" class="waves-effect waves-grey active"><i class="material-icons">dashboard</i>Dashboard</a>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">pie_chart</i>Topup</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('topup')}}">All Topup</a></li>
                        <li><a href="{{url('mpttopup')}}">MPT Topup</a></li>
                        <li><a href="{{url('ooredootopup')}}">Ooredoo Topup</a></li>
                        <li><a href="{{url('telenortopup')}}">Telenor Topup</a></li>
                        <li><a href="{{url('telenormagictopup')}}">Telenor(magic) Topup</a></li>
                    </ul>
                </div>
            </li> 
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">mode_edit</i>Topup Status</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('topups/in_stock')}}">In Stock Topup</a></li>
                        <li><a href="{{url('topups/sold_out')}}">Sold Out Topup</a></li>
                        <li><a href="{{url('topups/search_code')}}">Search Pincode</a></li>
                    </ul>
                </div>
            </li>

           @if(Auth::user()->role==1)
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">perm_contact_calendar</i>Users</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('user/create')}}">Create User</a></li>
                        <li><a href="{{url('user')}}">All Users</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">perm_contact_calendar</i>Merchants</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('merchant/create')}}">Create Merchant</a></li>
                        <li><a href="{{url('merchant')}}">All Merchant</a></li>
                        <li><a href="{{url('merchants/bonus')}}">Bonus</a></li>
                    </ul>
                </div>
            </li>
            @endif

            <li class="nav-title">Transaction Logs</li>    
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">settings</i>History</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('history/topup')}}">Topups</a></li>
                        <li><a href="{{url('history/merchant')}}">Merchant</a></li>
                    </ul>
                </div>
            </li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">navigation</i>Reports</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('reports/topups')}}" >Topups</a></li>
                        <li><a href="{{url('reports/mytopup')}}">MyTopup</a></li>
                        <li><a href="{{url('reports/invoices')}}">Invoices</a></li>
                        <li><a href="{{url('profit')}}">Profit</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-title">Feedback</li>
            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">folder</i>Testing</a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{url('buying-topup')}}">Buying Topup</a></li>
                    </ul>
                </div>
            </li>

            <li class="no-padding">
                <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">navigation</i>Count Of cards</a>
                <div class="collapsible-body">
                    <ul>
                        @php
                        $all_user=\Illuminate\Support\Facades\DB::table('users')->get();
                        @endphp
                        <li><a href="{{url('count_by_all')}}">All</a></li>

                    @foreach($all_user as $au)
                        <li><a href="{{url('count_by_date/'.$au->id)}}">{{$au->name}}</a></li>
                            @endforeach
                    </ul>
                </div>
            </li>
            
            <li class="no-padding">
                <a href="{{url('topup_amount')}}" class="waves-effect waves-grey active"><i class="material-icons">navigation</i>Topup Amount</a>
            </li>
            <li class="footer center">
                <span class="grey-text">&copy; 2016-2017. The Banyan</span>
            </li>
        </ul>
    </div>
</aside>
<a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
<!--//////////////////End left side nav/////////////////-->



<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Right sidebar Start\\\\\\\\\\\\\\\\\\\\\\\-->
<aside id="right-sidebar" class="side-nav  white right-sidebar-panel">
    <div class="side-nav-wrapper">
        <ul class="chat-list">
            <li class="chat-item clearfix">
                <a href="#">
                    <img src="{{asset('images/avatar-03.png')}}" alt="" width="40" class="left">
                    <div class="overflow-hidden">
                        <h5>John Doe</h5>
                        <span class="green-text">Online</span>
                    </div>
                </a>
            </li><!--end chat item-->
            <li class="chat-item clearfix">
                <a href="#">
                    <img src="{{asset('images/avatar-03.png')}}" alt="" width="40" class="left">
                    <div class="overflow-hidden">
                        <h5>David villa</h5>
                        <span class="red-text">Offline</span>
                    </div>
                </a>
            </li><!--end chat item-->
            <li class="chat-item clearfix">
                <a href="#">
                    <img src="{{asset('images/avatar-03.png')}}" alt="" width="40" class="left">
                    <div class="overflow-hidden">
                        <h5>John Abraham</h5>
                        <span class="grey-text">Active 3h ago</span>
                    </div>
                </a>
            </li><!--end chat item-->
            <li class="chat-item clearfix">
                <a href="#">
                    <img src="{{asset('images/avatar-03.png')}}" alt="" width="40" class="left">
                    <div class="overflow-hidden">
                        <h5>Johnny Liver</h5>
                        <span class="green-text">Online</span>
                    </div>
                </a>
            </li><!--end chat item-->
            <li class="chat-item clearfix">
                <a href="#">
                    <img src="{{asset('images/avatar-03.png')}}" alt="" width="40" class="left">
                    <div class="overflow-hidden">
                        <h5>Rakesh sharma</h5>
                        <span class="grey-text">Active 3h ago</span>
                    </div>
                </a>
            </li><!--end chat item-->
        </ul><!--end chat list-->
        <div class="center-align">
            <a href="#" class="btn waves-effect waves-light indigo">Load More...</a>
        </div>
    </div>
</aside>
<!--\\\\\\\\\\\\\\\\\\\\\\\\\\\\Right sidebar End\\\\\\\\\\\\\\\\\\\\\\\-->