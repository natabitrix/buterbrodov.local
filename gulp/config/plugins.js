import replace from "gulp-replace"; //Поиск и замена
import plumber from "gulp-plumber"; //Обработка ошибок
import notify from "gulp-notify"; //Сообщения-подсказки
import browsersync from "browser-sync"; //Локальный сервер
import newer from "gulp-newer"; //Проверка обновления
import ifPlugin from "gulp-if"; //Условное ветвление


// import livereload from "gulp-livereload"; 

browsersync.create('MyServer');
// browsersync.create('MyServerPHP');

//Экспортируем объект
export const plugins = {
    replace: replace,
    plumber: plumber,
    notify: notify,
    //browsersync: browsersync,
    browsersync: browsersync.get('MyServer'),
    // browsersync_php: browsersync.get('MyServerPHP'),
    newer: newer,
    if: ifPlugin,
    // livereload: livereload
}