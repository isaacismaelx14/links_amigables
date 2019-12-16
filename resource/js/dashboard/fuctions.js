(function(){
    var hourUpdate = function(){
        var date = new Date(),
            hours = date.getHours(),
            ampm,
            minuts = date.getMinutes(),
            seconds = date.getSeconds(),
            dayWeek = date.getDay(),
            day= date.getDate(),
            month = date.getMonth(),
            year = date.getFullYear();

        var pHours = document.getElementById('hours'),
            pAmpm = document.getElementById('ampm'),
            pDay = document.getElementById('day'),
            pDayWeek = document.getElementById('weekDay'),
            pMonth = document.getElementById('month'),
            pYear = document.getElementById('year'),
            pMinute = document.getElementById('minute'),
            pSeconds = document.getElementById('seconds');

        var week = ['Domingo', 'Lunes', 'Martes', 'Miercoles','Jueves','Viernes','Sabado'];
        pDayWeek.textContent = week[dayWeek];

        pDay.textContent = day;

        var Months = ['Enero','Febrero','Marzo','Abril','Mayo', 'Junio','Julio','Agosto','Septiembre','Octubre','Noviembre', 'Diciembre']
        pMonth.textContent = Months[month];
        pYear.textContent= year;

        if(hours > 12){
            hours = hours - 12;
            ampm = 'PM';
        }else{
            ampm = 'AM';
        }

        if (hours == 0){
            hours = 12;
        };

        pHours.textContent = hours;
        pAmpm.textContent = ampm;

        if(minuts < 10){ minuts = "0"+minuts};
        if(seconds < 10){ seconds = "0"+seconds};

        pMinute.textContent = minuts;
        pSeconds.textContent = seconds;
    };

    hourUpdate();
    var interval = setInterval(hourUpdate, 1000);

    

}())