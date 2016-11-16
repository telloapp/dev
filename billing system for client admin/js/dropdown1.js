function displayProv() 
  {

    var country = document.getElementById('country').value;
    
    if (country == "South Africa") {
      
      var province = document.getElementById("province").innerHTML="<option></option><option>Eastern Cape</option><option>Free State</option><option>Gauteng</option><option>Kwazulu Natal</option><option>Limpopo</option><option>Northern Cape</option><option>North West</option><option>Mpumalanga</option><option>Western Cape</option>";

    }
    else
    
    if(country =="Namibia"){
        var province = document.getElementById("province").innerHTML="<option></option><option>Khomas</option>";
    };    
  }
  function displayCity()
  {
    var province = document.getElementById('province').value;
    
    if(province == "Gauteng") {

      var city = document.getElementById("city").innerHTML="<option></option><option>Alberton</option><option>Alexandra</option><option>Atteridgeville</option><option>Benoni</option><option>Boksburg</option><option>Brakpan</option><option>Carletonville</option><option>Centurion</option><option>City of Tshwane</option><option>Daveyton</option><option>Duduza</option><option>Edenvale</option><option>Germiston</option><option>Hammanskraal</option><option>Johannesburg</option><option>Kempton Park</option><option>Krugeresdrop</option><option>KwaThema</option><option>Lenasia</option><option>Mabopane</option><option>Mamelodi</option><option>Pretoria</option><option>Randburg</option><option>Randfontein</option><option>Roodepoort</option><option>Soshanguve</option><option>Soweto</option><option>Tembisa</option><option>Thokoza</option><option>Vanderbijlpark</option><option>Vereeniging</option><option>Vereeniging</option><option>Vosloorus</option><option>Westonaria</option>"
    }
    else 
    if (province == "Eastern Cape"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Addo,Eastem Cape</option><option>Aliwal North</option><option>Alice</option><option>Bathurst</option><option>Bhisho</option><option>Chintsa</option><option>Coffee Bay</option><option>Butterworth</option><option>Despatchh</option><option>Dutywa</option><option>East London</option><option>Fort Beaufort</option><option>King William's Town</option><option>George</option><option>Gonubie</option><option>Ellit</option><option>Grahamstown</option><option>Graaff-Reinet</option><option>Humansdrop</option><option>Hogsback</option><option>Jeffreys Bay</option><option>Kenton-on-Sea</option><option>Kouga local</option><option>Middelburg</option><option>Mount Frere</option><option>Mthatha</option><option>Nieu-Bathesda</option><option>Ngcobo</option><option>Somerset East</option><option>Steynsburg</option><option>Stutterheim</option><option>St Francis Bay</option><option>Port Alfred</option><option>Port Elizabeth</option><option>Port St. Johnd</option><option>Uitenhage Eastern Cape</option><option>Queenstown</option><option>Whittlesea</option>"
    }
    else 
    if (province == "Free State"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Bethlehem</option><option>Bloemfontein</option><option>Clarens</option><option>Ficksburg</option><option>Harrismith</option><option>Kroonstad</option><option>Lejweleputswa</option><option>Sasolburg</option><option>Transgariep</option><option>Thaba Nchu</option><option>Odendaalsrus</option><option>Philippolis</option><option>Phuthaditjhaba</option><option>Parys</option><option>Welkom</option><option>Winburg</option>"
    }
    else 
    if (province == "Kwazulu Natal"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Amanzimtoti</option><option>Ballito</option><option>Durban</option><option>Margate</option><option>Newcastle</optio'n><option>Hibberdene</option><option>Scottburgh</option><option>Pietermaritzburg</option><option>Port Shepstone</option><option>Pinetown</option><option>Port Edward</option><option>Umhlanga</option><option>Umlazi</option><option>Queensburgh</option>"
    }
    else 
    if (province == "Limpopo"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Alldays</option><option>Bela-Bela</option><option>Bochum</option><option>Bushbuckridge</option><option>Burgersfort</option><option>Duiwelskloof</option><option>Giyani</option><option>Groblersdal</option><option>Haenertsburg</option><option>Hoedspruit</option><option>Jane Furse</option><option>Lebowakgomo</option><option>Lephalale</option><option>Louis Trichardt</option><option>Malamulele</option><option>Marble Hall</option><option>Modimolle</option><option>Mokopane</option><option>Musina</option><option>Naboomspruit</option><option>Northam</option><option>Ohrigstad</option><option>Phalaborwa</option><option>Polokwane</option><option>Seshego</option><option>Soekmakaar</option><option>Thabazimbi</option><option>Thohoyandou</option><option>Tzaneen</option><option>Vaalwater</option><option>Vivo</option>"
    }
    else 
    if (province == "Northern Cape"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Douglas</option><option>Kathu</option><option>Kakamas</option><option>Kuruman</option><option>Kimberly</option><option>Upington</option><option>Port Nolloth</option><option>Springbok</option>"
    }
    else 
    if (province == "North West"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Brits</option><option>Hartbeespoort</option><option>Kleksdrop</option><option>Mabopane</option><option>Rustenburg</option><option>Potchefstroom</option><option>Stilfontein</option>"
    }
    else 
    if (province == "Mpumalanga"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Delmas</option><option>Ermelo</option><option>Lydenburg</option><option>Middelburg</option><option>Nelspruit</option><option>Secunda</option><option>Witbank</option><option>White River</option><option>Vryburg</option>"
    }
    else 
    if (province == "Western Cape"){

      var city = document.getElementById("city").innerHTML="<option></option><option>Bellville</option><option>Cape Town</option><option>Durbanville</option><option>Hout Bay</option><option>Somerset West</option><option>Stand</option><option>Stellenbosch</option><option>Paarl</option>"
    }
    else 
    if (province == "Khomas"){

      var city = document.getElementById("city").innerHTML="<option></option><option>John Pandenl</option><option>Kututura Central</option><option>Kututura East</option><option>Khomasdal North</option><option>Moses llGaroeb</option><option>Samora Machel</option><option>Tobias Hainyeko</option><option>Windhoek West</option><option>Windhoek East</option><option>Windhoek Rural</option>"
    }
  }