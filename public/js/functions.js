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

        window.onpopstate = (event) => {
            if (event.state && event.state.rota) {
                this.load_route(event.state.rota);
            }
        };
    }

    navigate(rota) {
        this.request_route(rota, (response) => {
            this.update_content(response);
            if(rota == 'home'){
                rota = '';
            }
            history.pushState({ rota: rota }, '', '/' + rota);
        });
    }

    load_route(rota) {
        this.request_route(rota, (response) => {
            this.update_content(response);
        });
    }

    update_content(response) {
        $('.container_system').html(response);
    }

    request_route(page, callback) {
        let url = "api/routes/" + page;

        $.ajax({
            url: url,
            type: 'PATCH',
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