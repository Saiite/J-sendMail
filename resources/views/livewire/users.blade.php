
<div>
    @if($updateMode)

@else

@endif
<form class="navbar-search form-inline" id="navbar-search-main">
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
    </div>
  </form>
  <br>
<div class="row">
    <div class="col-12 col-xl-12">
        <div class="card card-body border-0 shadow mb-4">
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="live-table" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            New User
        </a>


    <table class="table user-table table-hover align-items-center">
        <thead>
            <tr>
                <th class="border-bottom">
                    <div class="form-check dashboard-check">
                        <input class="form-check-input" type="checkbox" value="" id="userCheck55">
                        <label class="form-check-label" for="userCheck55">
                        </label>
                    </div>
                </th>
                <th>first_name </th>
                <th >last_name</th>
                <th>Email</th>
                <th></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->first_name}}</td>
                <td>{{ $value->last_name}}</td>
                <td>{{ $value->email }}<span class="fw-normal text-success"></span></td>

                <td>{{ $value->Action}}<span class="fw-normal text-success"></span></td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu py-0">
                            <a class="dropdown-item rounded-top" href="{{ route('profile', $value->id) }}"><span class="fas fa-eye me-2"></span>View Details</a>
                            <a class="dropdown-item" href="{{ route('profile', $value->id) }}"> <span class="fas fa-edit me-2"></span>Edit</a>
                            <a class="dropdown-item text-danger rounded-bottom" href="#" wire:click.prevent="delete({{  $value->id }})"> </span class="fas fa-trash-alt me-2"></span>Remove</a>
                            <a class="dropdown-item rounded-top" href="{{ route('profile-example') }}"><span class="fas fa-eye me-2"></span>voir profile</a>

                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>

</div>
<nav aria-label="Page navigation example">
    <ul class="pagination mb-0">
        <li class="page-item">
            <a class="page-link" href="#">Previous</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">4</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">5</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>
