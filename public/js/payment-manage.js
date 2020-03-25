$(document).ready(function() {
    $("#datatable").DataTable({
        responsive: true,
        ajax: {
            "url": "/getAllPaymentData"
        },
        columns: [
            { "data": 'cnt' },
            { "data": 'user_type' },
            { "data": 'user_name' },
            { "data": 'amount' },
            { "data": 'description' },
        ],
        "order": [
            [0, 'asc']
        ]
    });
});