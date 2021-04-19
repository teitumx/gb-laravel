<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3
                class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>

{{--Обработка ошибок--}}
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>

            @endforeach

        @endif

        <form id="contactForm" name="contact" action="{{ route('contact.store') }}">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" name="name"  type="text" value="{{ old('name') }}" placeholder="Your Name *"  data-validation-required-message="Please enter your name." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="email" type="email" placeholder="Your Email *"  value="{{ old('email') }}" data-validation-required-message="Please enter your email address." />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" name="phone" id="phone" type="tel" placeholder="Your Phone *" value="{{ old('phone') }}" data-validation-required-message="Please enter your phone number." />
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea name="message" class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div id="success"></div>
                <button class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
            </div>
        </form>
    </div>
</section>
