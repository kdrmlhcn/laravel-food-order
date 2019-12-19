@extends('frontend.layouts.app')
@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">CADA Food Order System - Contact</h1>
            <p class="lead text-muted mb-0">If you want to contact us, you can send a form easily.</p>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact Us
                    </div>
                    <div class="card-body">
                        <form action="{{ route('frontend.contact.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="message">Subject</label>
                                <select class="form-control" name="subject">
                                    <option value="Order">Order</option>
                                    <option value="Technical">Technical</option>
                                    <option value="Suggestion">Suggestion</option>
                                    <option value="Complaint">Complaint</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" rows="6" required></textarea>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-primary text-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                    <div class="card-body">
                        <p>3 rue des Champs Elysées</p>
                        <p>75008 PARIS</p>
                        <p>France</p>
                        <p>Email : info@cadafood.com</p>
                        <p>Tel. +33 451 168 12 31</p>

                    </div>
                </div>

                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
