<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Start Bootstrap</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{route('about')}}">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li><a href="#">Categories</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                        <li><a href="#">One more separated link</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">A long sub menu</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>
                                        <li><a href="#">One more link</a></li>
                                        <li><a href="#">Menu item 1</a></li>
                                        <li><a href="#">Menu item 2</a></li>
                                        <li><a href="#">Menu item 3</a></li>
                                        <li><a href="#">Menu item 4</a></li>
                                        <li><a href="#">Menu item 5</a></li>
                                        <li><a href="#">Menu item 6</a></li>
                                        <li><a href="#">Menu item 7</a></li>
                                        <li><a href="#">Menu item 8</a></li>
                                        <li><a href="#">Menu item 9</a></li>
                                        <li><a href="#">Menu item 10</a></li>
                                        <li><a href="#">Menu item 11</a></li>
                                        <li><a href="#">Menu item 12</a></li>
                                        <li><a href="#">Menu item 13</a></li>
                                        <li><a href="#">Menu item 14</a></li>
                                        <li><a href="#">Menu item 15</a></li>
                                        <li><a href="#">Menu item 16</a></li>
                                        <li><a href="#">Menu item 17</a></li>
                                        <li><a href="#">Menu item 18</a></li>
                                        <li><a href="#">Menu item 19</a></li>
                                        <li><a href="#">Menu item 20</a></li>
                                        <li><a href="#">Menu item 21</a></li>
                                        <li><a href="#">Menu item 22</a></li>
                                        <li><a href="#">Menu item 23</a></li>
                                        <li><a href="#">Menu item 24</a></li>
                                        <li><a href="#">Menu item 25</a></li>
                                        <li><a href="#">Menu item 26</a></li>
                                        <li><a href="#">Menu item 27</a></li>
                                        <li><a href="#">Menu item 28</a></li>
                                        <li><a href="#">Menu item 29</a></li>
                                        <li><a href="#">Menu item 30</a></li>
                                        <li><a href="#">Menu item 31</a></li>
                                        <li><a href="#">Menu item 32</a></li>
                                        <li><a href="#">Menu item 33</a></li>
                                        <li><a href="#">Menu item 34</a></li>
                                        <li><a href="#">Menu item 35</a></li>
                                        <li><a href="#">Menu item 36</a></li>
                                        <li><a href="#">Menu item 37</a></li>
                                        <li><a href="#">Menu item 38</a></li>
                                        <li><a href="#">Menu item 39</a></li>
                                        <li><a href="#">Menu item 40</a></li>
                                        <li><a href="#">Menu item 41</a></li>
                                        <li><a href="#">Menu item 42</a></li>
                                        <li><a href="#">Menu item 43</a></li>
                                        <li><a href="#">Menu item 44</a></li>
                                        <li><a href="#">Menu item 45</a></li>
                                        <li><a href="#">Menu item 46</a></li>
                                        <li><a href="#">Menu item 47</a></li>
                                        <li><a href="#">Menu item 48</a></li>
                                        <li><a href="#">Menu item 49</a></li>
                                        <li><a href="#">Menu item 50</a></li>
                                        <li><a href="#">Menu item 51</a></li>
                                        <li><a href="#">Menu item 52</a></li>
                                        <li><a href="#">Menu item 53</a></li>
                                        <li><a href="#">Menu item 54</a></li>
                                        <li><a href="#">Menu item 55</a></li>
                                        <li><a href="#">Menu item 56</a></li>
                                        <li><a href="#">Menu item 57</a></li>
                                        <li><a href="#">Menu item 58</a></li>
                                        <li><a href="#">Menu item 59</a></li>
                                        <li><a href="#">Menu item 60</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Another link</a></li>
                                <li><a href="#">One more link</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    @if(Auth::user()->is_admin)
                        <li><a href="{{ route('admin_path') }}">Admin Panel</a></li>
                    @endif
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
