@extends('layouts.admin')

@section('content')
<div class="content-area">
  <div class="card">
    <div class="d-sm-flex align-items-center justify-content-between">
    <h5 class=" mb-0 text-gray-800 pl-3">{{ __('Email Configuration') }}</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">{{ __('Email Settings') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.group.show') }}">{{ __('Email Configuration') }}</a></li>
    </ol>
    </div>
  </div>
</div>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <!-- Form Basic -->
    <div class="card mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      </div>

      <div class="card-body">
        <div class="gocover" style="background: url({{asset('assets/images/'.$gs->admin_loader)}}) no-repeat scroll center center rgba(45, 45, 45, 0.5);"></div>
        <form class="geniusform" action="{{ route('admin.gs.update') }}" method="POST" enctype="multipart/form-data">

            @include('includes.admin.form-both')

            {{ csrf_field() }}

            <div class="form-group">
                <label for="inp-title">{{  __('SMTP')  }}</label>
                <div class="frm-btn btn-group mb-1">
                    <button type="button" class="btn btn-sm btn-rounded dropdown-toggle btn-{{ $gs->is_smtp == 1 ? 'success' : 'danger' }}" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      {{ $gs->is_smtp == 1 ? __('Activated') : __('Deactivated')}}
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="1" data-val="{{ __('Activated') }}" data-href="{{ route('admin.gs.status',['is_smtp',1]) }}">{{ __('Activate') }}</a>
                      <a class="dropdown-item drop-change" href="javascript:;" data-status="0" data-val="{{ __('Deactivated') }}" data-href="{{ route('admin.gs.status',['is_smtp',0]) }}">{{ __('Deactivate') }}</a>
                    </div>
                  </div>
            </div>

            <div class="form-group">
              <label>{{ __('Mail Driver') }} *</label>
              <select name="mail_driver" class="input-field" required>
                <option value="smtp" {{ $gs->mail_driver == 'smtp' ? 'selected' : '' }}>SMTP</option>
                <option value="sendmail" {{ $gs->mail_driver == 'sendmail' ? 'selected' : '' }}>SENDMAIL</option>
              </select>
            </div>

            <div class="form-group">
              <label>{{ __('SMTP Host') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('Mail Host') }}" name="mail_host" value="{{ $gs->mail_host }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('SMTP Port') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('Mail Port') }}" name="mail_port" value="{{ $gs->mail_port }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('Encryption') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('Mail Encryption') }}" name="mail_encryption" value="{{ $gs->mail_encryption }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('SMTP Username') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('Mail Username') }}" name="mail_user" value="{{ $gs->mail_user }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('SMTP Password') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('Mail Password') }}" name="mail_pass" value="{{ $gs->mail_pass }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('From Email') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('From Email') }}" name="from_email" value="{{ $gs->from_email }}" required>
            </div>

            <div class="form-group">
              <label>{{ __('From Name') }} *</label>
              <input type="text" class="input-field" placeholder="{{ __('From Name') }}" name="from_name" value="{{ $gs->from_name }}" required>
            </div>


            <button type="submit" id="submit-btn" class="btn btn-primary">{{ __('Submit') }}</button>

        </form>
      </div>
    </div>
  </div>
</div>


@endsection
