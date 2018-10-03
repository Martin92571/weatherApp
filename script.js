$(document).ready(function(){
    city();
    // openWeather();
});

// /////Openweather Api call for every city////
// function openWeather(){
//     let request=$.ajax({
//         url:"http://api.openweathermap.org/data/2.5/box/city?bbox=-129.990234,23.951116,-64.775391,49.656961,1000&APPID=475bd3c9e82df38ab4f14f46e6130dc5 ",
//         method:"GET",
//         dataType:"json"
//     });
//     request.done(function(data){
//         thunderstormCity(data);
//     });
//     request.fail(function(msg){
//         console.log(msg);
//     })
// }
// function thunderstormCity(data){
//     // city=city.map(function(a){
//     // //     a=a.replace(/\s/g, '');
//     // //     a=a.toLowerCase();
//     // //     return a;
//     // // })
//     // console.log(city);
//     let thunderstorm=[];
//     var counter=0;
//     console.log(data);
//     data.list.map(function(a){
//         // a.name=a.name.replace(/\s/g, '');
//         // a.name.toLowerCase();
//         //  if(city.includes(a.name.toLowerCase())){
//         //     thunderstorm.push(a.id);
//         //  }
//         thunderstorm.push(a.id);
//         // a.weather.map(function(b){
//         //     if(b.icon=="11d"|| b.icon=="11n"){
                
//         //         thunderstorm.push(a);
//         //     }
//         // })
//     })
//     console.log(thunderstorm);
//     console.log(counter);
//     console.log(data);

// }

function city(){
    
    let counter=0;
    let cityCounterAjax=setInterval(function(){
        openWeather(cityId[counter++]);
        if(counter==cityId.length){
           clearInterval(cityCounterAjax); 
        }
    },1200);
    
}
function openWeather(cityIdentifier){
        let request=$.ajax({
            url:"http://api.openweathermap.org/data/2.5/weather?id="+cityIdentifier+"&APPID=475bd3c9e82df38ab4f14f46e6130dc5 ",
            method:"GET",
            dataType:"json"
        });
        request.done(function(data){
            thunderstormCity(data);
        });
        request.fail(function(msg){
            console.log(msg);
        })
    }

function thunderstormCity(data){
    if(data.sys.country=="US"){
        
    insertUpdate(data);
    // data.weather.map(function(a){
    
    //     if(a.icon=="11d"||a.icon=="11n"){
    //         tCity.push(data);
    //     }
        
    // });
 }
    
    
}
function insertUpdate(data){
    console.log(data);
    let weather2,weather3=null;
    if(data.weather[1]){
         weather2=data.weather[1].icon;
        if(data.weather[2]){
             weather3=data.weather[2].icon;
        }
    }
    
    let server=$.ajax({
        url:"http://localhost/naturVet/weatherApp/php/cityUpdate.php?action=insert",
        method:"POST",
        data:{'city_id':data.id,'name':data.name,'lat':data.coord.lat,'long':data.coord.lon,
              'weather1':data.weather[0].icon,'weather2':weather2,'weather3':weather3},
        dataType:"json"
    });
    server.done(function(data){
        console.log(data);
    });
    server.fail(function(msg){
        console.log(msg);
    })
}