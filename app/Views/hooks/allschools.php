
<input type="hidden" name="school_uid" id="school_uid">
        <script>
            $(document).ready(function () {
                const getURL = '<?= base_url('/getschools') ?>';
                $.ajax({
                    type: "GET",
                    url: getURL,
                    data: {
                        allData: '',
                        page: 0,
                    },
                    success: function (response) {
                        if (response.status === 'success') {
                            window.schools = response.data;
                            $(document).trigger('schoolsDataLoaded');
                            let getschools = response.data;
                            const schoolName = $('#<?=$schoolid?>');
                            if (getschools && getschools.length > 0) {
                                getschools.forEach(School => {
                                    schoolName.append(
                                        `<option value="${School.schools}, ${School.city}" data-schools-id="${School.id}">${School.schools}, ${School.city}</option>`
                                    );
                                });
                                schoolName.prop('disabled', false);
                            } else {
                                schoolName.empty()
                                    .append('<option value="">Choose School</option>')
                                    .prop('disabled', true);
                            }
                        } else {
                            console.error('Failed to fetch School:', response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error('AJAX error:', error);
                    },
                });
            });
        </script>
        <script>
            $(document).ready(function(){
                $(document).on('schoolsDataLoaded', function () {
                    if (!window.schools) {
                        console.error('School data not loaded yet.');
                        return;
                    }

                    $('#<?=$schoolid?>').change(function () {
                        const selectedOption = $(this).find(':selected'); 
                        const id = selectedOption.val();                 
                        const selectedId = selectedOption.data('schools-id'); 
                        if (!selectedId) {
                            $('#school_uid').val('');
                            return;
                        }
                        const selectedSchool = window.schools.find(school => school.id == selectedId);
                        if (selectedSchool) {
                            $('#school_uid').val(selectedSchool.uid);
                        } else {
                            console.error('Selected School not found in data.');
                        }
                    });
                });
            })
        </script>