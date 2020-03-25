$(document).ready(function() {
    $("#datatable").DataTable({
        responsive: true,
        ajax: {
            "url": "/getAllStudentData"
        },
        columns: [
            { "data": 'id' },
            { "data": 'name' },
            { "data": 'email' },
            { "data": 'phone' },
            { "data": 'location' },
            { "data": 'grade' },
            { "data": 'subject' },
            { "data": 'activity' },
            { "data": 'id' },
        ],
        columnDefs: [{
            targets: -1,
            orderable: false,
            render: function(id) {
                let url = "/studentDetail/?id=" + id;
                return `
                        <!-- <a href=""><i class="mdi mdi-lead-pencil"></i></a>&nbsp;&nbsp;&nbsp; -->
                        <a href="` + url + `"><i class="mdi mdi-eye"></i></a>
                        `;
            }
        }, ],
        "order": [
            [0, 'asc']
        ]
    });
});