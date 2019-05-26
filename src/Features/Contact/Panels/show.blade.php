@extends('common::layout.default')
@section('body')
@action('show')
<div class="blog__content mb-72">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2>Always glad to hear from you!</h2>
            <p>Don't hesitate to get in touch. I will reply you as soon as possible, personally.</p>
            <ul class="contact-items">
                <li class="contact-item"><a href="mailto:bruno.falcao@laraflash.com">bruno.falcao (at) laraflash.com</a></li>
            </ul>
            <!-- Contact Form -->
            <form id="contact-form" class="contact-form mt-30 mb-30" method="post" action="{{ route('contact.store') }}">
                @csrf
                <div class="contact-name">
                    <label for="name">Your Name <abbr title="required" class="required">*</abbr></label>
                    <input name="name" id="name" type="text" value="{{ old('name') ?? null }}" required="required">
                </div>
                <div class="contact-email">
                    <label for="email">Your Email <abbr title="required" class="required">*</abbr></label>
                    <input name="email" id="email" type="email" required="required">
                </div>
                <div class="contact-subject">
                    <label for="email">What is it about?</label>
                    <input name="subject" id="subject" type="text">
                </div>
                <div class="contact-message">
                    <label for="message">Can you detail? <abbr title="required" class="required">*</abbr></label>
                    <textarea id="message" name="message" rows="7" required="required"></textarea>
                </div>
                <input class="btn btn-lg btn-color btn-button" value="Send Message" id="submit-message" type="submit">
                <div id="msg" class="message"></div>
            </form>
        </div>
    </div>
</div>
@endaction

@action('store')
    @section('additional.stylesheets')
    <link rel="stylesheet" href="css/sticky-footer.css" />
    @endsection

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2>Thank you for your message!</h2>
            <p>I will get back to you soon!</p>
            <p>Bruno Falcao<br/>laraflash.com</p>
        </div>
    </div>
@endaction

@endsection