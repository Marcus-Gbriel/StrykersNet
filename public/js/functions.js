class router {

    constructor() {
        this.init();
    }

    init() {
        this.document_events();
    }

    document_events() {
        $(document).on('click', '[move-to]', (e) => {
            e.preventDefault();
            let rota = $(e.currentTarget).attr('move-to');
            this.navigate(rota);
        });
    }

    navigate(rota) {
        this.request_route(rota, function (response) {
            $('#body_system').html(response);
        });
    }

    request_route(page, callback) {
        let url = "api/routes";
        let params = {
            page: page
        }

        $.ajax({
            url: url,
            type: 'GET',
            data: params,
            dataType: 'html',
            success: function (response) {
                callback(response);
            },
            error: function (xhr, status, error) {
                console.error('Request failed:', error);
            }/*
            error: function (xhr, status, error) {
                console.error('Request failed:', error);
            }*/
        });
    }
}