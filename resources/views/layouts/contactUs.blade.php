@extends('layouts.app')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="text-center">Contact Us</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row mb-5">
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="text">
                        <p><span>Address:</span> 1er étage, Avenue des FAR, Tour des habous, Casablanca 20000</p>
                      </div>
                  </div>
                        </div>
                        <div class="col-md-3">
                        <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="text">
                        <p><span>Phone:</span> <a href="tel://+212687049050">+212 687049050</a></p>
                      </div>
                  </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-plus"></i>
                        </div>
                        <div class="text">
                        <p><span>Email:</span> <a href="mailto:talbaouimouad@gmail.com">talbaouimouad@gmail.com</a></p>
                      </div>
                  </div>
                        </div>
                        <div class="col-md-3">
                            <div class="dbox w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <i class="bi bi-globe"></i>
                        </div>
                        <div class="text">
                        <p><span>Website</span> <a href="#">projectled.com</a></p>
                      </div>
                  </div>
                        </div>
                    </div>
                    <div class="row no-gutters">
                        <div class="col-md-7 ">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Send Us a Message</h3>
                                @if (session('status'))
                                <x-alert type="success" :message="session('status')"/>
                                @endif
                                <form action="{{route('sendmessage')}}" method="POST" id="contactForm" name="contactForm" class="contactForm">
                                   @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Subject</label>
                                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Message</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Send Message" class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5  align-items-stretch">
                            <img src="storage/public/img/ghostface.jpg" >
                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection