<?php // echo view('common_script/statecityscript', ['state'=>'state','city'=>'city']); ?>
<script>
    $(document).ready(function () {
        $.getJSON('<?= base_url('assets/country_state_citys.json') ?>', function (data) {
            const states = data[0].states;
            states.forEach(state => {
                $('#<?= $state ?>').append(
                    `<option value="${state.name}">${state.name}</option>`
                );
            });
            $('#<?= $state ?>').on('change', function () {
                const selectedState = $(this).val();
                const stateData = states.find(state => state.name === selectedState);

                if (stateData && stateData.cities.length > 0) {
                    stateData.cities.forEach(city => {
                        $('#<?= $city ?>').append(
                            `<option value="${city.name}">${city.name}</option>`
                        );
                    });
                    $('#<?= $city ?>').prop('disabled', false);
                } else {
                    $('#<?= $city ?>').empty().append('<option value="">Select City</option>').prop('disabled', true);
                }
            });
        });
    });
</script>