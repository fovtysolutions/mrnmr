<?php // echo view('common_script/allCountryStateCity', ['countryid'=>'countryid', 'stateid'=>'stateid', 'cityid'=>'cityid', 'selectedcountry'=>'selectedcountry', 'selectedstate'=>'selectedstate', 'selectedcity' =>'selectedcity']); ?>
<script>
    $(document).ready(function () {
        const selectedCountry = "<?= isset($selectedcountry) ? $selectedcountry : '' ?>";
        const selectedState = "<?= isset($selectedstate) ? $selectedstate : '' ?>";
        const selectedCity = "<?= isset($selectedcity) ? $selectedcity : '' ?>";

        $.getJSON('<?= base_url('assets/countries_states_cities.json') ?>', function (data) {
            data.forEach(country => {
                const isSelected = country.name === selectedCountry ? 'selected' : '';
                $('#<?= $countryid ?>').append(
                    `<option ${isSelected} value="${country.name}">${country.name}</option>`
                );
            });

            if (selectedCountry) {
                const countryData = data.find(c => c.name === selectedCountry);
                if (countryData && countryData.states) {
                    $('#<?= $stateid ?>').empty().append('<option value="">Select State</option>');
                    countryData.states.forEach(state => {
                        const isSelectedState = state.name === selectedState ? 'selected' : '';
                        $('#<?= $stateid ?>').append(
                            `<option ${isSelectedState} value="${state.name}">${state.name}</option>`
                        );
                    });
                    $('#<?= $stateid ?>').prop('disabled', false);

                    if (selectedState) {
                        const stateData = countryData.states.find(s => s.name === selectedState);
                        if (stateData && stateData.cities) {
                            $('#<?= $cityid ?>').empty().append('<option value="">Select City</option>');
                            stateData.cities.forEach(city => {
                                const isSelectedCity = city === selectedCity ? 'selected' : '';
                                $('#<?= $cityid ?>').append(
                                    `<option ${isSelectedCity} value="${city}">${city}</option>`
                                );
                            });
                            $('#<?= $cityid ?>').prop('disabled', false);
                        }
                    }
                }
            }

            $('#<?= $countryid ?>').on('change', function () {
                const selectedCountry = $(this).val();
                const countryData = data.find(c => c.name === selectedCountry);

                $('#<?= $stateid ?>').empty().append('<option value="">Select State</option>');
                $('#<?= $cityid ?>').empty().append('<option value="">Select City</option>').prop('disabled', true);

                if (countryData && countryData.states.length > 0) {
                    countryData.states.forEach(state => {
                        $('#<?= $stateid ?>').append(
                            `<option value="${state.name}">${state.name}</option>`
                        );
                    });
                    $('#<?= $stateid ?>').prop('disabled', false);
                } else {
                    $('#<?= $stateid ?>').prop('disabled', true);
                }
            });

            $('#<?= $stateid ?>').on('change', function () {
                const selectedCountry = $('#<?= $countryid ?>').val();
                const selectedState = $(this).val();
                const countryData = data.find(c => c.name === selectedCountry);
                const stateData = countryData.states.find(s => s.name === selectedState);

                $('#<?= $cityid ?>').empty().append('<option value="">Select City</option>');

                if (stateData && stateData.cities.length > 0) {
                    stateData.cities.forEach(city => {
                        $('#<?= $cityid ?>').append(
                            `<option value="${city.name}">${city.name}</option>`
                        );
                    });
                    $('#<?= $cityid ?>').prop('disabled', false);
                } else {
                    $('#<?= $cityid ?>').prop('disabled', true);
                }
            });
        });
    });
</script>