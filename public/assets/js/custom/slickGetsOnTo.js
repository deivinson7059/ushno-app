

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
                var response = data.Horario;
                for (var k in response) {

                    var dia_name = response[k].dia_name;
                    var horario = response[k].horario;
                    var descripcion = response[k].descripcion;
                    var frase = response[k].frase;
                    var image = "assets/img/show-" + response[k].id + ".jpg";

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

                    $(contenedor).append(div);
                }

            } else {
                $(contenedor).html('');
            }

        });
}


function goTeams() {
    var url = "http://127.0.0.1:4000/teams";
    var teams;
    axios({
        method: 'get',
        url: url,
        responseType: 'json'
    })
        .then(function (data) {
            var data = data.data.teams;

            teams = data.data.teams;
            for (var k in data) {
                var image = data[k]["image"];
                var name = data[k]["name"];
                var radio = data[k]["radio"];

                joder(image, name, radio);
            }

        });


    for (let index = 0; index < 11; index++) {
        var joder = `<div class="team-card">
                            <div class="team-img"><img src="assets/img/team-${index + 1}.jpg" alt="team-1">
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
                                <h4>Miron Mahmud</h4>
                                <p>Radio Jockey</p>
                            </div>
                        </div>`;

        $('#divTeams').append(joder);

    }



    /*   
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder);
       $('#divTeams').append(joder); */

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

goHorario('http://127.0.0.1:4000/Horario/1', '#Hsat');
goHorario('http://127.0.0.1:4000/Horario/2', '#Hsun');
goHorario('http://127.0.0.1:4000/Horario/3', '#Hmon');
goHorario('http://127.0.0.1:4000/Horario/4', '#Htue');
goHorario('http://127.0.0.1:4000/Horario/5', '#Hwed');
goHorario('http://127.0.0.1:4000/Horario/6', '#Hthu');
goHorario('http://127.0.0.1:4000/Horario/7', '#Hfri');
goTeams();

