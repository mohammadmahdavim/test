<div class="side-menu"z>
    <div class="side-menu-body">
        <ul>
            <li class="side-menu-divider">list</li>
            <li><a href="/"><i class="icon ti-home"></i> <span>dashboard</span> </a></li>
            @can('user-list')
                <li><a href="/users"><i class="icon ti-user"></i> <span>users</span> </a></li>
            @endcan
            @can('match-list')
                <li><a href="/matches"><i class="icon ti-list"></i> <span>matches</span> </a></li>
            @endcan
            {{--            <li><a href="#"><i class="icon ti-rocket"></i> <span>اپ ها</span> </a>--}}
            {{--                <ul>--}}
            {{--                    <li><a href="chat.html">گفتگو </a></li>--}}
            {{--                    <li><a href="#">ایمیل </a>--}}
            {{--                        <ul>--}}
            {{--                            <li><a href="inbox.html">لیست پیام ها </a></li>--}}
            {{--                            <li><a href="read-email.html">خواندن ایمیل </a></li>--}}
            {{--                            <li><a href="compose-email.html">ایجاد </a></li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            {{--                    <li><a href="#">تقویم </a>--}}
            {{--                        <ul>--}}
            {{--                            <li><a href="calendar-basic.html">تقویم پایه </a></li>--}}
            {{--                            <li><a href="external-dragging.html">قابل کشیدن </a></li>--}}
            {{--                            <li><a href="calendar-list.html">لیست تقویم </a></li>--}}
            {{--                        </ul>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}
        </ul>
    </div>
</div>
