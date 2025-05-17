<script>
    $(document).ready(function () {
        let valuelimit = localStorage.getItem('rowsToShow');
        const masterkey = 'masterkey';
        if(!valuelimit){
            valuelimit = 10;
        }
        
        const base_url = "<?= base_URL($editroute) ?>/";
        const paramsElement = $('#<?= $mainid ?>');
        const pagiElement = $('#pagimains');
        const rauteURL = '<?= base_URL($routeURL) ?>';
        const deleteURL = '<?= base_URL($deleteURL) ?>';
        const ids = <?= $filterids ?>;
        const tds = <?= $td ?>;
        let csrfTokenValue = '<?php echo csrf_hash(); ?>';
        let pagination = {};
        ajaxSend(0, null, rauteURL, masterkey, valuelimit);

        $("#searching").click(function () {
            let search = $('#searches').val();
            ajaxSend(0, search, rauteURL, masterkey, valuelimit);
        })

        $("#rowSelect").click(function () {
            let limitset = $("#rowSelect").val();
            localStorage.setItem('rowsToShow', limitset);
            ajaxSend(0, null, rauteURL, masterkey, limitset);
        })

        $("#filtering").click(function () {
            let filterValues = {};
            Object.entries(ids).forEach(([key, value]) => {
                const elementValue = $(`#${value}`).val();
                filterValues[value] = elementValue || '';
            });
            ajaxSend(0, filterValues, rauteURL, masterkey, valuelimit);
        });

        $(document).on('click', '.pagechange', function () {
            const pagecpunt = $(this).data('page-id');
            ajaxSend(pagecpunt, null, rauteURL, masterkey, valuelimit);
        })

        $("#reseting").click(function () {
            Object.entries(ids).forEach(([key, value]) => {
                $(`#${value}`).val('');
            });
            ajaxSend(0, null, rauteURL, masterkey, valuelimit);
        })

        function ajaxSend(page, alldata, routeurl, masterkey, pagelimit) {
            $.ajax({
                type: "GET",
                url: routeurl,
                data: {
                    allData: alldata,
                    masterkey: masterkey,
                    pagelimit: pagelimit,
                    page: page,
                },
            }).done(function (response) {
                if (response.status === 'success') {
                    joinmainData(response.data, paramsElement);
                    joinpagiData(response.pagination, pagiElement);
                } else if (response.status === 'error') {
                    toastr.error(response.message)
                    joinmainData([], paramsElement);
                }
            })
        }

        function joinpagiData(dataObject, divID) {
            if (dataObject && dataObject.links && Array.isArray(dataObject.links)) {
                let result = `
                        <p>${dataObject.info || 'No Info Available'}</p>
                        <ul class="pagination pagination-sm d-flex flex-row justify-content-end" style="gap:5px">
                            ${dataObject.links.map((linkObj) => {
                                const link = linkObj.link && linkObj.link[0] ? linkObj.link[0] : {};
                                return `
                                        <li class="page-item ${linkObj.type || ''}">
                                            <a class="page-link pagechange ${linkObj.type || ''}" href="#" data-page-id="${link.pagecount}"
                                            data-page="${link.pagecount || ''}" 
                                            data-content="${link.contentDiv || ''}">
                                                ${link.text || 'Link'}
                                            </a>
                                        </li>
                                    `;
                            }).join('')}
                        </ul>
                    `;
                $(divID).html(result);
            } else {
                if (dataObject.info) {
                    $(divID).html(`<p>${dataObject.info}</p>`);
                }
            }
        }

        function joinmainData(arrayhere, divID) {
            if (arrayhere.length > 0) {
                let result = arrayhere.map((details, index) => {
                    let tdData = tds.map(id => `<td>${details[id] || ''}</td>`).join('');

                    return `
                            <tr>
                                <td>${index + 1}</td>
                                ${tdData}
                                <td>
                                    <a href="${base_url}${details.id}" class="btn-table btn-table-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn-table btn-table-danger ms-2 deletetr" data-delete-id="${details.id}" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        `;
                });

                $(divID).html(result.join(''));
            } else {
                $(divID).html('<tr><td colspan="13">No Items added</td></tr>');
            }
        }

        $(document).on("click", ".deletetr", function () {
            const deleteID = $(this).data('delete-id');
            const row = $(this).closest('tr');
            $.ajax({
                type: "POST",
                url: deleteURL,
                data: { delete: deleteID },
                headers: {
                    'X-CSRF-TOKEN': csrfTokenValue,
                },
            })
            .done(function (response) {
                console.log(response);
                if (response.status === 'success') {
                    toastr.success(response.message);
                    csrfTokenValue = response.new_csrf_token;
                    ajaxSend(0, null, rauteURL, masterkey, valuelimit);
                    row.remove();
                } else if (response.status === 'error') {
                    toastr.error(response.message);
                }
            })
            .fail(function () {
                toastr.error("Failed to connect to the server.");
            });
        });
    })  
</script>