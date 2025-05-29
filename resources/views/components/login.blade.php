@section('modals')
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login ke DeliGreen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
          @endif

          <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" required autofocus value="{{ old('email') }}">
          </div>

          <div class="mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
