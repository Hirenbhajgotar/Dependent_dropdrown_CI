<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bulma.min.css">
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>

                <a class="navbar-item">
                    Documentation
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        More
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            About
                        </a>
                        <a class="navbar-item">
                            Jobs
                        </a>
                        <a class="navbar-item">
                            Contact
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Report an issue
                        </a>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary">
                            <strong>Sign up</strong>
                        </a>
                        <a class="button is-light">
                            Log in
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <hr>

    <div class="container">
        <div class="notification">
            <!-- This container is <strong>centered</strong> on desktop. -->
            <strong>Dependent dropdown</strong> using Codeigniter
        </div>
        
        <!-- country dropdown -->
        <?= form_open('Country/set_CountryState') ?>
        <div class="select">
            <select name="country" id="country" onchange="get_state()">
                <option selected disabled>Select country</option>
                <?php foreach ($countries as $country) { ?>
                    <option value="<?= $country->id ?>"><?= $country->country_name ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- state dropdown -->
        <div class="select">
            <select id="state" name="state">
                <option selected disabled>Select state</option>
            </select>
        </div>
        <button type="submit">submit</button>
        <?= form_close() ?>
    </div>

    <script src="assets/js/jquery-3.4.1.js"></script>
    <script>
        function get_state() {
            let country_id = document.getElementById('country').value;
            // console.log(country_id);
            // let c_id = [country_id];

            $.ajax({
                url: "<?php echo site_url('Country/states') ?>",
                method: "post",
                data: {
                    'country_id': country_id
                },
            }).done(function(states) {
                states = JSON.parse(states)
                console.log(states);
                $('#state').empty();
                states.forEach(function(state) {
                    $('#state').append('<option value="'+state.id+'">' + state.state_name + '</option>')
                });
            });
        }
    </script>
</body>

</html>