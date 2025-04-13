@extends('layout')

@section('title', 'Profile')

@section('main')
  <p>Hello, {{ $user->name }}. Your email is {{ $user->email }}.</p>

  @if (session('plainTextToken'))
    <div class="alert alert-success">
      <p class="mb-1"><strong>Your new token:</strong></p>
      <code class="d-block text-break">{{ session('plainTextToken') }}</code>
      <p class="mt-2 small text-muted">Copy and store this token securely. You won’t be able to see it again.</p>
    </div>
  @endif

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Token Name</th>
        <th>Token</th>
        <th>Revoke</th>
      </tr>
    </thead>
    <tbody>
      @foreach (auth()->user()->tokens as $token)
        <tr>
          <td>{{ $token->name }}</td>
          <td>{{ $token->token }}</td>
          <td>
            <form action="{{ route('token.destroy', [ 'id' => $token->id ]) }}" method="POST">
              @csrf

              <button type="submit" class="btn btn-danger btn-sm">Revoke</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <form action="{{ route('token.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="token_name" class="form-label">Token Name</label>
      <input type="text" name="token_name" id="token_name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Generate API Token</button>
  </form>
@endsection