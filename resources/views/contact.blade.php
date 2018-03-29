@extends('layouts.app')

@section('styles')
    @endsection

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2996.078729356383!2d19.831867215635643!3d41.328901357581394!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1350313d1d3cc9d7%3A0x40f2c396bc6ed150!2zQWxpIERlbWksIFRpcmFuw6ssIFNocWlww6tyaWE!5e0!3m2!1ssq!2s!4v1521887035379" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>

            <div class="span4">
                <h2>Contact Us</h2>
                <address>
                    <strong>Tirane Albania</strong><br>
                    Rruga Ali Demi<br>
                    <abbr title="Phone">P:</abbr> 00355686346141
                    <p>Email: <a href="mailto:shkofilma.live@gmail.com" target="_top">shkofilma.live@gmail.com</a> </p>
                </address>
            </div>
        </div>
    </div>
    @endsection
@section('footer')
    @include('layouts.footer')
@endsection