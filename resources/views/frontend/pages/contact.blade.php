@extends('frontend.layout.app')
@section('frontend_content')

<section id="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-content text-center">
                    <h1>Contact Page</h1>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- contact section --}}
<section id="contact" class="mt-5">
    <div class="container bg-white mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-head">
                    <div class="contact-details">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>Address: Dhaka, Bangladesh</li>
                            <li>Phone: 0000000000</li>
                            <li>Email: demo@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-head">
                    <div class="contact-details">
                        <h4>Get In Touch</h4>
                      <form action="">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Your name">
                          </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="Your Email">
                          </div>
                          <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject">
                          </div>
                          <div class="mb-3">
                            <label for="subject" class="form-label">Your Query</label>
                            <textarea name="your_query" placeholder="your_query" id="" cols="49" rows="5"></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- contact section --}}

{{-- company beliver section --}}
<section id="beliver-company" class="mt-5">
    <div class="container bg-white my-5">
        <div class="row py-5">
            <div class="col-lg-12">
                <div class="cmn-header text-center">
                    <h4>Companies Belive In Us</h4>
                </div>
            </div>
        </div>
        <div class="top-company-content py-3 px-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card top-company-inner">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card top-company-inner">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card top-company-inner">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card top-company-inner">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="card-link">Card link</a>
                            <a href="#" class="card-link">Another link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- company beliver section --}}
@endsection
