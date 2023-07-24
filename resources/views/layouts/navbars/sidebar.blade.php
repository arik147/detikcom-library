<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
      {{ __('E-Library') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Edit Profile') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
     
      <li class="nav-item{{ $activePage == 'biblio' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/bibliografis') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Bibliografi') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'kategori' ? ' active' : '' }}">
        <a class="nav-link" href="{{ url('/kategoris') }}">
          <i class="material-icons">content_copy</i>
            <p>{{ __('Kategori') }}</p>
        </a>
      </li>
      
    </ul>
  </div>
</div>
