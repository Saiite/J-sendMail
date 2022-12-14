<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
  <div class="container-fluid px-0">
    <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
      <div class="d-flex align-items-center">
          <!-- Search form -->
          {{-- <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">

              <span class="input-group-text" id="topbar-addon"><svg class="icon icon-xs"
                  x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                  fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg></span></span>
              <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search"
                aria-describedby="topbar-addon">

                </svg></span></span>

            </div>
          </form> --}}

        </div>
      </div>
      <!-- Navbar links -->
      <ul class="navbar-nav align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link text-dark notification-bell unread dropdown-toggle" data-unread-notifications="true"
            href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <svg class="icon icon-sm text-gray-900" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
              </path>
            </svg>
            {{-- {{ auth()->user()->unreadNotifications->count() }} --}}

        </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-center mt-2 py-0">
            <div class="list-group list-group-flush">
              <a href="#" class="text-center text-primary fw-bold border-bottom border-light py-3">notifications</a>

              <a href="{{route('courrier-user')}}" class="dropdown-item text-center fw-bold rounded-bottom py-3">
                <svg class="icon icon-xxs text-gray-400 me-1" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                  <path fill-rule="evenodd"
                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                    clip-rule="evenodd"></path>
                </svg>
                tous voir
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown ms-lg-3">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <div class="media d-flex align-items-center">

                @if(empty(auth()->user()->Image->images ))

              <img class="avatar rounded-circle" alt="Image placeholder" src="/assets/img/team/profile-picture-1.jpg">

              @else
              <img class="avatar rounded-circle" alt="Image placeholder" src="/storage/{{auth()->user()->Image->images  }}" >

              @endif
              <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                <span
                  class="mb-0 font-small fw-bold text-gray-2000">
                  <br>
                  <br style="float: left">
                  {{  auth()->user()->first_name ? auth()->user()->first_name . ' ' . auth()->user()->lasname : 'User Name'}}</span>
                  <br>
                 @foreach ( auth()->user()->roles as $role)
                     {{$role->role_libele}}
                 @endforeach
              </div>
            </div>
          </a>
          <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
              <svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                  clip-rule="evenodd"></path>
              </svg>

            </a>
            <div role="separator" class="dropdown-divider my-1"></div>
            <a href="{{ route('profile-example') }}" class="dropdown-item d-flex align-items-center">
                Mon profil </a>
            </a>
            <div role="separator" class="dropdown-divider my-1"></div>
            <a class="dropdown-item d-flex align-items-center">
              <livewire:logout /></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
@if (session()->has('message'))
<div class="alert alert-success" role="alert">
    {{session()->get('message')}}
  </div>
  @endif
  @if (session()->has('messag'))
<div class="alert alert-danger" role="alert">
    {{session()->get('messag')}}
  </div>
  @endif

