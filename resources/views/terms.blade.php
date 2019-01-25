<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="https://batdongsanngach.com/wp-content/uploads/2018/01/checklist-icon-350-28.png"/>
    <link rel="manifest" href="/manifest.json">
    <!-- Android -->
    <meta name="theme-color" content="#2BB0ED">
    <!-- IOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="blue">
    <style>
        [v-cloak] {display: none}
    </style>
    <title>Privacy</title>
</head>
<body>
<v-app id="app" v-cloak>

    <template>
        <section>
            <v-toolbar class="white">
                <v-toolbar-title class="hidden-xs-only"> Cristian Marin Tejeda</v-toolbar-title>
                <v-toolbar-title class="hidden-sm-only hidden-lg-only hidden-xl-only hidden-md-only"> Cristian</v-toolbar-title>
                <v-spacer></v-spacer>
                @if (Route::has('login'))

                    @auth
                        <v-btn flat href="{{ url('/home') }}">Home</v-btn>
                    @else
                        <v-btn flat href="/">Welcome</v-btn>
                        <v-btn flat href="{{ route('login') }}">Login</v-btn>
                        <v-btn flat href="{{ route('register') }}">Register</v-btn>
                    @endauth

                @endif
            </v-toolbar>
            </div>
            </nav>
            <portal-target name="nav-after"></portal-target>
            <section>
                <div class="container content tw-leading-loose">
                    <div class="md:tw-w-4/5 md:tw-px-6 md:tw-m-auto">
                        <h1 class="tw-text-center tw-text-black tw-text-3xl tw-mb-8">Terms of Services</h1>
                        <p class="tw-mb-8">
                            By accessing this web site, you are agreeing to be bound by these
                            web site Terms and Conditions of Use, all applicable laws and regulations,
                            and agree that you are responsible for compliance with any applicable local
                            laws. If you do not agree with any of these terms, you are prohibited from
                            using or accessing this site. The materials contained in this web site are
                            protected by applicable copyright and trade mark law.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            1. Use License
                        </h4>
                        <ol class="md:tw-pl-10">
                            <li>
                                Permission is granted to temporarily download one copy of the materials
                                (information or software) on Laracasts's web site for personal,
                                non-commercial transitory viewing only. This is the grant of a license,
                                not a transfer of title, and under this license you may not:
                                <ol>
                                    <li>modify or copy the materials</li>
                                    <li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial)</li>
                                    <li>attempt to decompile or reverse engineer any software contained on Laracasts's web site</li>
                                    <li>remove any copyright or other proprietary notations from the materials or</li>
                                    <li>transfer the materials to another person or "mirror" the materials on any other server.</li>
                                </ol>
                            </li>
                            <li>
                                This license shall automatically terminate if you violate any of these restrictions
                                and may be terminated by Laracasts at any time. Upon terminating your viewing of
                                these materials or upon the termination of this license, you must destroy any
                                downloaded materials in your possession whether in electronic or printed format.
                            </li>
                        </ol>
                        <h4 class="tw-font-bold tw-text-2xl">
                            2. Disclaimer
                        </h4>
                        <p class="md:tw-pl-10">
                            The materials on Laracasts's web site are provided "as is". Laracasts makes no
                            warranties, expressed or implied, and hereby disclaims and negates all other
                            warranties, including without limitation, implied warranties or conditions of
                            merchantability, fitness for a particular purpose, or non-infringement of
                            intellectual property or other violation of rights. Further, Laracasts does not
                            warrant or make any representations concerning the accuracy, likely results, or
                            reliability of the use of the materials on its Internet web site or otherwise
                            relating to such materials or on any sites linked to this site.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            3. Limitations
                        </h4>
                        <p class="md:tw-pl-10">
                            In no event shall Laracasts or its suppliers be liable for any damages (including,
                            without limitation, damages for loss of data or profit, or due to business
                            interruption,) arising out of the use or inability to use the materials on Laracasts's
                            Internet site, even if Laracasts or a Laracasts authorized representative has been
                            notified orally or in writing of the possibility of such damage. Because some
                            jurisdictions do not allow limitations on implied warranties, or limitations of
                            liability for consequential or incidental damages, these limitations may not apply to
                            you.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            4. Revisions and Errata
                        </h4>
                        <p class="md:tw-pl-10">
                            The materials appearing on Laracasts's web site could include technical, typographical, or
                            photographic errors. Laracasts does not warrant that any of the materials on its web site
                            are accurate, complete, or current. Laracasts may make changes to the materials contained on
                            its web site at any time without notice. Laracasts does not, however, make any commitment to
                            update the materials.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            5. Links
                        </h4>
                        <p class="md:tw-pl-10">
                            Laracasts has not reviewed all of the sites linked to its Internet web site and is not
                            responsible for the contents of any such linked site. The inclusion of any link does not
                            imply endorsement by Laracasts of the site. Use of any such linked web site is at the
                            user's own risk.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            6. Site Terms of Use Modifications
                        </h4>
                        <p class="md:tw-pl-10">
                            Laracasts may revise these terms of use for its web site at any time without notice. By
                            using this web site you are agreeing to be bound by the then current version of these
                            Terms and Conditions of Use.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            7. Governing Law
                        </h4>
                        <p class="md:tw-pl-10">
                            Any claim relating to Laracasts's web site shall be governed by the laws of the State of
                            Tennessee without regard to its conflict of law provisions.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            8. Refunds
                        </h4>
                        <p class="md:tw-pl-10">
                            If you are not 100% satisfied with your purchase, within the first seven days, contact
                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="94e7e1e4e4fbe6e0d4f8f5e6f5f7f5e7e0e7baf7fbf9">[email&#160;protected]</a> to request a full refund of your most recent subscription bill.
                        </p>
                        <h4 class="tw-font-bold tw-text-2xl">
                            Contact Us
                        </h4>
                        <address>
                            Laracasts Inc.<br>
                            55 E. Main Street #304<br>
                            Chattanooga, TN 37408<br>
                            USA<br>
                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e794929797889593a78b8695868486949394c984888a">[email&#160;protected]</a>
                        </address>
                    </div>
                </div>
            </section>
        </section>
    </template>

</v-app>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
