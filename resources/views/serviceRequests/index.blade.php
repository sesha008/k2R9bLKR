<section class="bg-light">
  <div class="container">
    <div class="row pt-4">
      <div class="col-6 col-md-6">
        <h4> Tickets </h4>
      </div>
      <div class="col-6 col-md-6">
        <form action="{{ route('home') }}" class="form-inline my-2 my-lg-0" method="get">
          @csrf
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" value={{ request('search') }}>
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      <div class="col-12 col-md-12">
          <table class="table table-striped">
            <thead>
              <th>Ticket #</th>
              <th>Client Name</th>
              <th>Status</th>
              <th>Last Update</th>
              <th colspan="2">Action</th>
            </thead>
            <tbody>
              @foreach($requests AS $request)
              <tr>
                <td>{{ $request->id }}</td>
                <td>{{ $request->client_name }}</td>
                <td>{{ $request->status }}</td>
                <td>{{ $request->updated_at->format('m/d/Y h:i a') }}</td>
                <td><a href="{{ route('edit',[$request->id]) }}" class="btn btn-primary">EDIT</a></td>
                <td>
                  <form action="{{ route('delete',[$request->id]) }}" method="POST">
                    @method("DELETE")
                    @csrf
                    <button type="submit" class="btn btn-danger" > Delete </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
      {{ $requests->links() }}
    </div>
  </div>
</section>