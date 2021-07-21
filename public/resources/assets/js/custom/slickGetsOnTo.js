

function goHorario(url, contenedor) {
    axios({
        method: 'get',
        url: url,
        responseType: 'json'
    })
        .then(function (data) {
            var data = data.data;
            //console.log(data);
            if (data.status == 200) {
                var response = data.lista;

                if (response.length > 0) {

                    console.log(response);
                    for (var k in response) {
                        var dia_name = response[k].dia_nombre;
                        var horario = response[k].horario;
                        var descripcion = response[k].descripcion;
                        var frase = response[k].frase;
                        var image = "resources/assets/img/show-" + response[k].hor_id + ".jpg";

                        var div = '<div class="col-sm-6 col-md-4 col-lg-3">' +
                            '<div class="show-card">' +
                            '<div class="show-content">' +
                            '<div class="show-bg"><img src="' + image + '" alt="' + dia_name + '"></div>' +
                            '<div class="show-overlay">' +
                            '<div class="show-time">' +
                            '<p>' + horario + '</p>' +
                            '<h4>' + descripcion + '</h4>' +
                            '</div>' +
                            '<ul class="show-host">' +
                            '<li><a href="#"><img src="https://maranatha-radio.com/assets/img/about-12.png" alt="host-1"></a>' +
                            '</li>' +
                            '</ul>' +
                            '</div>' +
                            '</div>' +
                            '<div class="show-meta">' +
                            '<h5>' + frase + '</h5>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                        console.log(div);

                        $(contenedor).append(div);
                    }
                }

            } else {
                $(contenedor).html('');
            }

        });
}


function goTeams() {
    var url = "http://localhost/ushno-api/public/emisora/teams";
    axios({
        method: 'get',
        url: url,
        responseType: 'json'
    })
        .then(function (data) {
            var data = data.data.teams;

            for (var k in data) {
                var image = data[k]["te_image"];
                var name = data[k]["te_nombre"];
                var radio = data[k]["te_nick"];

                var div = `<div class="team-card">
                            <div class="team-img"><img src="resources/assets/img/${image}" alt="team-1">
                                <div class="team-overlay">
                                    <ul class="team-icon">
                                        <li><a class="icon icon-inline" href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a class="icon icon-inline" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="icon icon-inline" href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-meta">
                                <h4>${name}</h4>
                                <p>${radio}</p>
                            </div>
                        </div>`;

                $('#divTeams').append(div);

            }

        });

    goSlider();

}

function goSlider() {
    $(".banner-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !0,
        autoplay: !0,
        arrows: !1,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    $(".video-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !0,
        arrows: !0,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }]
    });
    $(".blog-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !0,
        arrows: !0,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }]
    });
    $(".testi-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !1,
        arrows: !0,
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }]
    });
    $(".sponsor-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !1,
        arrows: !0,
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: !1
            }
        }]
    });
    $(".team-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !0,
        arrows: !0,
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: !0,
                arrows: !1
            }
        }]
    });
    $(".theme-slider").slick({
        dots: !1,
        infinite: !0,
        speed: 1e3,
        fade: !1,
        autoplay: !0,
        arrows: !0,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<i class="fas fa-chevron-right dandik"></i>',
        nextArrow: '<i class="fas fa-chevron-left bamdik"></i>',
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 576,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: !1
            }
        }]
    });
}

goHorario('http://localhost/ushno-api/public/emisora/horario/1', '#Hsat');
goHorario('http://localhost/ushno-api/public/emisora/horario/2', '#Hsun');
goHorario('http://localhost/ushno-api/public/emisora/horario/3', '#Hmon');
goHorario('http://localhost/ushno-api/public/emisora/horario/4', '#Htue');
goHorario('http://localhost/ushno-api/public/emisora/horario/5', '#Hwed');
goHorario('http://localhost/ushno-api/public/emisora/horario/6', '#Hthu');
goHorario('http://localhost/ushno-api/public/emisora/horario/7', '#Hfri');
goTeams();

