<nav class="main_menu clearfix">
    <ul class="ul_li_center clearfix">
        <li class="{{Request::path()=='home'?'active':''}}"><a href="{{Request::path()=='home'?'#!':'/home'}}">Home</a></li>
        <li class="{{Request::path()=='cars'?'active':''}}"><a href="{{Request::path()=='cars'?'#!':'/cars'}}">Our Cars</a></li>
        <li class="{{Request::path()=='gallery_view'?'active':''}}"><a href="{{Request::path()=='gallery_view'?'#!':'/gallery_view'}}">Gallery</a></li>
        <li class="{{Request::path()=='about'?'active':''}}"><a href="{{Request::path()=='about'?'#!':'/about'}}">About</a></li>
        <li class="{{Request::path()=='contact'?'active':''}}"><a href="{{Request::path()=='contact'?'#!':'/contact'}}">Contact Us</a></li>
    </ul>
</nav>
