<script>
    $(document).ready(function () {
        let valuelimit = localStorage.getItem('rowsToShow');
        const masterkey = 'masterkey';
        if(!valuelimit){
            valuelimit = 10;
        }
        
        const base_url = "<?= base_URL($editroute) ?>/";
        const rauteURL = '<?= base_URL($routeURL) ?>';
        const deleteURL = '<?= base_URL($deleteURL) ?>';
        let pagination = {};
        let timestatus = new Date().toISOString().slice(0, 10);
        
        ajaxSend(0, timestatus, rauteURL, masterkey, valuelimit, 'arrivals', $('#arrivals'), $('#pagimains'));
        ajaxSend(0, timestatus, rauteURL, masterkey, valuelimit, 'departures', $('#departures'), $('#pagimains'));
        ajaxSend(0, null, rauteURL, masterkey, 20, 'eventdata', $('#eventdata'), $('#pagimains'));
        
        $(document).on('click', '.startdate', function(){
            const type = $(this).data('type');
            if(type == 'today'){
                timestatus = new Date().toISOString().slice(0, 10);
            }else if(type == 'tomorrow'){
                timestatus = new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().slice(0, 10);
            }else if(type == 'yesterday'){
                timestatus = new Date(new Date().setDate(new Date().getDate() - 1)).toISOString().slice(0, 10);
            }
            ajaxSend(0, timestatus, rauteURL, masterkey, valuelimit, 'arrivals', $('#arrivals'), $('#pagimains'));
        });

        $(document).on('click', '.enddate', function(){
            const type = $(this).data('type');
            if(type == 'today'){
                timestatus = new Date().toISOString().slice(0, 10);
            }else if(type == 'tomorrow'){
                timestatus = new Date(new Date().setDate(new Date().getDate() + 1)).toISOString().slice(0, 10);
            }else if(type == 'yesterday'){
                timestatus = new Date(new Date().setDate(new Date().getDate() - 1)).toISOString().slice(0, 10);
            }   
            ajaxSend(0, timestatus, rauteURL, masterkey, valuelimit, 'departures', $('#departures'), $('#pagimains'));
        });
            
        function ajaxSend(page, alldata, routeurl, masterkey, pagelimit, whichfunction, mainidname, pegiidname) {
            $.ajax({
                type: "GET",
                url: routeurl,
                data: {
                    whichfunction: whichfunction,
                    allData: alldata,
                    masterkey: masterkey,
                    pagelimit: pagelimit,
                    page: page,
                },
            }).done(function (response) {
                if (response.status === 'success') {
                    if(whichfunction == 'eventdata'){
                        joinEventData(response.data, mainidname);
                    }else{
                        joinmainData(response.data, mainidname);
                    }
                } else if (response.status === 'error') {
                    if(whichfunction == 'eventdata'){
                        joinEventData([], mainidname);
                    }else{
                        joinmainData([], mainidname);
                    }
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
                    return `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${details.name}</td>
                                <td>${details.adult}</td>
                                <td>${details.rooms}</td>
                                <td>${details.start ? formatDate(details.start.split(' ')[0]) : formatDate(details.end.split(' ')[0])}</td>
                                <td><span class="badge rounded-pill  mb-2" style="padding:5px 14px;background-color: ${details.reserve_status};">${details.colorstatus}</span></td>
                               
                            </tr>
                        `;
                });

                $(divID).html(result.join(''));
            } else {
                $(divID).html(`<tr><td colspan="6" class="message-row">
                                        <i class="fa fa-exclamation-triangle mr-2"></i>
                                        No arrivals for today.
                                    </td></tr>`);
            }
        }

        function joinEventData(arrayhere, divID) {
            if (arrayhere.length > 0) {
                let result = arrayhere.map((details, index) => {
                    return `
                            <div class="event-item">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-hotel event-icon-bg"></i>

                                        <div class="event-item-info">
                                            <h5 class="pb-1">${details.name}</h5>
                                            <div class="pb-1">
                                                <span class="booking-id">${details.id}</span>
                                                <span class="booking-date">${details.start ? new Date(details.start).toLocaleString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' }) : ''}</span>
                                            </div>
                                            <p>${details.colorstatus}</p>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge rounded-pill  mb-2" style="background-color: ${details.reserve_status};">${details.colorstatus}</span>
                                        <div class="history-booking">
                                            <span><i class="fas fa-sort-down"></i>${details.start ? formatCustomDate(details.start) : ''}</span>
                                            <span> - 1 Night</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        `;
                });

                $(divID).html(result.join(''));
            } else {
                $(divID).html(`<tr><td colspan="6" class="message-row">
                                        <i class="fa fa-exclamation-triangle mr-2"></i>
                                        No arrivals for today.
                                    </td></tr>`);
            }
        }

        function formatCustomDate(dateStr) {
            const date = new Date(dateStr);

            const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            const day = ('0' + date.getDate()).slice(-2);
            const month = ('0' + (date.getMonth() + 1)).slice(-2); // month is 0-indexed
            const year = date.getFullYear();
            const weekday = weekdays[date.getDay()];

            return `${weekday}, ${day}/${month}/${year}`;
        }

        function formatDate(dateString) {
            const [year, month, day] = dateString.split('-');
            return `${day}-${month}-${year}`;
        }

        $(document).on("click", ".deletetr", function () {
            const deleteID = $(this).data('delete-id');
            const row = $(this).closest('tr');
            $.ajax({
                type: "POST",
                url: deleteURL,
                data: { delete: deleteID },
            })
            .done(function (response) {
                if (response.status === 'success') {
                    toastr.success(response.massage);
                    ajaxSend(0, null, rauteURL, masterkey, valuelimit);
                    row.remove();
                } else if (response.status === 'error') {
                    toastr.error(response.massage);
                }
            })
            .fail(function () {
                toastr.error("Failed to connect to the server.");
            });
        });
    })  
</script>