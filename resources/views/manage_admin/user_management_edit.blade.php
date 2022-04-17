@extends('layouts.template1')
@section('content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Form Wizard</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="card">
                    <div class="card-body wizard-content">
                        <h4 class="card-title">Basic Form Example</h4>
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="update-user/{{$users->id}}" class="mt-5">
                        {{csrf_field()}}
                            <div>
                                <h3>Account</h3>
                                <section>
                                    <label for="name">User name *</label>
                                    <input id="name" name="name" type="text" class="required form-control">
                                    <label for="password">Password *</label>
                                    <input id="password" name="password" type="text" class="required form-control">
                                    <label for="confirm">Confirm Password *</label>
                                    <input id="confirm" name="confirm" type="text" class="required form-control">
                                    <p>(*) Mandatory</p>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
</div>
@endsection