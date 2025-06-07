@extends('components.app')

@section('content')

{{-- Toast container posisi fixed di pojok kanan atas --}}
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1080;">

  @if(session('success'))
  <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        ✔ {{ session('success') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  @endif

  @if(session('error'))
  <div id="errorToast" class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex">
      <div class="toast-body">
        ❌ {{ session('error') }}
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
  @endif

</div>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
  <div class="card shadow-sm border-0" style="max-width: 400px; width: 100%;">
    <div class="card-body p-4">
      <h2 class="text-success fw-bold mb-4 text-center">Daftar DeliGreen</h2>
      <p class="text-muted text-center mb-4">Buat akun baru untuk mulai pesan makanan sehat.</p>

      <form method="POST" action="{{ route('register.verify') }}">
        @csrf

        <div class="mb-3">
          <label for="name" class="form-label text-muted">Nama Lengkap</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" aria-describedby="nameHelp">
          @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="email" class="form-label text-muted">Email</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" aria-describedby="emailHelp">
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label text-muted">Nomor HP</label>
          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" requiredautocomplete="tel" pattern="^(08|628)[0-9]{7,13}$" aria-describedby="phoneHelp">
          @error('phone')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="address" class="form-label text-muted">Alamat</label>
          <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" required autocomplete="street-address" aria-describedby="addressHelp">{{ old('address') }}</textarea>
          @error('address')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label text-muted">Password</label>
          <div class="input-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror"
              id="password" name="password" required autocomplete="new-password">
            <span class="input-group-text" onclick="togglePassword('password', this)" style="cursor:pointer;">
              <i class="fa-solid fa-eye" id="toggleIcon-password"></i>
            </span>
          </div>
          @error('password')
          <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label for="password_confirmation" class="form-label text-muted">Konfirmasi Password</label>
          <div class="input-group">
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            <span class="input-group-text" onclick="togglePassword('password_confirmation', this)" style="cursor:pointer;">
              <i class="fa-solid fa-eye" id="toggleIcon-password_confirmation"></i>
            </span>
          </div>
        </div>

        <button type="submit" class="btn btn-success w-100 fw-semibold">Daftar</button>

        <div class="text-center mt-3">
          <small class="text-muted">
            Sudah punya akun?
            <a href="{{ route('welcome') }}" class="text-primary">Login di sini</a>
          </small>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var toastElList = [].slice.call(document.querySelectorAll('.toast'))
      toastElList.map(function(toastEl) {
        return new bootstrap.Toast(toastEl, {
          delay: 4000
        }).show()
      })
    });
  
    function togglePassword(inputId, el) {
      const input = document.getElementById(inputId);
      const icon = document.getElementById('toggleIcon-' + inputId);
  
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
      }
    }
  </script>
@endpush