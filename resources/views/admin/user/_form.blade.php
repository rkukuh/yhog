<div class="box-header with-border">

    @if (URL::current() == route('user.index'))

        <h3 class="box-title">Create New User</h3>

    @elseif (URL::current() == route('user.edit', $user_edit))

        <h3 class="box-title">Edit User</h3>

    @endif

</div>

@if (URL::current() == route('user.index'))

    <form action="{{ route('user.store') }}" method="post">

@elseif (URL::current() == route('user.edit', $user_edit))

    <form action="{{ route('user.update', $user_edit) }}" method="post">

        {{ method_field('PATCH') }}

        <input type="hidden" name="page" id="name" value="{{ $_GET['page'] }}">

@endif

        {{ csrf_field() }}

        <div class="box-body">
            <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
                <label for="name">
                    Name @include('common.form.label-required-field')
                </label>

                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old('name') ?: (isset($user_edit->name) ? $user_edit->name : '') }}">

                @if ($errors->has('name'))
                    @include('common.form.input-error-message', ['message' => $errors->first('name')])
                @endif
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
                <label for="email">
                    Email @include('common.form.label-required-field')
                </label>

                <input type="text" class="form-control" id="email" name="email"
                       value="{{ old('email') ?: (isset($user_edit->email) ? $user_edit->email : '') }}">

                @if ($errors->has('email'))
                    @include('common.form.input-error-message', ['message' => $errors->first('email')])
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
                <label for="password">
                    Password @include('common.form.label-required-field')
                </label>

                <input type="password" class="form-control" id="password" name="password"
                       value="{{ old('password') ?: (isset($user_edit->password) ? $user_edit->password : '') }}">

                @if ($errors->has('password'))
                    @include('common.form.input-error-message', ['message' => $errors->first('password')])
                @endif
            </div>

            <div class="form-group">
                @component('common.form.button-save-new-or-save-changes')
                    @slot('route_create', route('user.index'))
                    @slot('route_edit', route('user.edit', ($user_edit ?? 0)))
                @endcomponent

                @component('common.form.button-cancel')
                    @slot('route_edit', route('user.edit', ($user_edit ?? 0)))
                    @slot('route_redirect', route('user.index', ['page' => $_GET['page'] ?? 1]))
                @endcomponent
            </div>
        </div>
    </form>