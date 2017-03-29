@extends('master')
@section('meta-title','Terms &amp; Conditions - Envivo Social')
@section('body-id','content')
@section('header')
    @include('partials.default-header')
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <h1 class="page-header">Terms &amp; Conditions <small>as of {{ date('jS F Y',filemtime(__FILE__)) }}</small></h1>

            <p>Please read these Terms and Conditions (&quot;Terms&quot;, &quot;Terms and Conditions&quot;) carefully before using the https://envivosocial.co website (the &quot;Service&quot;) operated by Envivo Social (&quot;us&quot;, &quot;we&quot;, or &quot;our&quot;).</p>
            <p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
            <p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. This Terms &amp; Conditions agreement is licensed by TermsFeed to Envivo Social.</p>
            <p><strong>Links To Other Web Sites</strong></p>
            <p>Our Service may contain links to third-party web sites or services that are not owned or controlled by Envivo Social.</p>
            <p>Envivo Social has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that Envivo Social shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
            <p>Envivo Social assumes no responsibility for the content of social media updates shared using the Service.</p>
            <p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>
            <p><strong>Termination</strong></p>
            <p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>
            <p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>
            <p><strong>Governing Law</strong></p>
            <p>These Terms shall be governed and construed in accordance with the laws of United Kingdom, without regard to its conflict of law provisions.</p>
            <p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>
            <p><strong>Changes</strong></p>
            <p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
            <p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>
            <p><strong>Contact Us</strong></p>
            <p>If you have any questions about these Terms, please contact us.</p>

        </div>
    </div>
@endsection
@section('footer')
    @include('partials.default-footer')
@endsection