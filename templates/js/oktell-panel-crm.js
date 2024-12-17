(function($){
    $(document).ready(function (){




	$(function(){


        $('.oktell-call-button').click(function(){
            var number = $(this).data("phone");
            $('.i_panel_bookmark').mouseover();
            oktell.call( number, function(data){
                if ( data.result ) {
                    console.info( "SUCCESS calling to " + number );
                } else {
                    console.error( "ERROR " + data.errorCode + ": " + data.errorMessage );
                }
            });
        });

		// Пример подключения к серверу Oktell при помощи oktell.js
		// дополнительные параметры подключения смотрите в документации oktell.js
        var oktell_login = $('#user-oktell-login').val();
        var oktell_password = $('#user-oktell-password').val();

            oktell.connect({
                url: ['wss://oktelll.nhi-group.ru'], // ip-адрес вашего сервера Oktell // 92.255.189.221:4055
                login: 'user10', //, // необходимо подставить логин текущего пользователя  
                oktellVoice: true, // используем веб-телефон Oktell-voice.js
                password: '111', //, // необходимо подставить пароль пользователя 485911
                callback: function (data) {
                    if (data.result) {
                        // успешное подключение
                    }
                }
            });


		// Пример инициализации oktell-panel.js
		$.oktellPanel({
			// указаны значения по умолчанию
			oktell: window.oktell, // можно задать ссылку на объект Oktell.js
			oktellVoice: window.oktellVoice, // можно задать ссылку на объект Oktell-voice.js
			dynamic: false, // если true, то панель не скрывается для окна шириной больше 1200px;
					// если false, то панель скрывается для любой ширины окна
			position: 'right', // положение панели, возможные варианты 'right' и 'left'
			ringtone: '/oktell/ringtone.mp3', // путь до мелодии вызова
			debug: true, // логирование в консоль
			lang: 'ru', // язык панели, также поддерживаются английский 'en' и чешский 'cz'
			showAvatar: true, // показывать аватары пользователей в списке
			hideOnDisconnect: true, // скрывать панель при разрывае соединения с сервером Oktell
			useNotifies: false, // показывать webkit уведомления при входящем вызове
			container: false, // DOMElement или jQuery элемент, который нужно использовать как контейнер.
			useSticky: true, // использовать залипающие заголовки;
					// на мобильных устройствах и при использовании контейнера (параметр container)
					// не используются.
			useNativeScroll: false, // использовать нативный скролл для списка.
					// на мобильных устройствах и при использовании контейнера (параметр container)
					// всегда используется нативный скролл.
			withoutPermissionsPopup: false, // не использовать попап для запросов доступа к микрофону
			withoutCallPopup: false, // не использовать попап для входящих вызовов
			withoutError: false // не показывать ошибки соединения с сервером Oktell
		});
	});

    });


    var onMediaRequestSuccess = function(){
    //    connect();
    }
    var onMediaRequestError = function(){}

    // запрос доступа к микрофону
    oktellVoice.createUserMedia( onMediaRequestSuccess, onMediaRequestError );

    oktellVoice.on('mediaPermissionsRequest', function(){
        // показать попап для уведомления пользователя о необходимости разрешения доступа
    });

    oktellVoice.on('mediaPermissionsAccept', function(){
        // скрыть попап
    });

    oktellVoice.on('mediaPermissionsRefuse', function(){
        // показать попап о невозможности продолжения работы приложения
    });
    /* optional triggers

     $(window).load(function() {

     });

     $(window).resize(function() {

     });

     */


})(window.jQuery);

