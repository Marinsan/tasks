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
            <div class="container content tw-leading-loose">
                <div class="md:tw-w-4/5 md:tw-px-6 md:tw-m-auto">
                    <h1 class="tw-text-center tw-text-black tw-text-3xl tw-mb-8">Privacy Policy</h1>
                    <div class="tw-mb-8">
                        <p>
                            This privacy policy discloses the privacy practices for
                            laracasts.com. This privacy policy applies solely to
                            information collected by this web site. It will notify you of
                            the following:
                        </p>
                        <ul>
                            <li>What personally identifiable information is collected from you through the web site, how it is used and with whom it may be shared.</li>
                            <li>What choices are available to you regarding the use of your data.</li>
                            <li>The security procedures in place to protect the misuse of your information.</li>
                            <li>How you can correct any inaccuracies in the information.</li>
                        </ul>
                    </div>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Information Collection, Use, and Sharing
                    </h4>
                    <p>
                        We are the sole owners of the information collected on this site.
                        We only have access to/collect information that you voluntarily
                        give us via email or other direct contact from you. We will not
                        sell or rent this information to anyone.
                    </p>
                    <p>
                        We will use your information to respond to you, regarding the
                        reason you contacted us. We will not share your information with
                        any third party outside of our organization, other than as
                        necessary to fulfill your request, e.g. to ship an order.
                    </p>
                    <p>
                        Unless you ask us not to, we may contact you via email in the
                        future to tell you about specials, new products or services, or
                        changes to this privacy policy.
                    </p>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Your Access to and Control Over Information
                    </h4>
                    <p>
                        You may opt out of any future contacts from us at any time. You
                        can do the following at any time by contacting us via the email
                        address or phone number given on our website:
                    </p>
                    <ul>
                        <li>See what data we have about you, if any.</li>
                        <li>Change/correct any data we have about you.</li>
                        <li>Have us delete any data we have about you.</li>
                        <li>Express any concern you have about our use of your data.</li>
                    </ul>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Security
                    </h4>
                    <p>
                        We take precautions to protect your information. When you
                        submit sensitive information via the website, your information
                        is protected both online and offline.
                    </p>
                    <p>
                        Wherever we collect sensitive information (such as credit card
                        data), that information is encrypted and transmitted to us in a
                        secure way. You can verify this by looking for a closed lock icon
                        at the bottom of your web browser, or looking for "https" at the
                        beginning of the address of the web page.
                    </p>
                    <p>
                        While we use encryption to protect sensitive information
                        transmitted online, we also protect your information offline. Only
                        employees who need the information to perform a specific job (for
                        example, billing or customer service) are granted access to
                        personally identifiable information. The computers/servers in which
                        we store personally identifiable information are kept in a secure
                        environment.
                    </p>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Registration
                    </h4>
                    <p>
                        In order to use this website, a user must first complete the
                        registration form. During registration a user is required to give
                        certain information (such as name and email address). This
                        information is used to contact you about the products/services on
                        our site in which you have expressed interest. At your option, you
                        may also provide demographic information (such as gender or age)
                        about yourself, but it is not required.
                    </p>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Links
                    </h4>
                    <p>
                        This web site contains links to other sites. Please be aware
                        that we are not responsible for the content or privacy
                        practices of such other sites. We encourage our users to be
                        aware when they leave our site and to read the privacy
                        statements of any other site that collects personally
                        identifiable information.
                    </p>
                    <h4 class="tw-font-bold tw-text-2xl">
                        Updates
                    </h4>
                    <p>
                        Our Privacy Policy may change from time to time and all updates
                        will be posted on this page.
                    </p>
                    <p>
                        If you feel that we are not abiding by this privacy policy, you
                        should contact us immediately via email at

                    </p>
                </div>
            </div>
        </section>
    </template>

</v-app>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
