@extends('common::layout.default')
@section('body')
@action('show')
<div class="blog__content mb-72">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h2>About Laraflash</h2>
            <p>Laraflash is a news portal exclusively about Laravel news. It scans dozens of websites that post news about Laravel
            and consolidates them into a since website, here!</p>
            <p>Laraflash offers you:</p>
            <ul>
                <li><p>News updates <strong class="text-primary">each 30 minutes</strong> (in case there are new articles announced)!</p></li>
                <li><p>Search the <strong class="text-primary">Laraflash articles database</strong>, with thousands of articles to search!</p></li>
            </ul>
            <p>Laraflash is not responsible for the articles content, since the system automatically retrieves articles content from other sources.</p>
            <p>Any suggestions, or any other contact you need please use the "contact" link in the top navbar. Would be glad to receive a message from you!</p>
            <p>Sincerely,</p>
            <p>Bruno Falcao</p>
            <p>bruno.falcao(at)laraflash.com</p>
        </div>
    </div>
</div>
@endaction
@endsection